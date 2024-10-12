<!DOCTYPE html>
<html lang="th">
<head>
    <title>ฟอร์มเเก้ไขข้อมูล</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <style>
    h2 {
        font-family: "JasmineUPC";
        text-align: center;
    }
    </style>
</head>
<body>
<form name="edit_member" action="save_editmember.php?id=<?php echo htmlspecialchars($_GET['UserID']); ?>" method="POST">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sec03"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userID = mysqli_real_escape_string($conn, $_GET["UserID"]);
$sql = "SELECT * FROM member WHERE UserID = '$userID'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

if (!$result) {
    echo "ไม่พบข้อมูล UserID=" . htmlspecialchars($_GET["UserID"]);
} else {
?>

<div class="container">
    <div class="alert alert-success">
        <h2 style="color:Tomato;">เเก้ไขข้อมูลสมาชิก</h2>
    </div>
    <table class="table table-hover table-bordered">
        <tr>
            <th width="150">ลำดับสมาชิก</th>
            <td width="240">
                <input type="hidden" class="form-control" name="UserID" 
                value="<?php echo $result["UserID"];?>">
            </td>
        </tr>
        <tr>
            <th width="150">ชื่อผู้ใช้งาน</th>
            <td width="240">
                <input type="text" class="form-control" name="Username" 
                value="<?php echo $result["Username"];?>">
            </td>
        </tr>
        <tr>
            <th width="150">รหัสผ่าน</th>
            <td width="240">
                <input type="password" class="form-control" name="Password" 
                value="<?php echo $result["Password"];?>">
            </td>
        </tr>
        <tr>
            <th width="150">ชื่อลูกค้า</th>
            <td width="240">
                <input type="text" class="form-control" name="Name" 
                value="<?php echo $result["Name"];?>">
            </td>
        </tr>
        <tr>
            <th width="150">email</th>
            <td width="240">
                <input type="text" class="form-control" name="email" 
                value="<?php echo $result["email"];?>">
            </td>
        </tr>
        <tr>
            <th width="150">เบอร์โทรศัพท์</th>
            <td width="240">
                <input type="tel" class="form-control" name="tel" 
                value="<?php echo $result["tel"];?>">
            </td>
        </tr>
        <tr>
            <th width="150">สถานะ</th>
            <td width="240">
            <input type="text" class="form-control" name="Status" 
            value="<?php echo $result["Status"];?>">
            </td>
        </tr>
    </table>
    <center><button type="submit" class="btn btn-primary">Submit</button></center>
</div>

<?php
}
mysqli_close($conn);
?>
</form>
</body>
</html>
