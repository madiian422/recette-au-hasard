<?php


session_start();

if (!$_SESSION['mdp']) {
    header('location:admin.php');
}

?>
<button><a href="deconnect.php">Déconnexion</a></button>