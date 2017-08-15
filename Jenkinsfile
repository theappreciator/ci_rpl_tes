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
                    sh 'sed -ie \'s/<testsuites/<testsuites name="testsuitesname" classname="testsuitesclassname"/g\' results/casperjs/xunit.xml'
                    junit 'results/**/*.xml'
                }
            }
        }
    }
	
}