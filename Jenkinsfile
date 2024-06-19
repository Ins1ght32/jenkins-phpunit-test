pipeline {
    agent{
		docker {
			image 'composer:latest'
		}
	}
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
                        sh './vendor/bin/phpunit --log-junit logs/unitreport.xml -c tests/phpunit.xml tests'
                    }
                }
            }
        }
    }
	post {
		always {
			junit testResults: 'logs/unitreport.xml'
		}
	}
}
