<!DOCTYPE html>
<head>
    <title>เเสดงข้อมูลสมาชิก</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
    $strKeyword = null;
    if(isset($_POST["txtKeywords"]))
    //isset คือ การเช็คค่าตัวเเปรที่กำหนดมีอยู่หรือไม่
    {
        $strKeyword = $_POST["txtKeywords"];
    }
?>
<br>
<center>
<form name="Search" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
    <table width="599" border="1">
      <tr>
        <th>ค้นหาข้อมูล
         <input name="txtKeywords" type="text" value="<?php echo $strKeyword;?>">
         <input type="submit" value="Search"></th>
      </tr>
    </table>
</form>
</center>
<br>
<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "sec03"; //ฐานข้อมูลที่สร้างไว้

//สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect($severname, $username, $password,$dbname);
 
//ตรวจสอบการเชื่อมต่อฐานข้อมูลว่าสามารถเชื่อมต่อและเข้าถึงฐานข้อมูลได้หรือไม่
if (!$conn) { //เป็นฟังก์ชันหมดเลย
    die("connection faild: ".mysqli_connect_error()); //mysqli_connect_error เอาไว้เช็คการ connect ถ้าไม่ได้จะ faild
}
$sql="select * from member WHERE Name LIKE '%".$strKeyword."%'";
// WHERE Name LIKE '%".$strKeyword."%' คือ คำสั่งที่ใช้ในการค้นหาโดยการใช้คีย์เวิร์ดเป็น Name
$query=mysqli_query($conn,$sql);
?>
<div class="container">
    <table class="table table-hover table-bordered">
<tr bgcolor="#FF6699">
    <th width="90">รหัสลูกค้า</th>
    <th width="90">ชื่อผู้ใช้งาน</th>
    <th width="90">รหัสผ่าน</th>
    <th width="90">ชื่อนามสกุล</th>
    <th width="90">อีเมล์</th>
    <th width="90">เบอร์โทรศัพท์</th>
    <th width="90">สถานะ</th>
    <th width="90">เเก้ไขข้อมูล</th>
    <th width="90">ลบข้อมูล</th>
</tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
/* คำสั่ง mysqli_fetch_array เป็นคำสั่งในการทำการคืนค่าข้อมูลฝนตารางฐานข้อมูลโดยคืนค่าข้อมูล
ให้มาเเสดงในรูปเเบบของ Array เเละใช้ MYSQLI_ASSOC ในการตั้งค่าข้อมูลเฉพาะรายการที่เลือก */
{

?>
<tr>
    <td><?php echo $result["UserID"];?></td>
    <td><?php echo $result["Username"];?></td>
    <td><?php echo $result["Password"];?></td>
    <td><?php echo $result["Name"];?></td>
    <td><?php echo $result["email"];?></td>
    <td><?php echo $result["tel"];?></td>
    <td><?php echo $result["Status"];?></td>
    <td><a href="editmember.php?UserID=<?php echo $result["UserID"];?>">
        <button type="button" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
</svg>edit</button></a></td>
    <td><a href="delete.php?UserID=<?php echo $result["UserID"];?>">
        <button type="button" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
</svg>delete</button></a></td>
</tr>
<?php
}
?>
</table>
</div>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>