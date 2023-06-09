<?php
session_start();
$json_groups = file_get_contents('BD/study_groups.json');
$groups = json_decode($json_groups, true);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Study Groups</title>
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
    <div class="container-fluid">
        
            <br>
            <a href="new_study_group.php" class="btn btn-outline-primary">Nuevo grupo de Estudio</a>

        <?php
        for ($m = 0; $m < count($groups); $m++) {
            $group = (object)($groups[$m])


        ?>
        <br>
            <div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <?php
                            if ($group->image = "default") {
                            ?>

                                <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Card image">

                            <?php
                            } else {
                            ?>
                                <img src=<?= $group->image ?> class="card-img-top" alt="Card image">
                            <?php
                            }
                            ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $group->title ?></h5>
                                <p class="card-text">
                                    <?= $group->description ?>
                                <ul>
                                    <li>fundador: <?= $group->founder ?></li>
                                    <li>contacto : <?= $group->contact ?></li>
                                    <li>Horarios : <?= $group->days ?></li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


    < <!-- Bootstrap JavaScript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>