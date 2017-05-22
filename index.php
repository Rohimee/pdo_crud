<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>หน้าหลัก</title>
  </head>
  <body>

    <?php
      echo "Hello";
    ?>

  </body>
</html>
