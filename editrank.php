<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia -> Dashboard</title>
</head>
<body>
<?php
        session_start();
        include ('include/bdd.php');

        $edit_id = $_GET['edit'];
        $edito = $bdd->prepare("SELECT * FROM members WHERE id= $edit_id");
        $edito->execute(); // pour edit l'id correspondant
        $edition = $edito->fetch();

        $edit_rang = $edition['rank']; // on recup le rang actuel
        if($_POST){
            if(isset($_POST['newrang'])){
                $insert = $bdd->prepare('UPDATE members SET rank = ? WHERE id = ?');
                $insert->execute(array($_POST['newrang'],$edit_id)); // on insère le nouveau rang
                header ('location: dashboard.php');
                $_SESSION['rang'] = $_POST['newrang'];
            }
        }
        
    ?>
<form  method="POST" action='' style='padding-top:7vh;'>
        <p> <?php echo $edition['nickname']; ?></p>
        <label for="rang"> rank </label>
        <input type="number" name="newrang"  value='<?= $edit_rang ?>'>
        <a href="paneladmin.php"><input type="submit" value="Modifier"></a>
</form>

</body>
</html>