<?php
include ("bdd.php");
    $delete = "DELETE FROM data_comments WHERE id='$_POST[id]'";
    $data_del= $bdd->prepare($delete);
    $data_del->execute();
    header("Location: ../dashboard.php");
?>
