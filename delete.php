<?php
require_once  'app/init.php';

  $id = $_POST['id'];

      $deleteQuery = $db->prepare("DELETE FROM items Where id = $id");
$deleteQuery->execute();
header ('Location: index.php');