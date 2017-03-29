<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 23.03.2017
 * Time: 22:45
 */
require_once  'app/init.php';
print_r($_POST);
$newName = $_POST['name'];
$id = $_POST['id'];

if(isset($_POST['doneItem'])){
    $doneQuery = $db->prepare("UPDATE items SET done = 1 WHERE id = $id");
    $doneQuery->execute();
}
else{
    $doneQuery = $db->prepare("UPDATE items SET done = 0 WHERE id = $id");
    $doneQuery->execute();
}

    $doneQuery = $db->prepare("UPDATE items SET name = '$newName' WHERE id = $id");
    $doneQuery->execute();


header ('Location: index.php');


