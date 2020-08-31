<?php

	$server = 'localhost';
	$username = 'root';
	$password = 'S1st3m4s';
	$database = 'php_login_database';


	try {

		$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
		
	} catch (PDOException $e) {

		die('Conexion fallida: '.$e->getMessage());
		
	}


?>