<?php 
    try
    {
        // connexion bdd 
        $bdd = new PDO('mysql:host=localhost;dbname=drezia;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    // si erreur, arret du chargement de la page 
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>