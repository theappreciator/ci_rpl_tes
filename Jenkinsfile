pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
				sh "echo \"Server: \$(hostname)\""
				sh "echo \"User:   \$(whoami)\""
				sh "echo \"Path:   \$PATH\""				
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c tests/phpunit/phpunit.xml'
                sh 'casperjs test ./tests/casperjs/*.js --xunit=reports/casperjs/xunit.xml'
				
				junit '**/results/phpunit/*.xml'
                junit '**/results/casperjs/*.xml'
			}
        }
    }
	
}