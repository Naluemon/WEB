<?php
session_start();
if($_SESSION['UserID']=="")
{
    echo "กรุณา login ด้วย";
    exit();
}
if($_SESSION['Status']!="ADMIN")
{
    echo "หน้านี้สำหรับ Admin กรุณา Login เข้ามาใหม่";
    exit();   
}
$servername="localhost";
$username="root";
$password="";
$dbname="sec03";
$conn=mysqli_connect("$servername","$username","$password","$dbname");
$sql = "select * from member where UserID = '".$_SESSION['UserID']."'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
?>

<!Doctype html>
<html>
<head> 
    <title> หน้าแสดงข้อมูลของ admin </title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
      </head>
</head>
<body>
<div class="container">
    <button type="button" class="btn btn-primary"><a href="admin.php">ข้อมูลส่วนตัว</a></button>
    <button type="button" class="btn btn-info"><a href="showdatamember.php">เรียกดูข้อมูลสมาชิก</a></button>
    <button type="button" class="btn btn-success"><a href="logout.php">ออกจากระบบ</a></button>

    <div class="alert alert-success">
    <h2 style="color:Tomato;">ข้อมูลผู้เข้าสู่ระบบ</h2>

<table class="table table-hover table-bordered"> 
<tr>
    <th> ชื่อเข้าสู่ระบบ</th>
    <td><?php echo $result["Username"];?> </td>
</tr>
<tr>
    <th> ชื่อ</th>
    <td><?php echo $result["Name"];?> </td>
</tr>
</table>
</center>
<a href ="logout.php"> ออกจากระบบ </a>
<?php
mysqli_close($conn);
?>
</body>
</html>

