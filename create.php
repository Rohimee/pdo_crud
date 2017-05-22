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
      if (isset($_POST['submit'])) {

        $query = $db->prepare("INSERT INTO member (id, firstname, lastname, status)
                               VALUES (NULL, :firstname, :lastname, :status);");

        $result = $query->execute([
          "firstname" => $_POST['firstname'],
          "lastname" => $_POST['lastname'],
          "status" => $_POST['status'],
        ]);
        if($result){
          echo "บันทึกข้อมูลเรียบร้อย";
          echo "<br>";
        }else{
          echo "ไม่สามารถบันทึกข้อมูลได้!";
        }
      }
    ?>
    <br>
    <form class="" method="post">
      <label for="">ชื่อ </label>
      <input type="text" name="firstname" value=""><br>
      <label for="">นามสกุล </label>
      <input type="text" name="lastname" value=""><br>
      <label for="">สถานะ </label>
        <select class="" name="status">
          <option value="1">อาจารย์</option>
          <option value="2">นักศึกษา</option>
        </select><br><br>
      <button type="submit" name="submit">บันทึก</button>
      <button type="reset" name="reset">ล้างข้อมูล</button>
    </form>

  </body>
</html>
