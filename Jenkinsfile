podTemplate(containers: [
    containerTemplate(name: 'php', image: 'php:7.4-cli', ttyEnabled: true, command: 'cat')
  ]) {
  node(POD_LABEL) {
        stage('Get php project') {
            git 'https://github.com/Indy79/mon-projet-php.git'
            container('php') {
                stage('Echo something inside php') {
                    sh 'echo "im in a php container"'
                }
            }
        }
  }
}
