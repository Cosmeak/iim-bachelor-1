<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia -> Sign Up</title>
</head>
<body>
        <?php
            include ("include/header.php");
            include ("include/header_mobile.php");
            include ("include/bdd.php");

            if(isset($_POST['confirm_sign_in'])){
                $nickname = trim(htmlspecialchars($_POST['nickname'])); //On retire les espaces et les charactères html du pseudo et du mail
                $email = trim(htmlspecialchars($_POST['email']));
                $password= $_POST['password']; 
                $confirm_password = $_POST['confirm_password'];
                if(!empty($_POST['nickname']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirm_password'])){ //On vérifie que tout les champs ne sont pas vide
                    $nicknamelength = strlen($nickname); //Donne le nombre de caractère présent dans la string
                    $emaillength = strlen($email);
                    if($nicknamelength <= 20){ //On vérifie que le pseudo est inférieur à 20 caractères
                        $reqnickname = $bdd->prepare("SELECT * FROM members WHERE nickname = ?"); //On récupère tout les pseudos de la bdd
                        $reqnickname->execute(array($nickname));
                        $nicknameexist = ""; //On défini la variable avec une string vide pour éviter une erreur ligne 31
                        foreach ($reqnickname as $compare_nickname){
                            $nicknameexist = strcmp($nickname, $compare_nickname['nickname']);
                        }
                        if($nicknameexist !== 0){//On vérifie que la variable du dessus n'a pas trouver de pseudo écrit de la même manière
                            if($emaillength <= 255){ 
                                if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //On vérifie que l'adresse mail existe
                                    $reqemail = $bdd->prepare("SELECT * FROM members WHERE email = ?");
                                    $reqemail->execute(array($email));
                                    $emailexist = $reqemail->rowCount();
                                    if($emailexist == 0){//On vérifie que l'adresse email est pas déjà prise dans la bdd
                                        if($password == $confirm_password){ //On vérifie que les deux mdp donné sont les mêmes pour éviter les fautes de frapppe de l'utilisateur
                                            $password_hash = password_hash($password, PASSWORD_DEFAULT);//hachage du mot de passe maintenant car avant la vérification on ne peut pas vérifier que les deux mots de passe ne sont pas les mêmes après hachage
                                            $insert_data_account = $bdd->prepare("INSERT INTO members(nickname, email, password, profile_picture, rank) VALUES(?, ?, ?, ?, ?)");
                                            $insert_data_account->execute(array($nickname, $email, $password_hash, "default.png", 0)); //On entre tout les renseignements dans la bdd
                                            $error = "Your account was created !<a href=\"login.php\">Login</a>"; //Message de création du compte plus lien pour la redirection pour se connecter
                                            header('location: signin.php');
                                        } else{
                                            $error = "Your passwords aren't the same !";
                                        }
                                    } else {
                                        $error = "Email already used !";
                                    }
                                } else {
                                    $error = "Your email isn't valide !";
                                }
                            } else {
                                $error = "Email too long !";
                            }
                        } else{
                            $error = "Nickname already used !";
                        }
                    } else {
                        $error = "Nickname too long !";
                    }
                } else {
                    $error = "All fields needs to be complete !";
                }
            }
        ?>
    <div class="parallax">
        <div class="sign_box first">
            <div class="signup">
                <h3 class="title-page">Sign up</h3>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td class="text_table_to_right"><label for="nickname">Nickname:</label></td>
                            <td><input type="text" placeholder="Choose a nickname" name="nickname" id="nickname"></td>
                        </tr>
                        <tr>
                            <td class="text_table_to_right"><label for="email">Email:</label></td>
                            <td><input type="email" placeholder="Your email" name="email" id="email"></td>
                        </tr>
                        <tr>
                            <td class="text_table_to_right"><label for="password">Password:</label></td>
                            <td><input type="password" placeholder="Choose your password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td class="text_table_to_right"><label for="confirm_password">Confirm password:</label></td>
                            <td><input type="password" placeholder="Comfirm your password" name="confirm_password" id="confirm_password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Sign Up" name="confirm_sign_in" class="form_button"></td>
                        </tr>
                    </table>
                </form>
                <p class="error" style="text-align: center;">
                    <?php
                        if(isset($error)) {
                            echo $error; //On affiche une erreur si il y en a une qui a été détecté précédement
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