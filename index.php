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
                            <input type="hidden" name="id" value="<?php echo htmlentities($item['id']); ?>"/>
                            <input type="text" name="Name" value="<?php echo htmlentities($item['name']); ?>"     />


                            <?php if($item['done']): ?>
                                <input type="checkbox" name = "checkBox" checked="checked" >
                            <?php endif; ?>

                            <?php if(!$item['done']): ?>
                                <input type="checkbox" name = "checkBox" >
                            <?php endif; ?>
                            <input type = "submit" value = "delete" class = "submit" formaction="delete.php" >
                            <input type = "submit" value = "edit" class = "submit" formaction="edit.php" >
                            
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