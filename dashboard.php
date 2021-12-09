<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Drezia -> Dashboard</title>
</head>
<body>
    <?php
        include ('include/bdd.php');

        session_start();

        if(isset($_SESSION['rank']) && $_SESSION['rank'] == 2){ //* On vérifie que la seesion ouverte est bien celle d'un admin 
    ?>
    <section class="adminhide">
        <nav class="admin-menu">
            <div class="dashboard-logo">
                <a href="index.php"><img src="img/logo.png" alt="Drezia esport Logo" title="Drezia Logo"></a>
                <a href="index.php"><p>DREZIA</p></a>
            </div>
            <ul class="adminsection adminmarge">
                <li><a href="#" onclick="montrer('homeadmin')">Home <i class="las la-home"></i> </a></li>
                <li><a href="#" onclick="montrer('membersadmin')">Members <i class="las la-user-circle"></i></a></li>
                <li><a href="#" onclick="montrer('contactsadmin')">Contacts <i class="lar la-address-card"></i></a></li>
                <li><a href="#" onclick="montrer('commentsadmin')">Comments <i class="las la-comment"></i></a></li>
                <li><a href="#" onclick="montrer('articlesadmin')">Articles <i class="las la-newspaper"></i></a></li>
            </ul>
            <a href="index.php" class="back-website adminmarge"> <- Go back to website </a>
        </nav>
        <div class="headbar">
            <div class="title-dashboard">Dashboard</div>
            <div class="admin-account">
                <div class="account-profile">
                    <p><?= ($_SESSION['nickname']); ?><p>
                    <p class="rank"><?php if($_SESSION['rank'] == 2){ //* On affiche en dessous du pseudo le rang de la personne connecté (admin ou éditeur)
                            echo "Admin";
                        }else if($_SESSION['rank'] == 1){
                            echo "Editor";
                        } ?></p>
                </div>           
                <div class="prehexagon">
                    <div class="hexagon"><img src="img/profile_pictures/<?= ($_SESSION['profile_picture']); ?>" alt=""></div>
                </div>
            </div>
        </div>
        <section class="globaladmin">
            <div id="homeadmin">
                Welcome back !
            </div>
            <div id="membersadmin" style="display:none;">
                <div class="members-admin-grid">
                    <?php 
                        $recup_member = $bdd->query('SELECT * FROM members ORDER BY id DESC'); //* On affiche chaque membre avec son email, son pseudo et son rang 
                        while($data = $recup_member->fetch()){ ?>
                            <div class="member container_admin">
                                <p><strong>Nickname: </strong><?= $data['nickname'] ?></p>
                                <p><strong>Email: </strong><?= $data['email'] ?></p>
                                <p><strong>Rank: </strong>
                                    <?php if($data['rank'] == 2){ ?>
                                        <select name="rank">
                                            <option value="0">Member</option>
                                            <option value="1">Editor</option>
                                            <option value="2" selected>Admin</option>
                                        </select> 
                                    <?php }else if($data['rank']  == 1){ ?>
                                        <select name="rank">
                                            <option value="0">Member</option>
                                            <option value="1" selected>Editor</option>
                                            <option value="2">Admin</option>
                                        </select> 
                                    <?php }else{ ?>
                                        <select name="rank">
                                            <option value="0" selected>Member</option>
                                            <option value="1">Editor</option>
                                            <option value="2">Admin</option>
                                        </select> 
                                    <?php } ?>
                                </p>
                                <div class="member_button_list">
                                    <form action="include/deletemember.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <button type="submit" class="admin_button">Delete</button> //* le classique bouton pour supprimer un utilisateur
                                    </form>
                                    <a href="editrank.php?edit=<?= ($data['id']) ?>" class="admin_button">Modify rank</a>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>
            <div id="contactsadmin" style="display:none;">
                <div class="contacts-admin-grid">
                    <?php 
                        $recup_contact = $bdd->query('SELECT * FROM form ORDER BY id DESC');
                        while($data = $recup_contact->fetch()){ ?>
                            <div class="contacts container_admin"> //* On affiche chaque demande de contact envoyé avec une mise en forme du message avec qui l'a envoyé, son mail puis ce qu'il a envoyé 
                                <p> <strong><?= $data['name_'] ?></strong> vous a écrit avec l'adresse mail <strong><?= $data['email'] ?></strong> pour vous dire :</p>
                                <br>
                                <p><?= $data['commentary'] ?></p>
                                <form action="include/deletecontact.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                    <button type="submit" class="admin_button">Delete</button>
                                </form> 
                            </div>
                    <?php } ?>
                </div>
            </div>
            <div id="commentsadmin" style="display:none;">
                <div class="comments-admin-grid"> //* On affiche tout les commentaires posté sous les articles du shop avec l'option de supprimer le message d'un utilisateur
                    <?php
                        $response = $bdd->query('SELECT * FROM data_comments ORDER BY id DESC');
                        while($data = $response->fetch()){
                    ?>  
                            <div class="comment container_admin"> 
                                <p><strong><?= $data['nickname']; ?></strong></p>
                                <p><?= $data['comment']; ?></p>
                                <p><?= $data['date_time']; ?></p>
                                <form action="include/deletecomment.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                    <button type="submit" class="admin_button">Delete</button>
                                </form> 
                            </div>
                    <?php } ?>
                </div>
            </div>
            <div id="articlesadmin" style="display:none;"> 
                <a href="editorial.php" class="admin_button" style="margin-left:10px;">Create article</a>
                <div class="articles-admin-grid"> //* On affiche tout les articles dans une grille avec l'option de voir l'article complet, le supprimer et le modifier et on a aussi un bouton pour aller sur une page pour écrire un nouvel
                    <?php 
                        $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time DESC');
                        while($i = $articles->fetch()){
                    ?>
                        <div class="article" >
                            <div class="article_img">
                                <img src="img/articles/<?php echo $i['img_blog']; ?>" alt="">
                            </div>
                            <div class="article_text">
                                <h2><?= ($i['title']) ?></h2> <!-- //* Affichage du titre de l'article -->
                                <div><?= substr(strip_tags($i['content']), 0, 100) ?>...</div> <!-- //* Affichage du contenu - Le strip_tags retire les éléments php et hmtl d'un contenu et le substr s'occupe de ne prendre que les 100 premiers caractères de l'article pour les afficher dans la carte -->
                                <div class="link-separator">
                                    <a href="article.php?id=<?= ($i['id']) ?>" class="view-more">View More</a> <!-- //* Lien pour aller voir l'article complet -->
                                    <form action="include/deletearticle.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $i['id']; ?>">
                                        <button type="submit" class="admin_button">Delete</button> <!-- //* Retour du classque bouton de suppression -->
                                    </form> 
                                    <a href="editorial.php?edit=<?= ($i['id']) ?>" class="view-more">Edit article</a> <!-- //* Lien pour aller modifier l'arcticle -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </section>
    <?php 
        } else{
        header('Location: index.php');
        exit();
        }
    ?>
    <script src="js/dashboard.js"></script>
</body>
</html>