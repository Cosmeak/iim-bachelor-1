<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png" />
    <title>Drezia Esport</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
        include ("include/bdd.php");

        if(isset($_SESSION['id'])){
            $requser = $bdd->prepare("SELECT * FROM members WHERE id = ?");
            $requser->execute(array($_SESSION['id']));
            $user = $requser->fetch();
            if(isset($_POST['newnickname']) AND !empty($_POST['newnickname']) AND $_POST['newnickname'] != $user['nickname']){
                $newnickname = trim(htmlspecialchars($_POST['newnickname']));
                $insertnickname = $bdd->prepare("UPDATE membres SET nickname = ? WHERE id = ?");
                $insertnickname->execute(array($newnickname, $_SESSION['id']));
                header('Location: profile.php?id='.$_SESSION['id']);
            }
            if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email']){
                $newemail = htmlspecialchars($_POST['newemail']);
                $insertemail = $bdd->prepare("UPDATE members SET email = ? WHERE id = ?");
                $insertemail->execute(array($newemail, $_SESSION['id']));
                header('Location: profile.php?id='.$_SESSION['id']);
            }
            if(isset($_POST['newpassword']) AND !empty($_POST['confirm_newpassword']) AND isset($_POST['confirm_newpassword']) AND !empty($_POST['confirm_newpassword'])){
                $newpassword = $_POST['newpassword'];
                $confirm_newpassword = $_POST['confirm_newpassword'];
                if($newpassword == $confirm_newpassword){
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $insertmdp = $bdd->prepare("UPDATE members SET password = ? WHERE id = ?");
                    $insertmdp->execute(array($password_hash, $_SESSION['id']));
                    header('Location: profile.php?id='.$_SESSION['id']);
                } else{
                    $error = "Your passwords aren't the same !";
                }
            }
            if(isset($_FILES['profile_picture']) AND !empty($_FILES['profile_picture']['name'])){
                $max_weight = 2097152;
                if($_FILES['profile_picture']['size'] <= $max_weight) {
                    $extensions = array('jpg', 'jpeg', 'gif', 'png');
                    $extension_upload = strtolower(substr(strrchr($_FILES['profile_picture']['name'], '.'), 1));
                    if(in_array($extension_upload, $extensions)){
                        $go_to = "img/profile_pictures/".$_SESSION['id'].".".$extension_upload;
                        $move = move_uploaded_file($_FILES['profile_picture']['tmp_name'], $go_to);
                        if($move) {
                            $update_profile_picture = $bdd->prepare('UPDATE members SET profile_picture = :profile_picture WHERE id = :id');
                            $update_profile_picture->execute(array(
                                'profile_picture' => $_SESSION['id'].".".$extension_upload,
                                'id' => $_SESSION['id']
                                ));
                            header('Location: profile.php?id='.$_SESSION['id']);
                        } else {
                            $error = "Can't import your profile picture!";
                        }
                    } else {
                        $error = "Your profile picture need to be in .jpg, .jpeg, .gif or .png";
                    }
                } else {
                    $error = "Votre photo de profil ne doit pas dépasser 2Mo";
                }
            }
    ?>
    <div class="first">
        <h3 class="title-page">Edit profile</h3>
        <div class="edit_profile">
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="text_table_to_right"><label>Nickname:</label></td>
                        <td><input type="text" name="newnickname" placeholder="Nickname" value="<?= $user['nickname']; ?>"></td>
                    </tr>
                    <tr>
                        <td class="text_table_to_right"><label>Email:</label></td>
                        <td><input type="text" name="newemail" placeholder="Email" value="<?= $user['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td class="text_table_to_right"><label>New password:</label></td>
                        <td><input type="password" name="newpassword" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td class="text_table_to_right"><label>Confirm the new password:</label></td>
                        <td><input type="password" name="confirm_newpassword" placeholder="Confirm password"></td>
                    </tr>
                    <tr>
                    <td class="text_table_to_right"><label>Profile picture:</label></td>
                    <td><input type="file" name="profile_picture"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update my profile"></td>
                    </tr>
                </table>
                
            </form>
            <p class="error" style="text-align:center;">
                <?php 
                    if(isset($error)){ 
                        echo $error;
                    } 
                ?>
            </p>
        </div>
    </div>
</body>
</html>
    <?php   
        }
        else {
            header("Location: index.php");
        }
    ?>