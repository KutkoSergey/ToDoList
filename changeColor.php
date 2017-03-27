<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 24.03.2017
 * Time: 11:25
 */
require_once  'app/init.php';
print_r($_POST);

$id = $_POST['id'];

$color = key($_POST);
echo $color;
next($_POST);
$color = key($_POST);

echo $color;
next($_POST);
$color = key($_POST);

echo $color;

$doneQuery = $db->prepare("UPDATE items SET Color = '$color'  WHERE id = $id");
$doneQuery->execute();
//header ('Location: index.php');
