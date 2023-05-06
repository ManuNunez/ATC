<?php
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $phone = $_POST['phone'];
    $tags = array(
        $_POST['tag1'],
        $_POST['tag2'],
        $_POST['tag3'],
        $_POST['tag4'],
        $_POST['tag5']
    );

    // Leer el archivo users.json y decodificarlo
    $users = json_decode(file_get_contents('users.json'), true);

    // Crear el nuevo objeto para el usuario
    $new_user = array(
        "pwd" => $pwd,
        "mail" => $email,
        "profilePhoto" => "",
        "description" => "",
        "phoneNumber" => $phone,
        "tag1" => $tags[0],
        "tag2" => $tags[1],
        "tag3" => $tags[2],
        "tag4" => $tags[3],
        "tag5" => $tags[4]
    );

    // Agregar el nuevo usuario al objeto de usuarios
    $users[$username] = $new_user;

    // Volver a codificar el objeto de usuarios como JSON
    $users_json = json_encode($users, JSON_PRETTY_PRINT);

    // Escribir la cadena JSON en el archivo users.json
    file_put_contents('users.json', $users_json);

    // Redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>ATC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/simplex/bootstrap.min.css" integrity="sha384-FYrl2Nk72fpV6+l3Bymt1zZhnQFK75ipDqPXK0sOR0f/zeOSZ45/tKlsKucQyjSp" crossorigin="anonymous">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">ATC</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<?php
					if ($_SESSION["logged"]) {

					?>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Log In</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="signup.php">Sign Up</a>
						</li>
					<?php
					} else {

					?>
						<li class="nav-item">
							<a class="nav-link" href="my_profile.php">My profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Log out</a>
						</li>
					<?php
					}
					?>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<h2>SIGN UP</h2>
		<form method="post" action="new_user.php">
			<form method="POST" action="guardar_usuario.php">
				<div class="form-group">
					<label for="username">Nombre de usuario:</label>
					<input type="text" class="form-control" id="username" placeholder="Ingrese su nombre de usuario" name="username">
				</div>
				<div class="form-group">
					<label for="name">Nombre completo:</label>
					<input type="text" class="form-control" id="name" placeholder="Ingrese su nombre completo" name="name">
				</div>
				<div class="form-group">
					<label for="email">Correo Electronico:</label>
					<input type="text" class="form-control" id="email" placeholder="Ingrese su correo electronico" name="email">
				</div>
				<div class="form-group">
					<label for="phone">Numero de telefono:</label>
					<input type="text" class="form-control" id="phone" placeholder="Ingrese su número de telefono" name="phone">
				</div>
				<div class="form-group">
					<label for="pwd">Contraseña:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Ingrese su contraseña" name="pwd">
				</div>
				<div class="form-group">
					<label for="pwd-confirm">Confirmar Contraseña:</label>
					<input type="password" class="form-control" id="pwd-confirm" placeholder="Confirme su contraseña" name="pwd-confirm">
				</div>
				<div class="form-group">
					<label for="tags1">Etiqueta 1:</label>
					<select class="form-control" id="tags1" name="tags1">
						<?php
						// Leer la lista de tags desde el archivo JSON
						$tags = json_decode(file_get_contents('tags.json'), true);
						// Crear un option para cada tag
						foreach ($tags as $tag) {
							echo "<option value=\"$tag\">$tag</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="tags2">Etiqueta 2:</label>
					<select class="form-control" id="tags2" name="tags2">
						<?php
						// Leer la lista de tags desde el archivo JSON
						$tags = json_decode(file_get_contents('tags.json'), true);
						// Crear un option para cada tag
						foreach ($tags as $tag) {
							echo "<option value=\"$tag\">$tag</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="tags3">Etiqueta 3:</label>
					<select class="form-control" id="tags3" name="tags3">
						<?php
						// Leer la lista de tags desde el archivo JSON
						$tags = json_decode(file_get_contents('tags.json'), true);
						// Crear un option para cada tag
						foreach ($tags as $tag) {
							echo "<option value=\"$tag\">$tag</option>";
						}
						?>
					</select>
				</div>
				<button type="submit" class="btn btn-outline-primary">Ingresar</button>
			</form>
	</div>
	<!-- Enlace a jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>