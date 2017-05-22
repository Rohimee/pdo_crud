<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Member</title>
  </head>
  <body>

<?php
if(isset($_POST['submit'])){ #isset เช็คว่ามีอยู่จริงไหม
  $query = $db->prepare("UPDATE member SET firstname = :firstname, lastname = :lastname,status = :status WHERE id = :id;");
  $result = $query->execute([
    "id" => $_GET['id'],
    "firstname" => $_POST['firstname'],
    "lastname" => $_POST['lastname'],
    "status" => $_POST['status'],
  ]);
  if($result){
    echo "บันทึกข้อมูลเรียบร้อย";
  }else{
    echo "ไม่สามารถบันทึกข้อมูลได้";
  }
}
?>

<?php
$query = $db->prepare("SELECT * FROM member WHERE id = :id");
$query->execute([ "id" => $_GET['id'],]);
if($query->rowCount() > 0){
  $row = $query->fetch(PDO::FETCH_ASSOC);
  echo "ชื่อที่ต้องการแก้ไข = ".$row['firstname']."<br><br>";
?>
<form method="post">
  <label for="">ชื่อ</label>
  <input type="text" name="firstname" value="<?=$row['firstname']?>"><br>

  <label for="">นามสกุล</label>
  <input type="text" name="lastname" value="<?=$row['lastname']?>"><br>

  <label for="">สถานะ</label>
  <select name="status">
    <option value='1' <?=($row['status']=='1')?'selected':''?>>อาจารย์</option>
    <option value='2' <?=($row['status']=='2')?'selected':''?>>นักศึกษา</option>
  </select><br><br>
<button type="submit" name="submit">บันทึก</button>
<button type="reset" name="reset">ล้างข้อมูล</button><br><br>
<a href="index.php">กลับสู่หน้าหลัก</a>
</form>
<?php
}else{
  echo "Record not found.";
}
 ?>

  </body>
</html>
