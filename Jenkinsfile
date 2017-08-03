pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c tests/phpunit.xml'
            }
        }
    }
}