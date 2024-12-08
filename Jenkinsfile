pipeline {
    agent any

    environment {
        APP_PORT = "8000" 
    }

    stages {
        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker compose build"
                }
            }
        }

        stage('Push Docker Image to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: "${DOCKER_REGISTRY_CREDS}", passwordVariable: 'DOCKER_PASSWORD', usernameVariable: 'DOCKER_USERNAME')]) {
                        sh "echo \$DOCKER_PASSWORD | docker login -u \$DOCKER_USERNAME --password-stdin docker.io"
                        sh "docker tag devops \$DOCKER_IMAGE:latest"
                        sh "docker push \$DOCKER_IMAGE:latest"
                    }
                }
        }

        stage('Deploy, Seed, and Test') {
            steps {
                script {
                    // Pull the Docker image
                    sh "docker pull \$DOCKER_IMAGE:latest"

                    // Run the application
                    sh "docker compose down"
                    sh "cp .env.example .env"
                    sh "composer install"
                    sh "php artisan key:generate"
                    sh "docker compose up -d"

                    // Wait for the application to initialize
                    sh "sleep 30"

                    // Run migrations and seed data
                    // sh "docker compose exec app php artisan migrate"
                    // sh "docker compose exec app php artisan db:seed"

                    // Test if the application is accessible
                    sh "curl -f http://localhost:${APP_PORT} || exit 1"
                }
            }
        }
    }

    post {
        success {
            echo "Application successfully built, pushed, and tested!"
        }

        failure {
            echo "Pipeline failed. Check logs for details."
        }
    }
}
