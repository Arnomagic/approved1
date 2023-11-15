<?php 
session_start();

// ลบ session หรือตัวแปรสถานะที่ใช้สำหรับการล็อกอิน
session_unset();
session_destroy();
header("Location: login.php"); // ไปยังหน้า Login
exit();
?>
