<!Doctype html>
<html>
<head>
</head>
<body>
<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "sec03"; 
$conn = mysqli_connect($severname, $username, $password,$dbname);
$UserID = $_GET["UserID"];
$sql = "delete from member where UserID ='".$UserID."'";
$query = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)){ //ฟังก์ชัน mysqli_affected_rows(การเชื่อมต่อ)
    echo "ลบข้อมูลเรียบร้อย";
}
mysqli_close($conn);
?>
</body>
</html>
<meta http-equiv="refresh" content="1;URL=showdatamember.php">