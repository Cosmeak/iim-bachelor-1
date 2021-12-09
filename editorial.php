<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="css/summernote-lite.min.css" rel="stylesheet">
    <title>Drezia -> Create Article</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
        include ("include/bdd.php");

        if(isset($_SESSION['rank']) && $_SESSION['rank'] >= 1 ){

            $edit_mode = 0;

            if(isset($_GET['edit']) && !empty($_GET['edit'])){
                $edit_mode = 1;
                $article_id = htmlspecialchars($_GET['edit']);
                $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
                $edit_article->execute(array($article_id));
                if($edit_article->rowCount() == 1){
                    $edit_article = $edit_article->fetch();
                } else{
                    die('This article don\'t exist !');
                }
            }

            if(isset($_POST['title'], $_POST['content'])){
                if(!empty($_POST['title']) AND !empty($_POST['content'])){ //On vérifie que les champs d'article ont bien été rempli
                    if(isset($_FILES['img_blog']) AND !empty($_FILES['img_blog']['name'])){
                        $max_weight = 2097152;
                        if($_FILES['img_blog']['size'] <= $max_weight){
                            $extensions = array('jpg', 'jpeg', 'png');
                            $extension_upload = strtolower(substr(strrchr($_FILES['img_blog']['name'], '.'), 1));
                            if(in_array($extension_upload, $extensions)){
                                $title = htmlspecialchars($_POST['title']);
                                $content = $_POST['content'];
                                $go_to = "img/articles/".$title.".".$extension_upload;
                                $move = move_uploaded_file($_FILES['img_blog']['tmp_name'], $go_to);
                                $way = str_replace("", " ", $title).".".$extension_upload;
                                if($move){
                                    if($edit_mode == 0){
                                    $post_article = $bdd->prepare('INSERT INTO articles (img_blog, title, content, date_time) VALUES (?,?, ?, NOW())'); //NOW() permet de récupérer la date du système
                                    $post_article->execute(array($way, $title, $content));
                                    $error = 'Your article has been send !';
                                    } else{
                                        $update_article = $bdd->prepare('UPDATE articles SET title = ?, content = ?, date_time = NOW(), img_blog = ? WHERE id = ?');
                                        $update_article->execute(array($title, $content, $way, $article_id));
                                        $error = 'Your article has been updated !';
                                    }
                                }
                            }else{
                                $error = "Your image need to be in .jpg, .jpeg, or .png";
                            }
                        } else{
                            $error = "Image is too weight !";
                        }
                    } else{
                        $error = "Please upload an image for your article !";
                    }
                } else{
                    $error = "All fields needs to be complete !";
                }
            }
    ?>
    <h5 class="title-page first">Write your new article !</h5>
    <div class="write_article">
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="text_table_to_right"><label for="title">Article title:</label></td>
                    <td><input type="text" name="title" placeholder="Title" class="article_input" value="<?php if(isset($_GET['edit']) && !empty($_GET['edit'])){echo $edit_article['title'];} ?>"></td>
                </tr>
                <tr>
                    <td class="text_table_to_right"><label for="content">Article content:</label></td>
                <td><textarea id="summernote" class="article_input" name="content" placeholder="Write your article here"><?php if(isset($_GET['edit']) && !empty($_GET['edit'])){echo $edit_article['content'];} ?></textarea></td>    
                </tr>
                <tr>
                    <td class="text_table_to_right"><label for="img_blog">Card image:</label></td>
                    <td><input type="file" name="img_blog" value="img/articles/<?= $edit_article['img_blog'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Post article" class="post_article_button_form"></td>
                </tr>
            </table>
        </form>
    </div>
    <p class="error" style="text-align:center;">
            <?php 
                if(isset($error)){ 
                    echo $error; 
                } 
            ?>
    </p>
    <script src="js/summernote-lite.min.js"></script>
    <script src="js/summernoteOPT.js"></script>
</body>
</html>
    <?php }else{
        header('Location: blog.php');
        exit();
    } ?>