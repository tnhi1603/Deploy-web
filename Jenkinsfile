pipeline {
    agent any

    environment {
        DOCKER_IMAGE_NAME = "nhitt/devops"
        DOCKER_CREDENTIALS_ID = "docker-hub-credentials"
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
                    sh "docker-compose build"
                }
            }
        }

        stage('Push Docker Image to Docker Hub') {
            steps {
                script {
                    docker.withRegistry('', DOCKER_CREDENTIALS_ID) {
                        sh "docker tag laravel-app ${DOCKER_IMAGE_NAME}:latest"
                        sh "docker push ${DOCKER_IMAGE_NAME}:latest"
                    }
                }
            }
        }

        stage('Deploy, Seed, and Test') {
            steps {
                script {
                    // Pull the Docker image
                    sh "docker pull ${DOCKER_IMAGE_NAME}:latest"

                    // Run the application
                    sh "docker-compose down"
                    sh "docker-compose up -d"

                    // Wait for the application to initialize
                    sh "sleep 30"

                    // Run migrations and seed data
                    sh "docker-compose exec app php artisan migrate"
                    sh "docker-compose exec app php artisan db:seed"

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
