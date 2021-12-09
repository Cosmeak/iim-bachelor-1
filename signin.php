<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia -> Sign In</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
        include ("include/bdd.php");

        if(isset($_POST['confirm_login'])){ //Si le bouton est activé
            if(!empty($_POST['emailconnect']) AND !empty($_POST['passwordconnect'])){ //On vérifie que les champs sont tout deux rempli
                $emailconnect = trim(htmlspecialchars($_POST['emailconnect']));
                $requser = $bdd->prepare("SELECT * FROM members WHERE email = ?");
                $requser->execute(array($emailconnect));
                $userinfo = $requser->fetch();
                if($userinfo !== false){
                    $passwordconnect = password_verify($_POST['passwordconnect'], $userinfo['password']);//On vérifie le mot passe donné dans le champs avec celui associé au compte dans la bdd
                    if($passwordconnect == true){ //On vérifie que le retour donné par passwordconnect est bon puis on récupère tout les éléments concernant l'utilisateur
                        $_SESSION['id'] = $userinfo['id'];
                        $_SESSION['nickname'] = $userinfo['nickname'];
                        $_SESSION['email'] = $userinfo['email'];
                        $_SESSION['profile_picture'] = $userinfo['profile_picture'];
                        $_SESSION['rank'] = $userinfo['rank'];
                        $error = "Vous êtes connecté";
                        header('location: index.php');
                    } else {
                        $error = "Wrong password !";
                    }
                } else {
                    $error = "Wrong email !";
                }
            } else {
                $error = "All fields needs to be complete !";
            }
        }
    ?>
    <div class="parallax">
        <div class="sign_box">
            <h3 class="title-page">Sign In</h3>
            <div class="signin">
                <form method="POST" action="">
                    <table>
                        <tr>
                        <td class="text_table_to_right"><label for="email">Email:</label></td>
                            <td><input type="email" name="emailconnect" placeholder="Your email"></td>
                        </tr>
                        <tr>
                            <td class="text_table_to_right"><label for="password">Password:</label></td>
                            <td><input type="password" name="passwordconnect" placeholder="Your password"></td>
                        </tr>
                    </table>
                    <input type="submit" name="confirm_login" value="Sign In" class="form_button">
                </form>
                    <p class="error" style="text-align: center;"> <!-- css mit en gros sale part flemme à corriger dans la class error pour gagner du temps et à corriger sur tout les pages contenant la classe error pour un retour de champs non rempli -->
                    <?php
                        if(isset($error)){
                            echo $error; //* On affiche si un champ n'a pas été complété dans un paragraphe (et en rouge pour que l'utilisateur voit ce qu'il n'a pas rempli)
                        }
                    ?>
                </p>
            </div>
        </div>
        <img src="img/parallax/1.png" class="layer" data-speed="5">
        <img src="img/parallax/2.png" class="layer" data-speed="8">
        <img src="img/parallax/3.png" class="layer" data-speed="-4">
        <img src="img/parallax/4.png" class="layer" data-speed="2">
        <img src="img/parallax/5.png" class="layer" data-speed="6">
        <img src="img/parallax/6.png" class="layer" data-speed="2">
        <img src="img/parallax/7.png" class="layer" data-speed="-2">
        <img src="img/parallax/8.png" class="layer" data-speed="9">
        <img src="img/parallax/9.png" class="layer" data-speed="-10">
        <img src="img/parallax/10.png" class="layer" data-speed="12">
        <img src="img/parallax/11.png" class="layer" data-speed="4">
        <img src="img/parallax/12.png" class="layer" data-speed="7">
    </div>
    <script src="js/sign.js"></script>
</body>
</html>