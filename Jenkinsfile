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
  }
}
