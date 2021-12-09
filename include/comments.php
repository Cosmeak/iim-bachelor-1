<div class="global_comments">
<?php 
    if(array_key_exists('nickname', $_SESSION)){
    $error =""; 
?>
    <form id="cheatcode" class="comment_form" name="data_comments" method="POST" action="save_comments.php">
        <label for="comment">Your comment :</label>
        <textarea type="text" name="comment" id="summernote"></textarea><br>
        <button type="submit">SEND</button>
        <?php 
        if(isset($_GET['error']) && $_GET['error']==1){?>
            <div class="error"><?= "You didn't complete all the fields !";?></div>
            <?php } ?>

        <?php }else{ ?>
            <div class="not-login-comments">
                <p><a href="signin.php">Sign in</a> to comment !</p>
                <p>You do not have an account ?<a href="signup.php">Sign Up !</a></p>
            </div>
        <?php } ?>
    </form>
    <section class="all_comments">
        <?php
            include("bdd.php");
            $response = $bdd->query('SELECT * FROM data_comments ORDER BY id DESC');
            while($data = $response->fetch()){
        ?>  
        <div>
            <div class="comments">
                <p><?= $data['nickname']; ?></p>
                <p><?= $data['comment']; ?></p>
                <p><?= $data['date_time']; ?></p>
            </div>
        </div>
        <?php
            }
            $response->closeCursor();//Ferme la requête pour permettre de la reéxecuter ensuite
        ?>  
    </section>
</div>