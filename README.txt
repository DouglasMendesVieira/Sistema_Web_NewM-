Foi utilizado o banco de dados MySQL Workbench com WampServer

1) Colocar a pasta com o projeto dentro da pasta www do WampServer (C:\wamp64\www)

2) Criar um banco de dados, pode ser feito manualmente respeitando os campos de cadastro do projeto ou utilizando a consulta abaixo:

	CREATE TABLE `newm`.`usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(80) NOT NULL,
	`data_nasc` DATE NOT NULL,
	`cpf` VARCHAR(14) NOT NULL,
	`celular` VARCHAR(15) NOT NULL,
	`email` VARCHAR(80) NOT NULL,
	`endereco` VARCHAR(120) NOT NULL,
	`observacao` VARCHAR(300) NULL,
	PRIMARY KEY (`id`)
	);


3) Editar as variáveis do arquivo config.php de acordo com as suas configurações:

	$dbHost = 'localhost:3306';
	$dbUsername = 'root';
	$dbPassword = 'teste123';
	$dbName = 'newm';
	
4) Acessar a página http://localhost:8080/NewM/html/home.html no navegador