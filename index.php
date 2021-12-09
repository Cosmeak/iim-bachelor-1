<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <title>Drezia Esport</title>
</head>
<body>
    <?php
        include ("include/header.php");
        include ("include/header_mobile.php");
    ?>
    <section class="container first">
        <h2 class="title">Last News</h2>
        <div class="last-news-block">
            <?php 
                include ('include/bdd.php');

                $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time DESC LIMIT 0,3');
            ?>
            <div class="last-news-block1 content-blocks">
                <h2 class="title-block">New member in LoL Team !</h2>
                <p class="paragraph-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nihil illo vel non eligendi. Ad placeat cupiditate cumque est, dolores, debitis dolorem quod commodi, asperiores eius fuga nihil at ullam.</p>
                <a href="#" class="view-more">View More</a>
            </div>
            <div class="last-news-block2 content-blocks">
                <h2 class="title-block">Our last members news</h2>
                <a href="#" class="view-more">View More</a>
            </div>
            <div class="last-news-block3 content-blocks">
                <h2 class="title-block">Coucou toi, y'a rien à voir ici</h2>
                <a href="#" class="view-more">View More</a>
            </div>
            <div class="last-news-block4">
            </div>
        </div>
    </section>
    <section class="container">
        <h2 class="title">Tournaments</h2>
        <div class="slider-tournaments">
            <div class="tournament">
                <div class="game tournament-flex"><img src="img/events/cs-go.png" alt=""></div>
                <div class="plateform tournament-flex"><img src="img/events/pc.png" alt=""></div>
                <div class="info tournament-flex">Info :<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ad unde aperiam esse adipisci, id aspernatur blanditiis cupiditate</div>
                <div class="pool-prize tournament-flex">Pool prize : $$$$</div>
                <div class="enter tournament-flex"><button>Enter now</button></div>            
            </div>
            <div class="tournament">
                <div class="game tournament-flex"><img src="img/events/lol.png" alt=""></div>
                <div class="plateform tournament-flex"><img src="img/events/pc.png" alt=""></div>
                <div class="info tournament-flex">Info :<br> Lorem ipsum dolor sit, amet consectetur adipisicing elit. </div>
                <div class="pool-prize tournament-flex">Pool prize : $$$$</div>
                <div class="enter tournament-flex"><button>Enter now</button></div>            
            </div>
            <div class="tournament">
                <div class="game tournament-flex"><img src="img/events/lol.png" alt=""></div>
                <div class="plateform tournament-flex"><img src="img/events/pc.png" alt=""></div>
                <div class="info tournament-flex">Info :<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, veniam!</div>
                <div class="pool-prize tournament-flex">Pool prize : $$$$</div>
                <div class="enter tournament-flex"><button>Enter now</button></div>            
            </div>
        </div>
    </section>
    <section class="container">
        <h2 class="title">Teams</h2>
        <div class="team-info">
            <section>
                <h2>League of Legends</h2>
                <div class="slider_container">
                    <div class="slide fade">
                        <img src="img/articles/background_blog.jpg">
                        <div class="slide_text">
                            <p>Complete team</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nulla aspernatur molestiae sit dignissimos corrupti totam neque sequi non soluta enim quam, exercitationem est mollitia debitis distinctio officiis, fugiat repellendus?</p>
                        </div>
                    </div>
                    <div class="slide fade" style="display:none;">
                        <img src="img/profile_pictures/3.jpg">
                        <div class="slide_text">
                            <p><strong>Nickname:</strong> RazMesboules</p>
                            <p><strong>Name:</strong> Antoine DUBUCQ</p>
                            <p><strong>Age:</strong> 19yo</p>
                            <p><strong>Position:</strong> Top</p>
                            <div>
                                <p><strong>Characters:</strong></p>
                                <ul>
                                    <li>Darius</li>
                                    <li>Renekton</li>
                                    <li>Jax</li>
                                </ul>
                            </div>
                            <p><strong>Description:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nulla aspernatur molestiae sit dignissimos corrupti totam neque sequi non soluta enim quam, exercitationem est mollitia debitis distinctio officiis, fugiat repellendus?</p>
                        </div>
                    </div>
                    <div class="slide fade" style="display:none;">
                        <img src="img/profile_pictures/2.gif">
                        <div class="slide_text">
                            <p><strong>Nickname:</strong> Plotix10</p>
                            <p><strong>Name:</strong> Gianni MENNET</p>
                            <p><strong>Age:</strong> ?Unknown?</p>
                            <p><strong>Position:</strong> Jungle</p>
                            <div>
                                <p><strong>Characters:</strong></p>
                                <ul>
                                    <li>Kha Ziks</li>
                                    <li>Evelynn</li>
                                    <li>Udyr</li>
                                </ul>
                            </div>
                            <p><strong>Description:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nulla aspernatur molestiae sit dignissimos corrupti totam neque sequi non soluta enim quam, exercitationem est mollitia debitis distinctio officiis, fugiat repellendus?</p>
                        </div>
                    </div>
                    <div class="slide fade" style="display:none;">
                        <img src="img/profile_pictures/default.png">
                        <div class="slide_text">
                            <p><strong>Nickname:</strong> Shunporina</p>
                            <p><strong>Name:</strong> Florian MORICE</p>
                            <p><strong>Age:</strong> ?Unknown?</p>
                            <p><strong>Position:</strong> ?Unknown?</p>
                            <div>
                                <p><strong>Characters:</strong></p>
                                <ul>
                                    <li>Katarina</li>
                                    <li>Velkoz</li>
                                    <li>Ahri</li>
                                </ul>
                            </div>
                            <p><strong>Description:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nulla aspernatur molestiae sit dignissimos corrupti totam neque sequi non soluta enim quam, exercitationem est mollitia debitis distinctio officiis, fugiat repellendus?</p>
                        </div>
                    </div>
                    <div class="slide fade" style="display:none;">
                        <img src="img/profile_pictures/3.jpg">
                        <div class="slide_text">
                            <p><strong>Nickname:</strong> Neezek</p>
                            <p><strong>Name:</strong> Mathis PINO</p>
                            <p><strong>Age:</strong> ?Unknown?</p>
                            <p><strong>Position:</strong> ADC</p>
                            <div>
                                <p><strong>Characters:</strong> Pas le time pour un seul, tous c'est mieux</p>
                            </div>
                            <p><strong>Description:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nulla aspernatur molestiae sit dignissimos corrupti totam neque sequi non soluta enim quam, exercitationem est mollitia debitis distinctio officiis, fugiat repellendus?</p>
                        </div>
                    </div>
                    <div class="slide fade" style="display:none;">
                        <img src="img/profile_pictures/1.gif">
                        <div class="slide_text">
                            <p><strong>Nickname:</strong> Oxyzal</p>
                            <p><strong>Name:</strong> Steven MADI</p>
                            <p><strong>Age:</strong> 19yo</p>
                            <p><strong>Position:</strong> Support</p>
                            <div>
                                <p><strong>Characters:</strong></p>
                                <ul>
                                    <li>Nautilus</li>
                                    <li>Braum</li>
                                    <li>Leona</li>
                                </ul>
                            </div>
                            <p><strong>Description:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nulla aspernatur molestiae sit dignissimos corrupti totam neque sequi non soluta enim quam, exercitationem est mollitia debitis distinctio officiis, fugiat repellendus?</p>
                        </div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <div class="slider_dots_container">
                    <span class="slider_dot" onclick="currentSlide(1)"></span> 
                    <span class="slider_dot" onclick="currentSlide(2)"></span> 
                    <span class="slider_dot" onclick="currentSlide(3)"></span> 
                    <span class="slider_dot" onclick="currentSlide(4)"></span>
                    <span class="slider_dot" onclick="currentSlide(5)"></span>
                    <span class="slider_dot" onclick="currentSlide(6)"></span>
                </div>
            </section>
            
    </section>
    <section class="container">
        <h2 class="title">Store</h2>
        <div class="shirt">
            <img class="img_shop" src="img/shop/shirt.png" alt="Un t-shirt">
            <img class="img_shop" src="img/shop/shirt.png" alt="Un t-shirt">
            <img class="img_shop" src="img/shop/shirt.png" alt="Un t-shirt">
            <img class="img_shop" src="img/shop/shirt.png" alt="Un t-shirt">
            <img class="img_shop" src="img/shop/shirt.png" alt="Un t-shirt">
        </div>
    </section>
    <section class="container">
        <h2 class="title">Video / Stream</h2>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ITnl8uSvhs0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>
</body>
<script src="js/index.js"></script>
</html>