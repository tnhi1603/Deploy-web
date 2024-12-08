pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "devops"
        DOCKER_TAG = "latest"           
        CONTAINER_NAME = "laravel_app"
        DB_CONTAINER_NAME = "laravel_db"
    }

    stages {
        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t $DOCKER_IMAGE:$DOCKER_TAG .'
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: "${DOCKER_REGISTRY_CREDS}", passwordVariable: 'DOCKER_PASSWORD', usernameVariable: 'DOCKER_USERNAME')]){
                    sh "echo \$DOCKER_PASSWORD | docker login -u \$DOCKER_USERNAME --password-stdin docker.io"
                    sh "docker tag $DOCKER_IMAGE:$DOCKER_TAG $DOCKER_IMAGE:$DOCKER_TAG"
                    sh "docker push $DOCKER_IMAGE:$DOCKER_TAG"
                }
            }
        }

        stage('Deploy Application') {
            steps {
                script {
                    // Start Database Container
                    sh """
                        docker run -d --name $DB_CONTAINER_NAME -p 3307:3306 \\
                            -e MYSQL_ROOT_PASSWORD=root \\
                            -e MYSQL_DATABASE=laravel \\
                            -e MYSQL_USER=laravel \\
                            -e MYSQL_PASSWORD=secret \\
                            mysql:5.7
                    """

                    // Start Laravel App Container
                    sh """
                        docker run -d --name $CONTAINER_NAME -p 8000:8000 \\
                            --env-file .env \\
                            $DOCKER_IMAGE:$DOCKER_TAG
                    """
                }
            }
        }

        stage('Seed Database') {
            steps {
                script {
                    // Copy `.env.example` to `.env` and run key:generate
                    sh "docker exec $CONTAINER_NAME cp .env.example .env"
                    sh "docker exec $CONTAINER_NAME php artisan key:generate"

                    // Migrate and seed the database
                    sh "docker exec $CONTAINER_NAME php artisan migrate"
                    sh "docker exec $CONTAINER_NAME php artisan db:seed"
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline execution complete.'
        }
        success {
            echo 'Pipeline executed successfully.'
        }
        failure {
            echo 'Pipeline failed.'
        }
    }
}
