<?php
    session_start();
    $_SESSION = array();
    session_destroy(); //On détruit la session pour déconnecter la personne
    header("Location: ../index.php");
?>