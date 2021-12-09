<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia -> Contact Us</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
    ?>
    <section class="contact first">
        <h3 class="title-page">Contact us</h3>
        <form id="form" action="save_contact.php" method="POST">
            <label for="nom">Name:</label>
            <br>
            <input type="text" name="name" id="nom" placeholder="Nom">
            <br>
            <label for="email">Email:</label>
            <br>
            <input type="email" name="email" id="email" placeholder="Email">
            <br>
            <label for="commentaire">Message:</label>
            <br>
            <textarea id="commentaire" name="commentary" placeholder="Your message"></textarea>
            <br><br>
            <button class="form_button" id="valider">Submit now</button>
            <br>
            <p id="retour"></p>
        </form>  
        <script src="js/contact.js"></script>
    </section>
    <!-- Ceci est mon ancien form de contact (css) c'est pour cela que le design n'entre pas avec le reste de site, il sera changé plus tard. J'ai préféré porter mon attention sur le php de cette semaine et les objectifs secondaires php, qui ne sont pas présent dans cette version du site pour éviter tout bug. -->
</body>
</html>