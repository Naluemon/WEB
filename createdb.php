<?php
$severname = "localhost";
$username = "root";
$password = "";
 
//สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($severname, $username, $password);
 
//ตรวจสอบการเชื่อมต่อฐานข้อมูลว่าสามารถเชื่อมต่อและเข้าถึงฐานข้อมูลได้หรือไม่
if ($conn->connect_error) { //เป็นฟังก์ชันหมดเลย
    die("Connection faild: ". $conn->connect_error); //die เอาไว้เช็คการ connect ถ้าไม่ได้จะ faild
}
 
//สร้างฐานข้อมูล
$sql = "CREATE DATABASE sec03";
 
if (mysqli_query($conn, $sql)) { //query คือการดึงข้อมูลจาก database ขึ้นมาแสดง
    echo "สร้างฐานข้อมูลสำเร็จ";
}else{
    echo "ไม่สามารถสร้างฐานข้อมูลได้: " . mysqli_error($conn);
}
mysqli_close($conn);
?>