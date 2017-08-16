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
        success {
            slackSend channel: '#general',
                      color: 'good',
                      message: "The pipeline ${currentBuild.fullDisplayName} completed successfully."
        }
        failure {
            slackSend channel: '#general',
                      color: 'danger',
                      message: "The pipeline ${currentBuild.fullDisplayName} failed."
        }
        always {
            junit 'results/**/*.xml'
            
            publishHTML target: [
              allowMissing: false,
              alwaysLinkToLastBuild: false,
              keepAll: true,
              reportDir: 'reports',
              reportFiles: 'index.html',
              reportName: 'RCov Report'
            ]
        }
    }
	
}