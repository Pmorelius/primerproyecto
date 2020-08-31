<?php
	require 'Database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {

		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email',$_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password',$password);

		if ($stmt->execute()) {
			$message = 'El usuario fue creado satisfactoriamente';
		} else {

			$message= 'ERROR el usurario no fue creado';

		}
		
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/Style.css">
	<meta charset="utf-8">
</head>
<body>

	<?php require 'partials/Header.php' ?>

	<?php if(!empty($message)): ?>

		<p><?= $message ?></p>

	<?php endif; ?>

	<h2>Registrarse</h2>
	<spam><b>O</b> <a href="Login.php"><img src="../Imagenes/Cerrar.png"></a></spam>
	<form action="Signup.php" method="post">
		<input type="text" name="email" placeholder="Ingrese su E-mail">
		<input type="password" name="password" placeholder="Ingresa tu contraseña">
		<input type="password" name="confirm-password" placeholder="Repetir contraseña">
		<input type="submit" value="Enviar">
	</form>

</body>
</html>