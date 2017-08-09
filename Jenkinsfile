pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
				sh "echo \"Server: \$(hostname)\""
				sh "echo \"User:   \$(whoami)\""
				sh "echo \"Path:   \$PATH\""				
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c tests/phpunit/phpunit.xml'
				
				junit '**/results/phpunit/*.xml'
                casperjs test ./src/tests/**/ts_*.js --xunit=xunit.xml
			}
        }
    }
	
}