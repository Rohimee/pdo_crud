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

    <table border="1" width="500" height="200">
      <thead>
        <tr>
          <td>#</td>
          <td>ชื่อ</td>
          <td>นามสกุล</td>
          <td>สถานะ</td>
          <td>ดูข้อมูล</td>
          <td>แกไข</td>
          <td>ลบ</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = $db->prepare("SELECT * FROM member");
        $query->execute(); //ประมวลผลคำสั่ง sql

        if($query->rowCount() > 0){ //rowCount เช็คจำนวนแถวที่ได้มา
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ //ดึงข้อมูลแต่ละรอบใส่ใน $row


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
           <td><a href="view.php?id=<?= $row['id']; ?>">เรียกดู</a></td>
           <td><a href="update.php?id=<?= $row['id']; ?>">แก้ไข</a></td>
          <td><a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('คุณแน่ใจหรือไม่')">ลบ</a></td>
        </tr>

        <?php
            }
          }
        ?>
      </tbody>
    </table>

  </body>
</html>
