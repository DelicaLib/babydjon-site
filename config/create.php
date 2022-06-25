<?php
require_once 'connect.php';
require_once '../libs/db.php';
session_start();
$data = $_POST;
if (isset($data['submit']))
{
    $id = $data['dataId'];

    $table = R::findOne('title', 'id = ?', [$id+1]);
    $table -> name = $data['title'];
    $table -> data = date('Y-m-d H:i');
    R::store($table);

    $news = R::findAll('news', 'id_title = ?', [$id+1]);
    R::trashAll( $news );

    $news = $data['text'];
    $index = 0;
    $store = "<p>";
    $count = 0;
    while (strpos($news, "\n", $index))
    {
        $table = R::dispense('news');
        if ($index - $count > 900)
        {
            $store = $store.'</p>';
            $table->text = $store;
            $table->id_title = $id+1;
            R::store( $table );
            echo $table['text'];
            $store = "<p>";
            $count = $index;
        }
        else
        {
            $store = $store.substr($news, $index, strpos($news, "\n", $index) - $index).'</p><p>';
        }
        $index = strpos($news, "\n", $index)+1;
    }
    $table = R::dispense('news');
    if ($index - $count > 900)
    {
        $store = $store.'</p>';
        $table->text = $store;
        $table->id_title = $id+1;
    }
    else if ($index==0)
    {
        $store = $news;
        $table->text = $store;
        $table->id_title = $id+1;
    }
    else
    {
        $store = $store.substr($news, $index, -1).'</p>';
        $table->text = $store;
        $table->id_title = $id+1;
    }
    R::store( $table );
}

header('location:../index.php');