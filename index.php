<?php

require_once 'app/init.php';

$itemsQuery = $db->prepare("SELECT id, name, done, Color FROM items WHERE user = :user");
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


        <meta name = "viewport" content = "width = device-width, user-scalable=no, initial-scale=1.0, maximum-scale = 1.0, minimum-scale = 1.0">

    </head>
    <body>
        <div class = "list">
            <h1 class = "header">To do.</h1>
            <?php if(!empty($items)): ?>
            <ul class = "items">
                <?php foreach ($items as $item ): ?>
                    <li>
                        <form class = "item-del"  method = "post">
                            <?php $color = $item['Color']; ?>
                            <input type="hidden" name="id" value="<?php echo htmlentities($item['id']); ?>"/>
                            <input type="text"   STYLE=background-color:<?php echo htmlentities($item['Color']); ?>  name="Name" value="<?php echo htmlentities($item['name']); ?>"     />


                            <?php if($item['done']): ?>
                                <input type="checkbox" name = "checkBox" checked="checked" >
                            <?php endif; ?>

                            <?php if(!$item['done']): ?>
                                <input type="checkbox" name = "checkBox" >
                            <?php endif; ?>
                            <input type = "submit" value = "delete" class = "submit" formaction="delete.php" >
                            <input type = "submit" value = "edit" class = "submit" formaction="edit.php" >
                            <select name="Color">
                                <option value="red">red</option>
                                <option value="green">green</option>
                                <option value="blue">blue</option>
                                <option value="yellow">yellow</option>
                            </select>
                            <input type = "submit" value = "changeColor" class = "submit" formaction="changeColor.php" >
                        </form>
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