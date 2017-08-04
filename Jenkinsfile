pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
				sh "echo \"Server: \$(hostname)\""
				sh "echo \"User:   \$(whoami)\""
				sh "echo \"Path:   \$PATH\""				
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c tests/phpunit.xml'
				
				publishHTML target: [
					allowMissing: false,
					alwaysLinkToLastBuild: false,
					keepAll: true,
					reportDir: 'coverage',
					reportFiles: 'index.html',
					reportName: 'RCov report'
				]
			}
        }
    }
	
}