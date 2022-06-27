<?php
    require 'config/connect.php';
    require 'libs/db.php';
    session_start();
    if (isset($_SESSION['signin']))
    {
        $signin = R::findOne( 'users', ' login LIKE ? ', [$_SESSION['signin']['login']] );
        $_SESSION['signin'] = $signin;
        if($_SERVER['QUERY_STRING'] != 'user='.$_SESSION['signin']['id']) {
            parse_str($_SERVER['QUERY_STRING'], $_SESSION['signin']['id']);
        }
    }
    else
    {
        trim($_SERVER['QUERY_STRING']);
        header('location:signin.php');
    }

?>


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
    <div class="overlay"></div>
    <div class="settings-profile">
        <div>
            <form action="config/settings-profile.php" class="setting-form" method="post" enctype="multipart/form-data">
                <div class="setting-avatar">
                    <div>
                        <img src="icons/icon-close.png" class="modal-close" onclick="settingsClose()">
                    </div>
                    <img src=<?php
                    if ($_SESSION['signin']['avatar']!= NULL)
                    {
                        echo('"uploads/'.$_SESSION['signin']['avatar'].'"');
                    }
                    else
                    {
                        echo('"images/empty_Avatar.png"');
                    }
                    ?> class = 'avatar-img--photo' alt="">
                    <input class='form_input' name='avatar' type="file" >
                </div>
                
                <div class="setting-form">
                    <div>
                        <label for="firstname">Имя:</label>
                        <input type="text" name="firstname" class="new-news-header setting-input" placeholder="Имя" maxlength="64" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['firstname'].'"');
                        ?>>
                    </div>
                    <div>
                        <label for="secondname">Фамилия:</label>
                        <input type="text" name="secondname" class="new-news-header setting-input" placeholder="Фамилия" maxlength="64" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['secondname'].'"');
                        ?>>
                    </div>
                    <div>
                        <label for="birthday">Дата рождения:</label>
                        <input type="date" name="birthday" class="new-news-header setting-input" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['birthday'].'"');
                        ?>> 
                    </div>
                    <div>
                        <label for="gender">Пол:</label>
                        <select name="gender" class="new-news-header setting-input">
                        <?php
                            echo('<option>'.$_SESSION['signin']['gender'].'</option>');
                            if (strcmp($_SESSION['signin']['gender'], 'Мужской') != 0)
                            {
                                echo('<option>Мужской</option>');
                            }
                            else
                            {
                                echo('<option>Женский</option>');
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="email">Почта:</label>
                        <input type="email" name="email" class="new-news-header setting-input" placeholder="Почта" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['email'].'"');
                        ?>>
                    </div>
                    <div>
                        <label for="phone">Номер телефона:</label>
                        <input type="tel" name="phone" class="new-news-header setting-input" placeholder="Телефон" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['phone'].'"');
                        ?>>
                    </div>
                    <div>
                        <label for="vk">Ссылка на вк:</label>
                        <input type="text" name="vk" class="new-news-header setting-input" placeholder="vk.com/" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['vk'].'"');
                        ?>>
                    </div>
                    <div>
                        <label for="site">Ссылка на личный сайт:</label>
                        <input type="text" name="site" class="new-news-header setting-input" placeholder="Ссылка" <?php
                        if (isset($_SESSION['user']))
                            echo('value="'.$_SESSION['user']['site'].'"');
                        ?>>
                    </div>
                    <div>
                        <label for="password">Введите пароль:</label>
                        <input type="password" name="password" class="new-news-header setting-input" required placeholder="Пароль">
                    </div>
                    <div>
                        <label for="newPassword">Введите новый пароль:</label>
                        <input type="password" name="newPassword" class="new-news-header setting-input" placeholder="Новый пароль">
                    </div>
                    <div>
                        <label for="newPasswordRepeat">Повторите новый пароль:</label>
                        <input type="password" name="newPasswordRepeat" class="new-news-header setting-input" placeholder="Повтор пароля">
                    </div>
                    <div>
                        <?php
                            if (isset($_SESSION['msg']))
                            {
                                echo('<p style="color: red; font-size: 20px; margin-right: 10px;">'.$_SESSION['msg'].'</p>');
                                unset($_SESSION['msg']);
                            }
                            unset($_SESSION['user']);
                        ?>
                        <button type="submit" name="submit">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


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
                    <img src=<?php
                    if ($_SESSION['signin']['avatar']!= NULL)
                    {
                        echo('"uploads/'.$_SESSION['signin']['avatar'].'"');
                    }
                    else
                    {
                        echo('"images/empty_Avatar.png"');
                    }
                    ?> class = 'avatar-img--photo'>
                </div>
                <div class="avatar-buttons">
                    <button class="avatar-img--change" onclick="settingsCall();">Изменить профиль</button>
                    <form action="config/do-signout.php">
                        <button class="avatar-img--change" id="signout">Выйти</button>
                    </form>
                </div>
            </div>
            <div class="profile-main">
                <div class="profile-info">
                    <div class="profile-info-first">
                        <?php
                            if ($_SESSION['signin']['privilege'] == 'Пользователь')
                            {
                               echo('<p class="user">Пользователь</p>');
                            }
                            else if ($_SESSION['signin']['privilege'] == 'Модератор')
                            {
                               echo('<p class="user" style = "color: blue;">Модератор</p>');
                            }
                            else if ($_SESSION['signin']['privilege'] == 'Администратор')
                            {
                               echo('<p class="user" style="color: red;">Администратор</p>');
                            }
                            else if ($_SESSION['signin']['privilege'] == 'Продавец')
                            {
                               echo('<p class="user" style="color: coral;">Продавец</p>');
                            }
                            else if ($_SESSION['signin']['privilege'] == 'Редактор')
                            {
                               echo('<p class="user" style="color: green;">Редактор</p>');
                            }
                            else
                            {
                                echo('<p class="user" style="color: blueviolet;">'.$_SESSION['signin']['privilege'].'</p>');
                            }
                        ?>
                        <div class="status">
                            <p class = "online-active">В сети</p>
                            <img src="icons/online-active.png" class="status-icon" alt="">
                        </div>
                    </div>
                    <div class="about-user">
                        <h3 class="username"><?php
                         echo($_SESSION['signin']['secondname'].' '.$_SESSION['signin']['firstname']);
                        ?></h3>
                        <div class="user-info">
                            <div style="display: flex; flex-direction: column;">
                                <p>Возраст: <?php
                                    $year = substr($_SESSION['signin']['birthday'], 0, 4);
                                    $month = substr($_SESSION['signin']['birthday'], -5, 2);
                                    $day = substr($_SESSION['signin']['birthday'], -2);
                                    $age = date('Y') - $year - 1;
                                    if (date('m') > $month)
                                    {
                                        $age++;
                                    }
                                    else if (date('m') == $month)
                                    {
                                        if (date('d') >= $day)
                                        {
                                            $age++;
                                        }
                                    }
                                    echo($age);
                                ?></p>
                                <p>День рождения: <?php
                                    echo($day.'.'.$month.'.'.$year);
                                ?></p>
                                <p>Пол: <?php
                                    echo($_SESSION['signin']['gender']);
                                ?></p>
                                <div class="user-mail">
                                    <img src="icons/icon_mail.png" class="user-mail-icon" alt="">
                                    <p>Почта: <?php
                                        echo($_SESSION['signin']['email']);
                                    ?></p>
                                </div>
                                <div class="user-vk">
                                    <img src="icons/icon_vk.png" class="user-vk-icon" alt="">
                                    <p>Вконтакте: <a href=<?php 
                                    if (strcmp($_SESSION['signin']['vk'], 'Неизвестно') != 0)
                                    {
                                        echo('"http://'.$_SESSION['signin']['vk'].'"');
                                    }
                                    else
                                    {
                                        echo('""');
                                    }
                                    ?> target="_blank"><?php
                                        echo($_SESSION['signin']['vk']);
                                    ?></a></p>
                                </div>
                                <div class="user-site">
                                    <img src="icons/icon_earth.png" class="user-site-icon" alt="">
                                    <p>Сайт: <a href=<?php 
                                    if (strcmp($_SESSION['signin']['site'], 'Неизвестно') != 0)
                                    {
                                        echo('"http://'.$_SESSION['signin']['site'].'"');
                                    }
                                    else
                                    {
                                        echo('""');
                                    }
                                    ?> target="_blank"><?php
                                    echo($_SESSION['signin']['site']);
                                ?></a></p>
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
    <?php
        if (isset($_SESSION['settingsIsOpen']))
        {
            ?>
            <script>
                onload = settingsCall()
            </script>

            <?php
            unset($_SESSION['settingsIsOpen']);
        }
    ?>
    
</body>
</html>