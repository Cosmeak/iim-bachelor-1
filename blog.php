<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia -> Blog</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
    ?>
    <h5 class="title-page first">Welcome to the blog !</h5>
    <section class="global_articles">
        <?php 
            include ("include/bdd.php");

            $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time DESC'); //On récupère tout les articles et on les classes du plus récent au plus ancien
            while($i = $articles->fetch()){ // tant qu'il y a des articles dans la base de donnée on fait ce qu'il y a en dessous jusqu'à avoir affiché tout les articles
        ?>
        <div class="article" >
            <div class="article_img">
                <img src="img/articles/<?php echo $i['img_blog']; ?>" alt="">
            </div>
            <div class="article_text">
                <h2><?= ($i['title']) ?></h2> <!-- Affichage du titre -->
                <div><?= substr(strip_tags($i['content']), 0, 100) ?>...</div> <!-- Affichage du contenu - Le strip_tags retire les éléments php et hmtl d'un contenu -->
                <a href="article.php?id=<?= ($i['id']) ?>" class="view-more">View More</a> <!-- Lien de redirection vers l'article complet -->
            </div>
        </div>
        <?php } ?>
</body>
</html>