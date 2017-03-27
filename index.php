<?php

require_once 'app/init.php';

$itemsQuery = $db->prepare("SELECT id, name, done, Color, priority FROM items WHERE user = :user");
$itemsQuery->execute(['user' => $_SESSION['user_id']]);
$items = $itemsQuery->rowCount() ? $itemsQuery : [];
/*foreach ($items as $item) {
    echo  $item['name'], '';
}*/

?>


<!DOCTYPE html>
<html>
    <head>

        <link rel = "stylesheet" type = "text/css" href = "css/main.css"   />
    </head>
    <body>
    <div class = "list">
        <h1 class = "header">To do.</h1>
        <?php if(!empty($items)): ?>
            <ul class = "items">
                <?php foreach ($items as $item ): ?>
                    <li type="1">
                        <form class = "item-del"  method = "post">

                            <input type="hidden" name="id" value="<?php echo htmlentities($item['id']); ?>"/>

                            <div class="todoItem" STYLE=background-color:<?php echo htmlentities($item['Color']); ?>>
                                <textarea name="Name" STYLE=background-color:<?php echo htmlentities($item['Color']); ?>><?php echo htmlentities($item['name']); ?></textarea>
                                <input value = " " id = "deletesubmit" type=image src=delete.png alt="Submit feedback" formaction="delete.php" >
                                <input type="submit"  name = "red" value = "red " id = "colorRed"  formaction = "changeColor.php" >
                                <input type="submit"  name = "yellow" value = "yellow " id = "colorYellow"  formaction = "changeColor.php" >
                                <input type="submit"  name = "blue" value = "blue" id = "colorBlue"  formaction = "changeColor.php" >

                            </div>


                            <?php if($item['done']): ?>

                            <?php endif; ?>

                            <?php if(!$item['done']): ?>
                                <input type="checkbox" name = "checkBox" >
                            <?php endif; ?>

                            <input type = "submit" value = "edit" class = "submit" formaction="edit.php" >


                            <label>Priority is <?php echo htmlentities($item['priority']); ?> </label>
                            <select name="priority">
                                <?php
                                for($i=1; $i<$items->rowCount()+1;$i++){
                                    ?>
                                    <option value="<?php echo htmlentities($i); ?>"><?php echo htmlentities($i); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type = "submit" value = "change Priority" class = "submit" formaction="changePriority.php" >
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>You haven't added any items yet</p>

        <?php endif; ?>
        <form class = "item-add" action="add.php" method = "post">

            <input type = "submit" id = "addButton" value = "Add" class = "submit">
        </form>
    </div>
    </body>
    <head/>
</html>