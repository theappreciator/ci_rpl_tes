pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
				sh "echo \"Server: \$(hostname)\""
				sh "echo \"User:   \$(whoami)\""
				sh "echo \"Path:   \$PATH\""				
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c tests/phpunit/phpunit.xml'
                sh 'casperjs test ./tests/casperjs/*.js --no-colors --xunit=results/casperjs/xunit.xml'
			}
            post {
                always {
                    junit 'results/**/*.xml'
                }
            }
        }
    }
	
}