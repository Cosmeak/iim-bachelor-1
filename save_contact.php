<?php
    include ("include/bdd.php");
    $name = htmlspecialchars ($_POST["name"]);
    $email = htmlspecialchars ($_POST["email"]);
    $commentary = htmlspecialchars ($_POST["commentary"]);

    $la_poste = $bdd->prepare("INSERT INTO form(name_, email, commentary) VALUES(:name_, :email,:commentary)");
    $la_poste->execute(array("name_" => $name, 
                            "email" => $email, 
                            "commentary" => $commentary));
    
    header("Location: contact.php");