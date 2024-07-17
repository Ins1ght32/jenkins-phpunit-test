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
					sh 'composer install'
                }
            }
        }
        stage('Test') {
            steps {
                script {
                    sh './vendor/bin/phpunit --log-junit logs/unitreport.xml -c tests/phpunit.xml'
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
