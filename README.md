# Sistema de vendas online - Fastweb

- Sistema feito completamente orientado a objetos para o Projeti do 4º Semestre do Curso de Sistemas para Internet.

## Models

- Toda e qualquer classe criada dentro da pasta /model deve ser inserida no arquivo "/model/autoload.php" via include.

## Controller's

- Os Controller's devem incluir o arquivo <b>include_once '../model/autoload.php'</b> para utilizar as classes do sistema.

## Instalação

1. Clone o repositorio usando <b>git clone https://github.com/eduardo18delta/fastweb-2.git</b>
2. Use o arquivo fastweb-2.sql que está alocado na pasta /database para instalar o banco de dados do sistema.
3. Copie e renomeie os arquivos de conexão na pasta /model - somente remova o trecho "-exemplo" do nome do arquivo sendo eles:
	conexaoFacebook-exemplo.php e config-exemplo.php
4. Depois de feito o passo a cima, configure nos arquivos os acessos ao banco de dados do seu servidor MySQL.
5. Dê permissão de escrita e leitura na pasta /assets/js/produtos. Estou usando apache no Ubuntu 16.04 e o comando ficou assim:
	- sudo chmod -R 777 /var/www/html/fastweb-2/assets/js/produtos
6. Dê permissão de escrita e leitura na pasta /assets/img/upload_produtos. Estou usando apache no Ubuntu 16.04 e o comando ficou assim:
	- sudo chmod -R 777 /var/www/html/fastweb-2/assets/img/upload_produtos
7. Dê permissão de escrita e leitura na pasta /assets/img/upload_perfil. Estou usando apache no Ubuntu 16.04 e o comando ficou assim:
	- sudo chmod -R 777 /var/www/html/fastweb-2/assets/img/upload_perfil
	

- A partir de agora o sistema está funcional e rodando localmente em sua máquina

## Developers

- Brenno Henrique / Front-End Developer.
- Eduardo Henrique / Back-End Developer and DBA.
- Rosivan Santos / Back-End Developer and DBA.
