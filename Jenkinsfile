podTemplate(containers: [
    containerTemplate(name: 'php', image: 'php:7.4-cli', ttyEnabled: true, command: 'cat'),
    containerTemplate(name: 'composer', image: 'composer', ttyEnabled: true, command: 'cat')
  ]) {
  node(POD_LABEL) {
        stage('Get php project') {
            git branch: "${env.BRANCH_NAME}", url: 'https://github.com/Indy79/mon-projet-php.git'
            container('php') {
                stage('Echo something inside php') {
                    sh 'echo "im in a php container"'
                }
            }
	    container('composer') {
	       stage('Prepare') {
                	sh 'composer install'
		}
		stage('Run tests') {
			sh './vendor/bin/phpunit tests'
		}
		stage('Run quality code') {
			sh './vendor/bin/phpcs -n --standard=PEAR src/'
		}
            }
        }
  }
}
