<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 23.03.2017
 * Time: 22:45
 */

require_once  'app/init.php';

/*if(isset($_POST['name'])) {
    $name = trim($_POST['name']);

    if(!empty($name)) {
        $addedQuery = $db->prepare("INSERT INTO items (name, user, done ) VALUES (:name, :user, 0)");
        $addedQuery->execute(['name' => $name, 'user' => $_SESSION['user_id']]);

    }
}*/

//header ('Location: index.php');
print_r($_POST);
?>