pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                script {
                    docker.image('composer:latest').inside('--privileged') {
                        sh 'composer install'
                    }
                }
            }
        }
        stage('Test') {
            steps {
                script {
                    docker.image('composer:latest').inside('--privileged') {
                        sh './vendor/bin/phpunit tests'
                    }
                }
            }
        }
    }
}
