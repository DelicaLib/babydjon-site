<?php
    require_once 'connect.php';
    require_once '../libs/db.php';
    session_start();
    $newUser = $_POST;

    if (isset($newUser['reg']))
    {
        $_SESSION['user']['login'] = $newUser['login'];
        $_SESSION['user']['firstname'] = $newUser['firstname'];
        $_SESSION['user']['secondname'] = $newUser['secondname'];
        $_SESSION['user']['birthday'] = $newUser['birthday'];
        $_SESSION['user']['email'] = $newUser['email'];
        $_SESSION['user']['phone'] = $newUser['phone'];
        $_SESSION['user']['gender'] = $newUser['gender'];
        $newUser['login'] = strtolower($newUser['login']);
        $newUser['firstname'] = mb_convert_case($newUser['firstname'], MB_CASE_TITLE, 'utf-8');
        $newUser['secondname'] = mb_convert_case($newUser['secondname'], MB_CASE_TITLE, 'utf-8');
        $newUser['email'] = strtolower($newUser['email']);
        echo(count(R::find( 'users', ' login LIKE ? ', [$newUser['login']] )));
        if (strcmp($newUser['gender'], 'Выберите пол') == 0)
        {
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Вы не выбрали пол</p>';
            header('location:../signup.php');
        }
        else if (strcmp($newUser['password'], $newUser['password1']) != 0)
        {
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Пароли не совпадают!</p>';
            header('location:../signup.php');
        }
        else if (count(R::find( 'users', ' login LIKE ? ', [$newUser['login']] )) != 0)
        {
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Логин уже занят!</p>';
            header('location:../signup.php');
        }
        else if (count(R::find( 'users', ' email LIKE ? ', [$newUser['email']] )) != 0)
        {
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Почта уже занята!</p>';
            header('location:../signup.php');
        }
        else if (count(R::find( 'users', ' phone LIKE ? ', [$newUser['phone']] )) != 0)
        {
            $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Номер телефона уже занят!</p>';
            header('location:../signup.php');
        }
        else
        {
            $user = R::dispense('users');
            $user->login = $newUser['login'];
            $user->password = md5($newUser['password']);
            $user->firstname = $newUser['firstname'];
            $user->secondname = $newUser['secondname'];
            $user->gender = $newUser['gender'];
            $user->birthday = $newUser['birthday'];
            $user->email = $newUser['email'];
            $user->phone = $newUser['phone'];
            $id = R::store( $user );
            unset($_POST);
            $_SESSION['msg'] = '<p style="font-size: 20px;">Уже есть аккаунт? - <a href="signin.php">Авторизируйтесь</a></p>';
            unset($_SESSION['user']);
            header('location:../signin.php');
        }
    }
    else 
    {
        $_SESSION['msg'] = '<p style="font-size: 20px; color: red;">Произошла ошибка!</p>';
        header('location:../signup.php');
    }
