<?php
include 'config.php';
session_start();

if(trim($_POST["username"]) == ""){
   echo "<script>alert('คุณยังไม่กรอกชื่อผู้ใช้!')</script>";
   echo '<script>window.location.href = "login.php";</script>';
   exit();
}
if(trim($_POST["password"]) == ""){
   echo "<script>alert('คุณยังไม่กรอกรหัสผ่าน!')</script>";
   echo '<script>window.location.href = "login.php";</script>';
   exit();
}

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($con, ($_POST['username']));
   $password = mysqli_real_escape_string($con, ($_POST['password']));
 

   $select = mysqli_query($con, "SELECT * FROM table_user WHERE user_username = '$username' AND user_password = md5('$password')") or die('query failed');

   
   if(mysqli_num_rows($select) ==1){
   $row = mysqli_fetch_assoc($select);
   $_SESSION['user_id'] = $row['user_id'];
   $_SESSION['user_firstname'] = $row['user_firstname'];
   $_SESSION['login_time'] = time();  // เก็บเวลาเป็น timestamp
	$_SESSION['user_role'] = $row['user_role'];
	
	if($_SESSION['user_role']=='1'){
      echo '<script>alert("ยินดีต้อนรับคุณ ' . $row['user_firstname'] . '");</script>';
      echo '<script>window.location.href = "dashboard.php";</script>';

	}
	if($_SESSION['user_role']=='2'){
      echo '<script>alert("ยินดีต้อนรับคุณ ' . $row['user_firstname'] . '")</script>';
      echo '<script>window.location.href = "dashboard.php";</script>';
	}
   }
   else{
      echo "<script>alert('รหัสผ่าน หรือ อีเมล ไม่ถูกต้อง')</script>";
      echo '<script>window.location.href = "login.php";</script>';
   }

}
