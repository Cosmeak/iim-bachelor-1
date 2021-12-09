<?php
    include ("bdd.php");
    $data_del = $bdd->prepare("DELETE FROM form WHERE id = ?");
    $data_del->execute(array($_POST['id']));
    header("Location: ../dashboard.php");
?>
