<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <title>Drezia Esport</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
        include ("include/bdd.php");

        if(isset($_GET['id']) AND $_GET['id'] > 0){
            $getid = $_GET['id'];
            $requser = $bdd->prepare('SELECT * FROM members WHERE id = ?');
            $requser->execute(array($getid));
            $userinfo = $requser->fetch();
    ?>
            <h3 class="title-page first">Your profile</h3>
            <section class="profile">
                <img src="img/profile_pictures/<?php echo $userinfo['profile_picture']; ?>" alt="Profile picture of <?php echo $userinfo['nickname']; ?>" width="250px">
                <p>Nickname: <?php echo $userinfo['nickname']; ?></p> 
                <p>Email: <?php echo $userinfo['email']; ?></p>
                <?php
                if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){
                ?>
                    <a href="edit_profile.php">Edit profile</a>
                <?php } ?>
            </section>
            <section class="activity"></section>
</body>
</html>
        <?php } ?>