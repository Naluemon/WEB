<?php
session_start();
//เช็คค่าการเข้าถึงข้อมูลหน้าเพจต่างๆ ซึ่งต้องมีการเข้าสู่ระบบก่อนจึงจะสามารถเข้าถึงข้อมูลหน้านั้นได้
$servername="localhost";
$username="root";
$password="";
$dbname="sec03";
$conn=mysqli_connect("$servername","$username","$password","$dbname");
$sql = "select * from member where Username='".mysqli_real_escape_string($conn,$_POST['txtUsername'])."'
and Password='".mysqli_real_escape_string($conn,$_POST['txtPassword'])."'";
/*mysqli_real_escape_string ไว้เช็คอักขระพิเศษที่แทรกเข้ามา ซึ่งฟังก์ชันนี้จะตัดพวกอักขระพิเศษออกไป 
เพื่อให้ผู้ใช้สามารถใช้คำสั่งsqlที่มีความปลอดภัยในการ query ข้อมล*/
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
if(!$result)
{
    echo "username หรือ password ไม่ถูกต้องกรุณากรอกข้อมูลใหม่";
}
else
{  
$_SESSION["UserID"] = $result["UserID"];
$_SESSION["Status"] = $result["Status"];
session_write_close();
/*เช็คค่าเซสชั่นที่กรอกเข้ามา ให้ตรงกับค่าที่ query ออกมาได้ จากนั้นนำไปเช็คกับ status ว่าชื่อผู้ใช้กับรหัสผ่านเป็นสถานะอะไรก็จะส่งข้อมูล
ไปหน้านั้น*/
if($result["Status"]=="ADMIN")
{
    header("location:admin.php");
}
else{
    header("location:user.php");   
}
}
mysqli_close($conn);
?>
