<header class="desktop">
    <div class="header-bottom">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="Drezia esport Logo" title="Drezia Logo"></a>
            <a href="index.php"><p>DREZIA</p></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="shop.php">SHOP</a></li>
                <li><a href="events.php">EVENTS</a></li>
                <li><a href="blog.php">BLOG</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </nav>
        <div class="account">
            <?php
                session_start();

                if(array_key_exists('nickname', $_SESSION)){
            ?>
            <p><?= ($_SESSION['nickname']); ?><p>
            <div class="prehexagon">
                <div class="hexagon"><img src="img/profile_pictures/<?= ($_SESSION['profile_picture']); ?>" alt=""></div>
            </div>
            <div class="account_menu">
                <ul>
                    <li><a href="profile.php?id=<?= ($_SESSION['id']) ?>">My profile</a></li>
                    <li><button class="dark-mode-btn" onclick="dark_mode()">Dark/Light mode</button></li>
                    <?php if(isset($_SESSION['rank']) && $_SESSION['rank'] == 2){ ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <?php } ?>
                    <li><a href="include/signout.php">Sign out</a></li>
                </ul>
            </div>
            <?php } else{ ?>
            <button onclick="location.href='signin.php'" class="signin_button account_btn" id="signin">SIGN IN</button>
            <button onclick="location.href='signup.php'" class="signup_button account_btn" id="signup">SIGN UP</button>
            <?php } ?>
        </div>
    </div>
    <div class="gradiant-rod"></div>
</header>