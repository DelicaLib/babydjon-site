<?php
    require_once 'connect.php';
    require_once '../libs/db.php';
    session_start();
    $user = $_POST;

    if (isset($user['auth']))
    {
        $_SESSION['user']['login'] = $user['login'];
        $user['login'] = strtolower($user['login']);
        $signin = R::findOne( 'users', ' login LIKE ? ', [$user['login']] );
        if (count($signin) == 0)
        {
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Неверно введён логин!</p>';
            header('location:../signin.php');
        }
        else if ($signin['password'] != md5($user['password']))
        {   
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Неверно введён пароль!</p>';
            header('location:../signin.php');
        }
        else
        {
            $_SESSION['signin'] = $signin;
            header('location:../profile.php');
        }
        unset($_POST);
    }
    else 
    {
        $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Произошла ошибка!</p>';
        header('location:../signin.php');
    }
