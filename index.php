<?php
require_once 'app/init.php';
$itemsQuery = $db->prepare("SELECT id, name, done, Color, priority FROM items WHERE user = :user");
$itemsQuery->execute(['user' => $_SESSION['user_id']]);
$items = $itemsQuery->rowCount() ? $itemsQuery : [];
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>To do</title>
        <link rel = "stylesheet" type = "text/css" href = "css/main.css"   />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">﻿
        <link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">﻿
        <meta name = "viewport" content="width = device-width, initial-scale = 1.0">
    </head>
    <body>
        <div class = "list">
            <h1 class = "header">To do.</h1>

            <?php if(!empty($items)): ?>

            <ul class = "items">
                <?php foreach($items as $item): ?>
                    <li>
                        <span class = "item<?php echo $item['done'] ? ' done' : ''?>"><?php echo $item['name']; ?></span>
                        <?php if(!$item['done']): ?>
                             <a href="mark.php?as=done&item=<?php echo $item['id'];?>" class = "done-Button">Mark as Done</a>
                        <?php endif;?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php else: ?>
            <p>You haven't added any items yet</p>
            <?php endif;?>

               <form class = "item-add" action="add.php" method = "post">
                    <input type="text" name="name" placeholder = "Type a new item here." class = "input" autocomplete="off" required>
                   <input type = "submit" id = "addButton" value = "Add" class = "submit">
           </form>
        </div>
    </body>
</html>