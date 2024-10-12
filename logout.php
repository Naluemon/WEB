<?php
session_start();
session_destroy();  // session_destroy(); ใช้ล้างค่าข้อมูล
header("Location: http://localhost/sec03/login.html");
exit();  // หยุดการทำงานของสคริปต์หลังจากการ redirect
?>
