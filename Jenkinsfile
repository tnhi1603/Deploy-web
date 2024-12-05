pipeline {
    agent any

    stages {
        stage('Setup Laravel') {
            steps {
                sh 'composer require cocur/slugify'
                sh 'composer install'
                sh 'cp .env.example .env'
                echo 'Setting up Laravel environment...'
                // Generate application key
                sh 'php artisan key:generate'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo 'Building Docker image and starting application...'
                // Build Docker image và khởi chạy container
                sh 'docker-compose up --build -d'
            }
        }

        stage('Seed Database') {
            steps {
                echo 'Seeding database...'
                // Chạy lệnh seed database
                sh '''
                docker-compose exec app bash -c "
                php artisan migrate &&
                php artisan db:seed
                "
                '''
            }
        }

        stage('Push Docker Image') {
            steps {
                echo 'Tagging and pushing Docker image to repository...'
                // Tag và push image lên Docker Hub hoặc registry
                sh '''
                docker tag laravel_app:latest nhitt/laravel_app:latest
                docker push nhitt/laravel_app:latest
                '''
            }
        }
    }

    post {
        success {
            echo 'Deployment succeeded!'
        }
        failure {
            echo 'Deployment failed!'
        }
    }
}
