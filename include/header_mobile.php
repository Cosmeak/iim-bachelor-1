<header class="mobile">
    <div class="visible">
        <a href="index.php"><img src="img/logo.png" alt="Drezia esport Logo" title="Drezia Logo"></a>
        <a href="index.php"><p>DREZIA</p></a>
        <div class="burger">
            <div class="rod"></div>
            <div class="rod"></div>
            <div class="rod"></div>
        </div>
    </div>
    <div class="gradiant-rod"></div>
    <nav style="display:none;">
        <h5 class="menu-title">Navigation</h5>
        <ul class="sous-menu">
            <li><a href="index.php">HOME</a></li>
            <li><a href="shop.php">SHOP</a></li>
            <li><a href="events.php">EVENTS</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
        <h5 class="menu-title" style="padding-top: 20px;">Account</h5>
        <ul class="sous-menu">
            <?php
                if(array_key_exists('nickname', $_SESSION)){
            ?>
                <li><a href="profile.php?id=<?php echo ($_SESSION['id']) ?>">My profile</a></li>
                <li><button class="dark-mode-btn" onclick="dark_mode()">Dark/Light mode</button></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="signout.php">Sign out</a></li>
            <?php } else{ ?>
                <li><button onclick="location.href='signin.php'" class="signin_button account_btn">SIGN IN</button></li>
                <li><button onclick="location.href='signup.php'" class="signup_button account_btn">SIGN UP</button></li>
            <?php } ?>
        </ul>
    </nav>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>