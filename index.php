<?php
    require_once "config/connect.php";
    require_once "config/functions.php";
    require_once 'libs/db.php';
    $title = mysqli_query($connect, "SELECT * FROM `title`");
    $title = mysqli_fetch_all($title);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Бабиджон</title>
    <link rel="shorcut icon" href="images/icon_babidjon.png" sizes="16x16">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
    <script src="libs/jquery-3.6.0.min.js"></script>
    <!-- 105, 198, 230
         182, 223, 227
         144, 208, 181
         169, 212, 141
         83, 188, 218
         62, 110, 62 -->
</head>

<body>
    <div class="overlay"></div>
    <div class="modal">
        <img src="icons/icon-close.png" class="modal-close" onclick="settingsClose()">
        <form data-i="0" action="config/create.php" id="new-news-form" method="post">
            <!-- <input type="file" id="new-news-input-1" placeholder="Заголовок новости" class="new-news-header-file"> -->
            <input type="text" style="display: none;" value="0" name="dataId" id="dataId">
            <input id="new-news-input" placeholder="Заголовок новости" class="new-news-header" name="title">
            <textarea id="new-news-text" placeholder="Новость" class="new-news-text" name="text"></textarea>
            <button type="submit" name="submit">Сохранить</button>
        </form>
    </div>
    <img src="icons/icon_up.png" class="main-up">
    <img src="icons/icon_up_arrow.png" class="main-up-arrow">

    <header>
        <div class="babydjon">
            <h1 onclick="window.location.href = '/';"> Babydjon </h1>
        </div>
        <div class="header-text">
            <h2 style="width: 300px;">
                официальный сайт подгузников
                <p style="font-size: 15px;">и не только</p>
            </h2>
        </div>
    </header>

    <menu>
        <nav>
            <button class="menu-text-main">
                Главная
            </button>
            <a class="menu-text" href="https://vk.com/zheleznyakov03">
                <p>Ассортимент</p>
            </a>
            <a class="menu-text" href="https://vk.com/zheleznyakov03">
                <p>Сообщения</p>
            </a>
            <a class="menu-text" href="https://vk.com/zheleznyakov03">
                <p>Друзья</p>
            </a>
            <a class="menu-text" href="https://vk.com/zheleznyakov03">
                <p>Форум</p>
            </a>
            <a class="menu-text" id="contacts">
                <p>Контакты</p>
            </a>
            <a class="menu-text" href="https://vk.com/zheleznyakov03">
                <p>Корзина</p>
            </a>
            <a class="menu-text" href="profile.php">
                <p>Профиль</p>
            </a>
        </nav>
    </menu>

    <main>
        <!---------------------first block--------------------->
        <div class="news-container first-block" id="first-block">
            <div class="news-box" id="first-block-box">
                <div class="news-icons">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 0, newsClose()">
                    <a onclick="i = 0, settingsOpen()"><img src="icons/icon-settings.png" class="news-settings"></a>
                </div>
                <?php
                $id = 1;
                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-06 21:00"><?= $title[$id-1][2] ?></time></p>
            </div>

            <div class="news-header" id="first-block-header">
                <img src="images/1-1.jpg">
                <button onclick="i = 0, newsCall()" id="first-block-button">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------second block--------------------->
        <div class="news-container second-block" id="second-block">
            <div class="news-box" id="second-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 1, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 1, settingsOpen()">
                </div>
                <?php
                $id = 2;
                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-08 22:00"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="second-block-header">
                <img src="images/2-1.jpg">
                <button onclick="i = 1, newsCall()">
                    <p id="second-block-header-text"><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------third block--------------------->
        <div class="news-container third-block" id="third-block">
            <div class="news-box" id="third-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 2, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 2, settingsOpen()">
                </div>
                <?php
                                $id = 3;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-13 21:00"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="third-block-header">
                <img src="images/3-1.jpg">
                <button onclick="i = 2, newsCall()">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------fourth block--------------------->
        <div class="news-container fourth-block" id="fourth-block">
            <div class="news-box" id="fourth-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 3, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 3, settingsOpen()">
                </div>
                <?php
                                $id = 4;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-14 22:00"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="fourth-block-header">
                <img src="images/4-1.jpg">
                <button onclick="i = 3, newsCall()">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------fifth block--------------------->
        <div class="news-container fifth-block" id="fifth-block">
            <div class="news-box" id="fifth-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 4, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 4, settingsOpen()">
                </div>
                <?php
                                $id = 5;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-16 14:24"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="fifth-block-header">
                <img src="images/5-1.jpg">
                <button onclick="i = 4, newsCall()">
                <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------sixth block--------------------->
        <div class="news-container sixth-block" id="sixth-block">
            <div class="news-box" id="sixth-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 5, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 5, settingsOpen()">
                </div>
                <?php
                                $id = 6;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-16 14:44"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="sixth-block-header">
                <img src="images/6-1.jpg">
                <button onclick="i = 5, newsCall()">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------seventh block--------------------->
        <div class="news-container seventh-block" id="seventh-block">
            <div class="news-box" id="seventh-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 6, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 6, settingsOpen()">
                </div>
                <?php
                                $id = 7;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-16 15:06"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="seventh-block-header">
                <img src="images/7-1.jpg">
                <button onclick="i = 6, newsCall()">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------eighth block--------------------->
        <div class="news-container eighth-block" id="eighth-block">
            <div class="news-box" id="eighth-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 7, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 7, settingsOpen()">
                </div>
                <?php  
                                $id = 8;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-16 15:28"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="eighth-block-header">
                <img src="images/8-2.jpg">
                <button onclick="i = 7, newsCall()">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        <!---------------------ninth block--------------------->
        <div class="news-container ninth-block" id="ninth-block">
            <div class="news-box" id="ninth-block-box">
                <div style="display: flex; justify-content: space-between;">
                    <img src="icons/icon_back.png" class="news-back" onclick="i = 8, newsClose()">
                    <img src="icons/icon-settings.png" class="news-settings" onclick="i = 8, settingsOpen()">
                </div>
                <?php
                                $id = 9;
                                newsRead($id);
                ?>
                <p style="margin-left: 15px; color: rgb(78, 78, 78);">Опубликовано: <time datetime="2022-04-16 15:59"><?=$title[$id-1][2]?></time></p>
            </div>

            <div class="news-header" id="ninth-block-header">
                <img src="images/9-1.jpg">
                <button onclick="i = 8, newsCall()">
                    <p><?=$title[$id-1][1]?></p>
                </button>
            </div>
        </div>

        
    </main>
    <script src="newsBlocks.js"></script>
    <script src="marginCalc.js"></script>
    <footer>
        <div>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><img src="icons/icon_youtube.png" style="height: 40px;"></a>
            <a href="https://instagram.com/fdimaff" target="_blank"><img src="icons/icon_insta.png" style="height: 40px;"></a>
            <a href="https://t.me/ubludishe223" target="_blank"><img src="icons/icon_tg.png" style="height: 40px;"></a>
            <a href="https://vk.com/nikonovdan16" target="_blank"><img src="icons/icon_vk.png" style="height: 40px;"></a>
        </div>
        <div style="display: flex; justify-content: center; height: 150px; width: 400px;">
            <p style="display: flex; align-items: center; flex-direction: column;"><img src="icons/icon_gps.png" style="height: 30px; margin: 5px;"> Россия, 400005, Волгоград, пр. им. Ленина, 28 <img src="icons/icon_phone.png" style="height: 30px; margin: 5px;"> 8-800-555-35-35 </p>

        </div>
        <div>
            ©2022 babydjon.ru
            <p> Разработан ©2022 DelicaLib</p>
        </div>
    </footer>
    <script src="libs/p5.min.js"></script>
    <script src="libs/vanta.topology.min.js"></script>
    <script src="script.js"></script>
</body>

</html>