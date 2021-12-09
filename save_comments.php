<?php
    session_start();
    include ("include/bdd.php");
    $nickname = $_SESSION['nickname'];
    $comment = $_POST["comment"];
    $date_time = date('Y-m-d H:i:s');
    if(!empty($nickname) && !empty($comment)){
        $send_comment= $bdd->prepare("INSERT INTO data_comments(nickname,date_time, comment) VALUES(:nickname, :date_time, :comment)");
        $send_comment->execute(array("nickname" => $nickname,
                                "date_time" => $date_time,
                                "comment" => $comment));
        header("Location: shop.php#cheatcode");
    }
    else{
    header("Location: shop.php?error=1#cheatcode");
}
?>