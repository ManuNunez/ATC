	<?php
	session_start();
	if (isset($_GET["post-content"])) {
	}
	$json_tags = file_get_contents('BD/tags.json');
	$tags = json_decode('BD/tags.json');
	$json_posts = file_get_contents('BD/posts.json');
	$posts = json_decode($json_posts, true);
	if (isset($_GET["post-content"])) {

		$post = [];
		$post["postAuthor"] = $_SESSION["username"];
		$post["postText"] = $_GET["post-content"];
		$post["postText"] = $_GET["post-content"];
		array_unshift($posts, $post);
		$json_posts = json_encode($posts, JSON_UNESCAPED_LINE_TERMINATORS | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		file_put_contents('BD/posts.json', $json_posts);
	}

	?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>ATC</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/simplex/bootstrap.min.css" integrity="sha384-FYrl2Nk72fpV6+l3Bymt1zZhnQFK75ipDqPXK0sOR0f/zeOSZ45/tKlsKucQyjSp" crossorigin="anonymous">
		<script src="index.js"></script>
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
						if (!isset($_SESSION["logged"])) {

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
								<a class="nav-link" href="logout.php">Log out</a>
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
					<?php
					if (isset($_SESSION["logged"])) {
					?>
						<a href="#" class="btn btn-outline-primary" onclick="showPostControls()">Nuevo post</a>
						<div class="answer" id="post-text-area" style="display:none;">
							<form id="new-post" action="index.php">
								<div class="form-floating mb-3">
									<textarea class="form-control" name="post-content" placeholder="Escribe tu publicación aquí"></textarea>
									<>
								</div>

								<button class="btn btn-primary" onclick="savePost();">Guardar</button>
							</form>
						</div>

					<?php
					}
					?>
					<hr>
					<div class="row">
						<?php
						for ($i = 0; $i < count($posts); $i++) {
							$post = (object)($posts[$i]);

						?>
							<div class="col-md-12">
								<div class="card mb-3">
									<img class="card-img-top" src="perfil2.jpg" alt="Foto de Perfil">
									<div class="card-body">
										<h4 class="card-title"><?= $post->postAuthor ?></h4>
										<h6 class="card-subtitle text-muted">TAGS</h6>
										<p class="card-text"><?= $post->postText ?>.</p>
										<?php
										if ($_SESSION["logged"]) {

										?>
											<a href="https://wa.me/+523319907854?text=Hola%2C%20responde" class="btn btn-outline-primary">Solicitar Chat</a>
											<a href="#" class="btn btn-outline-primary" onclick="showAnswerControls(<?= $i ?>)">Responder</a>

											<div class="answer" id="post-text-area" style="display:none;">
												<form id="new-asnwer" action="index.php">
													<div class="form-floating mb-3">
														<textarea class="form-control" name="post-content" placeholder="Escribe tu respuesta aquí"></textarea>
														<>
													</div>

													<button class="btn btn-primary" onclick="saveAsnwer();">Guardar</button>
												</form>
											<?php
										} else {

											?>
												<a href="#" class="btn btn-outline-primary" href="login.php">Login</a>
											<?php
										}
											?>
											</div>
									</div>
								</div>
							<?php
						}
							?>
							</div>
							<div class="col-md-3">
								<h2>Mas opciones</h2>
								<ul class="list-group">
									<a href="#" onclick="workingOnThis()">
										<li class="list-group-item">Filtrar por tags</li>
									</a>
									<a href="study_groups.php">
										<li class="list-group-item"> Grupo de Estudio</li>
									</a>
								</ul>
							</div>
					</div>
				</div>
			</div>
		</div>




		<!-- Bootstrap JavaScript -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	</body>

	</html>