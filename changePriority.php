<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 24.03.2017
 * Time: 11:54
 */
require_once  'app/init.php';
print_r($_POST);
$priority = $_POST['priority'];
$id = $_POST['id'];
$doneQuery = $db->prepare("UPDATE items SET priority = '$priority'  WHERE id = $id");
$doneQuery->execute();

header ('Location: index.php');