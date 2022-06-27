<?php
    require 'libs/db.php';
    session_start();
    if (isset($_SESSION['signin']))
    {
        header('location:profile.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
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
    <div class="all">
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
                <a class="menu-text" href="index.php">
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
            
        <main>
            <div class="auth">
                <div class="auth-window">

                    <p>Регистрация</p>
                    <form action="config/do-signup.php" method="post">
                        <input type="text" name="firstname" placeholder="Имя" required maxlength="64" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['firstname'].'"');
                        ?>>
                        <input type="text" name="secondname" placeholder="Фамилия" required maxlength="64" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['secondname'].'"');
                        ?>>
                        <select name="gender">
                        <?php
                            if (isset($_SESSION['user']))
                            {
                                echo('<option>'.$_SESSION['user']['gender'].'</option>');
                                if(strcmp($_SESSION['user']['gender'], 'Выберите пол') == 0)
                                {
                                    ?>
                                        <option>Мужской</option>
                                        <option>Женский</option>
                                    <?php
                                }
                                else if (strcmp($_SESSION['user']['gender'], 'Мужской') != 0)
                                {
                                    echo('<option>Мужской</option>');
                                }
                                else
                                {
                                    echo('<option>Женский</option>');
                                }

                            }
                            else
                            {
                        ?>
                            <option>Выберите пол</option>
                            <option>Мужской</option>
                            <option>Женский</option>
                        <?php
                            }
                        ?>
                        </select>
                        <input type="date" name="birthday" required <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['birthday'].'"');
                        ?>>
                        <input type="email" name="email" placeholder="Почта" required <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['email'].'"');
                        ?>>
                        <input type="tel" name="phone" placeholder="Телефон" required <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['phone'].'"');
                        ?>>
                        <input type="login" name="login" placeholder="Логин" required maxlength="32" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['login'].'"');
                        ?>>
                        <input type="password" name="password" placeholder="Пароль" required maxlength="128">
                        <input type="password" name="password1" placeholder="Повторите пароль" required maxlength="128">
                        <button type="submit" name="reg">Зарегистрироваться</button>
                    </form>
                    <?php
                    if (isset($_SESSION['msg']))
                    {
                        echo($_SESSION['msg']);
                    }
                    else
                    {
                        echo('<p style="font-size: 20px;">Уже есть аккаунт? - <a href="signin.php">Авторизируйтесь</a></p>');
                    }
                    unset($_SESSION['msg']);
                    unset($_SESSION['user']);
                    ?>
                </div>
            </div>
        </main>
    </div>
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