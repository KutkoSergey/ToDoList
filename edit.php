<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 23.03.2017
 * Time: 22:45
 */
print_r($_POST);
$bool = isset($_POST['checkBox']);
echo $bool;
require_once  'app/init.php';
$newName = $_POST['Name'];
$id = $_POST['id'];
$doneQuery = $db->prepare("UPDATE items SET name = '$newName' WHERE id = $id");
$doneQuery->execute();
if(isset($_POST['checkBox'])){
    $doneQuery = $db->prepare("UPDATE items SET done = '1' WHERE id = $id");
    $doneQuery->execute();
}
else{
    $doneQuery = $db->prepare("UPDATE items SET done = '0' WHERE id = $id");
    $doneQuery->execute();
}

//header ('Location: index.php');
