<!DOCTYPE html>
<html>
<head>
    <title>รับค่าการเเก้ไขข้อมํูล</title>
    <meta http-equiv="refresh" content="1;URL=showdatamember.php">
</head>
<body>
<?php 
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "sec03"; 
$conn = mysqli_connect($severname, $username, $password,$dbname);
$sql = "update member set Username= '".trim($_POST['Username'])."',
Password ='".trim($_POST['Password'])."',
Name ='".trim($_POST['Name'])."',
email ='".trim($_POST['email'])."',
tel ='".trim($_POST['tel'])."',
Status ='".trim($_POST['Status'])."'
where UserID='".trim($_POST['UserID'])."'";
$query=mysqli_query($conn,$sql);
echo "เเก้ไขข้อมูลเรียบร้อย";
mysqli_close($conn);
?>
</body>
</html>