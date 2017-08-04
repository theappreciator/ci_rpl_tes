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
					alwaysLinkToLastBuild: true,
					keepAll: false, 
					reportDir: 'reports', 
					reportFiles: 'index.html', 
					reportName: 'HTML_Report', 
					reportTitles: 'report_title'
				]
			}
        }
    }
	
}