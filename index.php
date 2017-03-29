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
                        <form class = "itemForm"  method = "post">
                            <input type="hidden" name="id" value="<?php echo htmlentities($item['id']); ?>"/>
                            <input type = "text" name = "name" value = "<?php echo $item['name']; ?>" class = "item<?php echo $item['done'] ? ' done' : ''?>">
                            <?php if($item['done']): ?>
                                <input type = "checkbox"  class = "doneItem" name = "doneItem" checked = "checked">

                            <?php else: ?>
                                <input type = "checkbox"  class = "doneItem" name = "doneItem" >
                            <?php endif;?>

                            <input type=image src=edit.png alt="Submit feedback" value="editSubmit" class = "editSubmit" formaction="edit.php">
                            <input type=image src=delete1.png alt="Submit feedback" value="delitSubmit" class = "delitSubmit" formaction="delete.php">
                        </form>
                    </li>

                <?php endforeach; ?>
            </ul>

            <?php else: ?>
            <p>You haven't added any items yet</p>
            <?php endif;?>

               <form class = "item-add" action="add.php" method = "post">

                   <input type = "submit" id = "addButton" value = "Add" class = "submit">
           </form>
        </div>
    </body>
</html>