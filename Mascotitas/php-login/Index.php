<?php 

	session_start();

	require 'Database.php';

	if (isset($_SESSION['user_id'])) {
		
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
		 	
			$user = $results;

		 } 

	}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Bienvenidos</title>
	<link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/Style.css">
	<meta charset="utf-8">
</head>
<body>

	<?php require 'partials/Header.php' ?>

	<?php if(!empty($user)): ?>

	<br>Bienvenido. <?= $user['email'] ?>
	<br>Tu estas satisfactoriamente registrado
	<a href="Longout.php">Cerrar sesion</a>

	<?php else: ?>


	<h1>Registrarse o Iniciar Sesion</h1>

	<a href="Login.php"><img src="../images/Cerrar.png"></a>
	<a href="Signup.php"><img src="../images/Registrar.png"></a>

<?php endif; ?>

</body>
</html>