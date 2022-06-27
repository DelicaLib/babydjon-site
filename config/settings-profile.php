<?php
    require_once 'connect.php';
    require_once '../libs/db.php';
    session_start();
    $newData = $_POST;
    $user = R::findOne( 'users', ' login LIKE ? ', [$_SESSION['signin']['login']] );
    if (isset($_POST))
    {
        if(!empty($_FILES['avatar']['name'])){
            $name = $_SESSION['signin']['login'].strrchr($_FILES['avatar']['name'], ".");
            if(!move_uploaded_file($_FILES['avatar']['tmp_name'], "../uploads/$name")) {
                $_SESSION['msg'] = 'Пароли не совпадают!';
                $_SESSION['settingsIsOpen'] = true;
                header('location:../profile.php');
            }
            if(!empty($_SERVER['signin']['avatar'])){
                unlink("uploads/".$user['avatar']);
                $user->avatar = $name;
            } else {
                $user->avatar = $name;
            }
        }

        if ($newData['firstname'] != NULL)
        {
            $_SESSION['user']['firstname'] = $newData['firstname'];
        }
        if ($newData['secondname'] != NULL)
        {
            $_SESSION['user']['secondname'] = $newData['secondname'];
        }
        if ($newData['birthday'] != NULL)
        {
            $_SESSION['user']['birthday'] = $newData['birthday'];
        }
        if ($newData['gender'] != NULL)
        {
            $_SESSION['user']['gender'] = $newData['gender'];
        }
        if ($newData['email'] != NULL)
        {
            $_SESSION['user']['email'] = $newData['email'];
        }
        if ($newData['phone'] != NULL)
        {
            $_SESSION['user']['phone'] = $newData['phone'];
        }
        if ($newData['vk'] != NULL)
        {
            $_SESSION['user']['vk'] = $newData['vk'];

        }
        if ($newData['site'] != NULL)
        {
            $_SESSION['user']['site'] = $newData['site'];
        }
        if (md5($newData['password']) != $_SESSION['signin']['password'])
        {
            $_SESSION['msg'] = 'Неправильно введён пароль!';
            $_SESSION['settingsIsOpen'] = true;
            header('location:../profile.php');
        }
        else if ($newData['newPassword'] != $newData['newPasswordRepeat'])
        {
            $_SESSION['msg'] = 'Пароли не совпадают!';
            $_SESSION['settingsIsOpen'] = true;
            header('location:../profile.php');
        }
        else if (count(R::find( 'users', ' email LIKE ? ', [$newData['email']] )) != 0)
        {
            $_SESSION['msg'] = 'Почта уже занята!';
            $_SESSION['settingsIsOpen'] = true;
            header('location:../profile.php');
        }
        else if (count(R::find( 'users', ' phone LIKE ? ', [$newData['phone']] )) != 0)
        {
            $_SESSION['msg'] = 'Номер телефона уже занят!';
            $_SESSION['settingsIsOpen'] = true;
            header('location:../profile.php');
        }
        else
        {
            
            if ($newData['firstname'] != NULL)
            {
                $_SESSION['user']['firstname'] = $newData['firstname'];
                $user->firstname = $newData['firstname'];
            }
            if ($newData['secondname'] != NULL)
            {
                $_SESSION['user']['secondname'] = $newData['secondname'];
                $user->secondname = $newData['secondname'];
            }
            if ($newData['birthday'] != NULL)
            {
                $_SESSION['user']['birthday'] = $newData['birthday'];
                $user->birthday = $newData['birthday'];
            }
            if ($newData['gender'] != NULL)
            {
                $_SESSION['user']['gender'] = $newData['gender'];
                $user->gender = $newData['gender'];
            }
            if ($newData['email'] != NULL)
            {
                $_SESSION['user']['email'] = $newData['email'];
                $user->email = $newData['email'];
            }
            if ($newData['phone'] != NULL)
            {
                $_SESSION['user']['phone'] = $newData['phone'];
                $user->phone = $newData['phone'];
            }
            if ($newData['vk'] != NULL)
            {
                $_SESSION['user']['vk'] = $newData['vk'];
                if (strpos($newData['vk'], 'http://') === 0)
                {
                    $newData['vk'] = substr($newData['vk'], 7);
                }
                else if (strpos($newData['vk'], 'https://') === 0)
                {
                    $newData['vk'] = substr($newData['vk'], 8);
                }
                if (strlen($newData['vk']) > strlen('vk.com/') && strpos($newData['vk'], 'vk.com/') === 0)
                {
                    $user->vk = $newData['vk'];
                }
                else
                {
                    $_SESSION['msg'] = 'Неверно указана ссылка на вк!';
                    $_SESSION['settingsIsOpen'] = true;
                    header('location:../profile.php');
                }

            }
            if ($newData['site'] != NULL)
            {
                $_SESSION['user']['site'] = $newData['site'];
                if (strpos($newData['site'], 'http://') === 0)
                {
                    $newData['site'] = substr($newData['site'], 7);
                }
                else if (strpos($newData['site'], 'https://') === 0)
                {
                    $newData['site'] = substr($newData['site'], 8);
                }
                $user->site = $newData['site'];
            }
            if ($newData['newPassword'] != NULL)
            {
                $user->password = md5($newData['newPassword']);
            }
            R::store($user);
            unset($_POST);
            header('location:../profile.php');
        }
    }
    else
    {
        $_SESSION['msg'] = 'Произошла ошибка!';
        $_SESSION['settingsIsOpen'] = true;
        header('location:../profile.php');
    }