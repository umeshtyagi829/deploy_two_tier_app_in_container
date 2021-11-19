pipeline {
    agent any
    environment {
                MYSQL_CREDENTIALS     = credentials('mysql_credentials')
                MYSQL_ROOT_PASSWORD   = credentials('mysql_root_password')
            }
    stages {
        stage('GetCode') {
            steps {
                git 'https://github.com/umeshtyagi829/deploy_two_tier_app_in_container.git'
            }
        }

        stage('Build') {
            steps {  
                sh 'sudo docker build -t mysql_by_jenkins -f mysql/Dockerfile .'
                sh 'sudo docker build -t php_by_jenkins -f php/Dockerfile .'
            }
        }    

        stage('Deploy') {
            steps {
                sh 'sudo docker rm -f mydb || true'
                sh 'sudo docker rm -f mywebapp || true'
                sh 'chmod +x main.sh'
                sh './main.sh'
            }

        }
    }     
}
