<?php
$servername = "localhost";
$username = "root";
$password = ""; 

//สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername,$username,$password);

//ตรวจจสอบการเชื่อมต่อฐานข้อมูลว่าสามารถเชื่อมต่อเเละเข้าถึงฐานข้อมูลได้หรือไม่
//ฟังก์ชันเป็นตัวพิมพ์เล็กทั้งหมด
if($conn->connect_error) { //die เป็นฟังก์ชันเอาไว้เช็ค 
    die("Connection failed: " . $conn->connect_error);
}
echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
?>