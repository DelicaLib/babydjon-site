<?php
require_once 'connect.php';
require_once '../libs/db.php';
session_start();
unset($_SESSION['signin']);
header('location:../index.php');