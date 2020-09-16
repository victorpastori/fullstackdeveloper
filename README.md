# Gaudium Full Stack Developer Exam

Bem vindo(a) ao ambiente de desenvolvimento do processo seletivo para Desenvolvedor Full Stack da Gaudium!

Este ambiente será utilizado durante a prova prática do processo.

Faça um fork deste repositório para um novo repositório na sua conta do Github e siga as instruções abaixo.

## Verificação do ambiente

É necessário ter a versão estável mais recente do [Docker Desktop](https://www.docker.com/products/docker-desktop) instalada no seu computador.

Uma vez que o Docker Desktop esteja funcionando no seu computador, você deve:

1. Baixar o seu novo repositório para o seu computador, usando o o comando `git clone` ou um cliente git como o [GitHub Desktop](https://desktop.github.com/).

2. Verificar o funcionamento do ambiente. Para isto, abra um terminal de linha de comandos na pasta `gdfs-workspace` e digite o comando 

   `docker-compose up -d`

3. Após verificar que os containers foram ativados, aguarde 30 segundos e abra o seu navegador no endereço

    [http://127.0.0.1:8123]( http://127.0.0.1:8123)

   Uma página com a mensagem **Ambiente instalado com sucesso!** deverá ser exibida.

## Estrutura do ambiente

- A pasta `www` conterá os arquivos php, html, javascript, css e imagens que você produzirá durante a prova prática.
- O servidor web responderá no endereço `127.0.0.1:8123` 
- O banco de dados MySQL 5.6 responderá na porta `8456`
- Os dados de conexão ao banco podem ser encontrados no código do script `index.php`.
- A pasta `db` (que será criada quando o ambiente for ativado) conterá o banco de dados e deve ser comitada também durante a prova. Você não deve alterar diretamente o conteúdo desta pasta.
- A pasta `docker` contém as imagens docker do Nginx, PHP e MySQL que compõem o ambiente. Não faça alterações nesta pasta.

## Ferramentas recomendadas

Durante a prova, você precisará acessar o banco de dados MySQL para criar tabelas e fazer outras consultas. Sugerimos que use um programa como o [SequelPro](https://sequelpro.com/) (para Mac) ou [HeidiSQL](https://www.heidisql.com/) (para Windows) para isto.

Você também deve escolher um editor de código com que esteja habituado. Na Gaudium, nós usamos o [VSCode](https://code.visualstudio.com/) e o [PHPStorm](https://www.jetbrains.com/pt-br/phpstorm/).

