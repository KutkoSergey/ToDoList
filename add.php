<?php

require_once  'app/init.php';


    $name = " ";


        $addedQuery = $db->prepare("INSERT INTO items (name, user, done, Color ) VALUES (:name, :user, 0, 'white')");
        $addedQuery->execute(['name' => $name, 'user' => $_SESSION['user_id']]);


header ('Location: index.php');
?>

