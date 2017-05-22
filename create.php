<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>เพิ่มข้อมูล</title>
  </head>
  <body>

    <?php
      $query = $db->prepare("INSERT INTO member (id, firstname, lastname, status) VALUES (NULL, :firstname, :lastname, :status);");

      $result = $query->execute([
        "firstname" => "Surakit",
        "lastname" => "Choodet",
        "status" => 1,
      ]);
      if($result){
        echo "บันทึกข้อมูลเรียบร้อย";
      }else{
        echo "ไม่สามารถบันทึกข้อมูลได้!";
      }
    ?>


  </body>
</html>
