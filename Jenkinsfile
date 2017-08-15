pipeline {
    agent any
    stages {
        stage('Pre-Test') {
            steps {
                sh "echo \"Server: \$(hostname)\""
				sh "echo \"User:   \$(whoami)\""
				sh "echo \"Path:   \$PATH\""
            }
        }
        stage('Test Backend') {
            steps {			
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c tests/phpunit/phpunit.xml'
			}
        }
        stage('Test Frontend') {
            steps {
                sh 'casperjs test ./tests/casperjs/*.js --no-colors --xunit=results/casperjs/xunit.xml'
			}
        }
    }
    post {
        always {
            junit 'results/**/*.xml'
        }
    }
	
}