<?php
    include ("bdd.php");
    $data_del = $bdd->prepare("DELETE FROM articles WHERE id = ?");
    $data_del->execute(array($_POST['id']));
    header("Location: ../dashboard.php");
?>
