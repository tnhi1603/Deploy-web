pipeline {
    agent any

    environment {
        DEPLOY_USER = "deploy"
        DEPLOY_PASSWORD = "1234"
        DOCKER_IMAGE = "devops"
        DOCKER_TAG = "latest"           
        REGISTRY = "docker.io" 
        CONTAINER_NAME = "laravel_app"
        DB_CONTAINER_NAME = "laravel_db"
    }

    stages {
        stage('Login to Deploy User') {
            steps {
                script {
                    sh "echo $DEPLOY_PASSWORD | sudo -S -u $DEPLOY_USER -H sh -c \"echo 'Logged in as deploy user: $DEPLOY_USER'\""
                }
            }
        }

        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker build -t $DOCKER_IMAGE:$DOCKER_TAG ."
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD $REGISTRY"
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker tag $DOCKER_IMAGE:$DOCKER_TAG $REGISTRY/$DOCKER_IMAGE:$DOCKER_TAG"
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker push $REGISTRY/$DOCKER_IMAGE:$DOCKER_TAG"
                }
            }
        }

        stage('Deploy Application') {
            steps {
                script {
                    // Start Database Container
                    sh """
                        echo $DEPLOY_PASSWORD | sudo -S docker run -d --name $DB_CONTAINER_NAME -p 3307:3306 \
                            -e MYSQL_ROOT_PASSWORD=root \
                            -e MYSQL_DATABASE=laravel \
                            -e MYSQL_USER=laravel \
                            -e MYSQL_PASSWORD=secret \
                            mysql:5.7
                    """

                    // Start Laravel App Container
                    sh """
                        echo $DEPLOY_PASSWORD | sudo -S docker run -d --name $CONTAINER_NAME -p 8000:8000 \
                            --env-file .env \
                            $REGISTRY/$DOCKER_IMAGE:$DOCKER_TAG
                    """
                }
            }
        }

        stage('Seed Database') {
            steps {
                script {
                    // Copy `.env.example` to `.env` and run key:generate
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker exec $CONTAINER_NAME cp .env.example .env"
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker exec $CONTAINER_NAME php artisan key:generate"

                    // Migrate and seed the database
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker exec $CONTAINER_NAME php artisan migrate"
                    sh "echo $DEPLOY_PASSWORD | sudo -S docker exec $CONTAINER_NAME php artisan db:seed"
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
