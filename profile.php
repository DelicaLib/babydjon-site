<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="shorcut icon" href="images/icon_babidjon.png" sizes="16x16">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
    <script src="libs/jquery-3.6.0.min.js"></script>
</head>

<body>

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
            <a class="menu-text" href="/">
                <p>Главная</p>
            </a>
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
            <button class="menu-text-main">
                Профиль
            </button>
        </nav>
    </menu>

    <main class="profile">
        <div class="avatar">
            <div class="avatar-img">
                <img src="images/avatar.jpg" class = 'avatar-img--photo'>
            </div>
            <button class="avatar-img--change">Изменить профиль</button>
        </div>
        <div class="profile-main">
            <div class="profile-info">
                <div class="profile-info-first">
                    <p class="user">Пользователь</p>
                    <div class="status">
                        <p class = "online-active">В сети</p>
                        <img src="icons/online-active.png" class="status-icon" alt="">
                    </div>
                </div>
                <div class="about-user">
                    <h3 class="username">Никонов Данила</h3>
                    <div class="user-info">
                        <div style="display: flex; flex-direction: column;">
                            <p>Возраст: 18</p>
                            <p>День рождения: 29.11.2003</p>
                            <p>Пол: Мужской</p>
                            <div class="user-mail">
                                <img src="icons/icon_mail.png" class="user-mail-icon" alt="">
                                <p>Почта: danil-nikonov-2017@mail.ru</p>
                            </div>
                            <div class="user-vk">
                                <img src="icons/icon_vk.png" class="user-vk-icon" alt="">
                                <p>Вконтакте: <a href="https://vk.com/nikonovdan16" target="_blank">vk.com/nikonovdan16</a></p>
                            </div>
                            <div class="user-site">
                                <img src="icons/icon_earth.png" class="user-site-icon" alt="">
                                <p>Сайт: <a href="/" target="_blank">babydjon.ru</a></p>
                            </div>
                        </div>
                        <div class="dream">
                            <p>Товар мечты:</p>
                            <div class="dream-item">
                                <div class="dream-gradient"></div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-buttons">
                <a href="#">
                    История покупок
                </a>
                <a href="#">
                    Избранные товары
                </a>
                <a href="#">
                    Страница на форуме
                </a>
                
            </div>
        </div>
        
    </main>

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