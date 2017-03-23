<?php

require_once 'app/init.php';

$itemsQuery = $db->prepare("SELECT id, name, done FROM items WHERE user = :user");
$itemsQuery->execute(['user' => $_SESSION['user_id']]);
$items = $itemsQuery->rowCount() ? $itemsQuery : [];
/*foreach ($items as $item) {
    echo  $item['name'], '';
}*/

?>



<!DOCTYPE html>
<html>
    <head>
        <title>To Do List</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">﻿
        <link href="http://fonts.googleapis.com/css?family=Open+Sans|Shadows+Into+Light+Two" rel="stylesheet">﻿
        <link rel = "stylesheet" href="css/main.css">

        <meta name = "viewport" content = "width = device-width, user-scalable=no, initial-scale=1.0, maximum-scale = 1.0, minimum-scale = 1.0">

    </head>
    <body>
        <div class = "list">
            <h1 class = "header">To do.</h1>
            <?php if(!empty($items)): ?>
            <ul class = "items">
                <?php foreach ($items as $item ): ?>
                    <li>
                        <span class = "item<?php echo  $item['done'] ? ' done' : '' ?>" name = "name"><?php echo $item['name'] ?>"</span>
                        <form class = "item-del" action="delete.php" method = "post">
                            <textarea rows = "10" cols = "45" >$items['name']</textarea>
                            <input type = "submit" value = "Delete" class = "submit">

                        </form>
                        <?php if(!$item['done']): ?>
                        <a href = "mark.php?as=done&item=<?php echo $item ['id']; ?>" class = "done-button">Mark as done</a>

                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
                <p>You haven't added any items yet</p>

            <?php endif; ?>
            <form class = "item-add" action="add.php" method = "post">
                <input type = "text" name = "name" placeholder="Type a new item here." class = "input" autocomplete = "off" requered>
                <input type = "submit" value = "Add" class = "submit">
            </form>
        </div>
    </body>
</html>