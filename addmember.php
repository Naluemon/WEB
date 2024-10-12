<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "sec03"; //ฐานข้อมูลที่สร้างไว้
//สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect($severname, $username, $password,$dbname);
 
//ตรวจสอบการเชื่อมต่อฐานข้อมูลว่าสามารถเชื่อมต่อและเข้าถึงฐานข้อมูลได้หรือไม่
if (!$conn) { //เป็นฟังก์ชันหมดเลย
    die("connect faild: ".mysqli_connect_error()); 
    //mysqli_connect_error เอาไว้เช็คการ connect ถ้าไม่ได้จะ faild
}
$sql="insert into member(Username,Password,Name,email,tel,Status)values('".$_POST["Username"]."',
'".$_POST["Password"]."','".$_POST["Name"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["Status"]."')";

$query=mysqli_query($conn,$sql);
if($query){
    echo "เพิ่มข้อมูลสำเร็จ";
}
mysqli_close($conn);
?>
<meta http-equiv="refresh" content="1;URL=showdatamember.php" />