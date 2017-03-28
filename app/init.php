<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 23.03.2017
 * Time: 12:22
 */
session_start();
$_SESSION['user_id'] = 1;
$db = new PDO('mysql:dbname=todolist;host=localhost', 'root', '');
if(!isset($_SESSION['user_id'])) {
    die('you are not sign in.');
}