<?php

	session_start();

	if (isset($_SESSION['user_id'])) {
		
		header('Location: /Pagina Mascotas/php-login');

	}

	require 'Database.php';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

			$_SESSION['user_id'] = $results['id'];
			header('Location: /Pagina Mascotas/php-login');

		} else {

			$message = 'Error sus credenciales no coinciden';

		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/Style.css">
</head>
<body>

	<?php require 'partials/Header.php' ?>

	<h2>Iniciar sesion</h2>
	<spam><b>O</b> <a href="Signup.php"><img src="../Imagenes/Registrar.png"></a></spam>

	<?php if (!empty($message)) : ?> 

		<p><?= $message ?></p>

	<?php endif;?>

	<form action="Login.php" method="post">
		<input type="text" name="email" placeholder="Ingrese su E-mail">
		<input type="password" name="password" placeholder="Ingresa tu contraseña">
		<input type="submit" value="Enviar">
	</form>

</body>
</html>