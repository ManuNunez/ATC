<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>ATC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/simplex/bootstrap.min.css"
		integrity="sha384-FYrl2Nk72fpV6+l3Bymt1zZhnQFK75ipDqPXK0sOR0f/zeOSZ45/tKlsKucQyjSp" crossorigin="anonymous">

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">ATC</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<?php
						if($_SESIONN["logged"])
						{

					?>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Log In</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="signup.php">Sign Up</a>
					</li>
					<?php
						}
						else{

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
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<h2>Posts de Usuarios</h2>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-3">
							<img class="card-img-top" src="perfil2.jpg" alt="Foto de Perfil">
							<div class="card-body">
								<h4 class="card-title">Nombre del Autor</h4>
								<h6 class="card-subtitle text-muted">TAGS</h6>
								<p class="card-text">Texto del Post.</p>
								<?php
								if($_SESIONN["logged"])
								{
			
								?>
								<a href="#" class="btn btn-outline-primary">Responder</a>
								<a href="#" class="btn btn-outline-primary">Solicitar Chat</a>
								<a href="#" class="btn btn-outline-primary">Guardar Post</a>
								<?php
								}
								else
								{
									
								?>
								<a href="#" class="btn btn-outline-primary">Login</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card mb-3">
							<img class="card-img-top" src="perfil2.jpg" alt="Foto de Perfil">
							<div class="card-body">
								<h4 class="card-title">Nombre del Autor</h4>
								<h6 class="card-subtitle text-muted">TAGS</h6>
								<p class="card-text">Texto del Post.</p>
								<?php
								if($_SESIONN["logged"])
								{
								?>
								<a href="#" class="btn btn-outline-primary">Responder</a>
								<a href="#" class="btn btn-outline-primary">Solicitar Chat</a>
								<a href="#" class="btn btn-outline-primary">Guardar Post</a>
								<?php
								}
								else
								{
									
								?>
								<a href="#" class="btn btn-outline-primary">Login</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card mb-3">
							<img class="card-img-top" src="perfil2.jpg" alt="Foto de Perfil">
							<div class="card-body">
								<h4 class="card-title">Nombre del Autor</h4>
								<h6 class="card-subtitle text-muted">TAGS</h6>
								<p class="card-text">Texto del Post.</p>
								<?php
								if($_SESIONN["logged"])
								{
			
								?>
								<a href="#" class="btn btn-outline-primary">Responder</a>
								<a href="#" class="btn btn-outline-primary">Solicitar Chat</a>
								<a href="#" class="btn btn-outline-primary">Guardar Post</a>
								<?php
								}
								else
								{
									
								?>
								<a href="#" class="btn btn-outline-primary">Login</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<h2>Mas opciones</h2>
				<ul class="list-group">
					<li class="list-group-item">Filtrar por tags</li>
					<li class="list-group-item">Buscar Grupo de Estudio</li>
				</ul>
			</div>
		</div>
	</div>



</body>

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>