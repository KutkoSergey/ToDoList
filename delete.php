<?php
/**
 * Created by PhpStorm.
 * User: kutko
 * Date: 23.03.2017
 * Time: 22:45
 */

require_once  'app/init.php';
print_r($_POST);
echo "delete";
  $id = $_POST['id'];

      echo "delete";

      $addedQuery = $db->prepare("DELETE FROM items Where id = $id");
      $addedQuery->execute();





header ('Location: index.php');

