pipeline {
  agent any
  environment {
    HOME = '.'
  }
  stages {
    stage('Test') {
      agent {
        docker {
          image 'debian-laravel-php8:latest'
          args '-v /etc/passwd:/etc/passwd -v /etc/group:/etc/group'
        }
      }
      steps {
        sh "composer update"
        sh "cp /.env ${workspace}/.env"
        sh "php artisan test"
      }
    }
    stage('Deploy') {
      agent {
        docker {
          image 'centos-laravel:latest'
          args '-v /etc/passwd:/etc/passwd -v /etc/group:/etc/group'
        }
      }
      steps {
        withCredentials([usernamePassword(credentialsId: 'schaffterhelloworld', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')])
         {
          sh "echo USERNAME     = $USERNAME"
          sh "echo PASSWORD     = $PASSWORD"
          sh "echo WORKSPACE    = ${env.WORKSPACE}"
          sh "/usr/bin/sshpass -p $PASSWORD /usr/bin/scp -o StrictHostKeyChecking=no -r ${env.WORKSPACE}/* $USERNAME@helloworld.schaffter.etu.lmdsio.fr:/private"
          sh "/usr/bin/sshpass -p $PASSWORD /usr/bin/ssh -o StrictHostKeyChecking=no $USERNAME@helloworld.schaffter.etu.lmdsio.fr 'cd /private ; composer update'"
        }
      }
    }
  }
}
