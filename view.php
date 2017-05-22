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

    <table border="1" width="500" height="70">
      <thead>
        <tr>
          <td>#</td>
          <td>ชื่อ</td>
          <td>นามสกุล</td>
          <td>สถานะ</td>
          <td>แกไข</td>
          <td>ลบ</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = $db->prepare("SELECT * FROM member WHERE id = :id");

        $query->execute([ "id" => $_GET['id'],]);

        if($query->rowCount() > 0){
          $row = $query->fetch(PDO::FETCH_ASSOC);


        ?>
        <tr>
          <td><?= $row['id']; ?></td>
          <td><?= $row['firstname']; ?></td>
          <td><?= $row['lastname']; ?></td>
          <td><?php
            if ($row['status']=="1") {
              echo "อาจารย์";
            }else {
              echo "นักศึกษา";
            }
           ?></td>
           <td><a href="#">แก้ไข</a></td>
          <td><a href="#">ลบ</a></td>
        </tr>

        <?php
            }
        ?>
      </tbody>
    </table>
    <br>
    <a href="index.php">ย้อนกลับ</a>
  </body>
</html>
