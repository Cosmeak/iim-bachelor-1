<?php
    include ("include/bdd.php");

    if(isset($_GET['id']) AND !empty($_GET['id'])){ //On vérifie que l'id de la page correspond à un article dans la base de donnée
        $get_id = htmlspecialchars($_GET['id']); //On récupère l'id
        $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $article->execute(array($get_id)); //On récupère tout les données concernant l'id demandé
        if($article->rowCount() == 1) { //On vérifie qu'il y a bien des données dans l'id demandé sinon renvoie une erreur
            $article = $article->fetch();
            $img = $article['img_blog'];
            $title = $article['title'];
            $content = $article['content'];
            $date_time = $article['date_time'];
        } else {
            die('This article don\'t exist !');
        }
    } else{
    die('Error');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia -> Article: <?= $title ?></title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
    ?>

    <section class="article_page first">
        <img src="img/articles/<?= $img ?>" alt="">
        <h1 class="title-page"><?= $title ?></h1> <!-- On affiche le titre de l'article -->
        <div class="article_content"><?= $content ?></div><!-- On affiche le contenu de l'article -->
        <p class="date" style="text-align:end; margin-top:20px;"><?= $date_time ?></p> <!-- On affiche la date de création de l'article --> 
    </section>
</body>
</html>