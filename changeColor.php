<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 24.03.2017
 * Time: 11:25
 */
require_once  'app/init.php';
print_r($_POST);
$color = $_POST['Color'];
$id = $_POST['id'];
$doneQuery = $db->prepare("UPDATE items SET Color = '$color'  WHERE id = $id");
$doneQuery->execute();

header ('Location: index.php');
