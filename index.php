<?php

include("config/config.php");
include("config/bd.php"); // commentaire
include("divers/balises.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniFacebook</title>


    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>

<?php
if (isset($_SESSION['info'])) {
    echo "<div>
          <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
?>


<header>
    <div class="tete">
        <div class="container">
            <h3>My Face </h3>
        </div>
        <?php if (isset($_SESSION['id'])) { 
            echo "  <nav>
                     <a href='index.php?action=accueil'>Profil</a> 
                     <a href='index.php?action=mur'>Mon Mur</a> 
                    </nav>";
                    } ?>
    </div>
</header>

<div>

        <?php
        if (isset($_SESSION['id'])) {
            echo "Bonjour " . $_SESSION['login'] . " <a href='index.php?action=deconnexion'>Deconnexion</a>";
        } else {
            if($_GET['action'] !='login'&& $_POST['creation']!="envoyer"){
            header('location: index.php?action=login');
            }
        }
        ?>

</div>

            <?php
            // Quelle est l'action à faire ?
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = "accueil";
            }

            // Est ce que cette action existe dans la liste des actions
            if (array_key_exists($action, $listeDesActions) == false) {
                include("vues/404.php"); // NON : page 404
            } else {
                include($listeDesActions[$action]); // Oui, on la charge
            }

            ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
            ?>


<footer></footer>
</body>
</html>