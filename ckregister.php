<?php
require_once('config.php');

if(trim($_POST["firstname"]) == ""){
   echo "<script>alert('คุณยังไม่กรอกชื่อ!')</script>";
   echo '<script>window.location.href = "register.php";</script>';
   exit();
}
if(trim($_POST["lastname"]) == ""){
    echo "<script>alert('คุณยังไม่กรอกนาสกุล!')</script>";
    echo '<script>window.location.href = "register.php";</script>';
    exit();
 }
if(trim($_POST["password"]) == ""){
   echo "<script>alert('คุณยังไม่กรอกรหัส!')</script>";
   echo '<script>window.location.href = "register.php";</script>';
   exit();
}
if($_POST["password"] != $_POST["confirmpassword"]){
   echo "<script>alert('รหัสไม่ตรงกัน!')</script>";
   echo '<script>window.location.href = "register.php";</script>';
   exit();
}
if(trim($_POST["username"]) == ""){
   echo "<script>alert('คุณยังไม่กรอกชื่อผู้ใช้!')</script>";
   echo '<script>window.location.href = "register.php";</script>';
   exit();
}
if(trim($_POST["status"]) == ""){
   echo "<script>alert('คุณยังไม่กรอกตำแหน่ง!')</script>";
   echo '<script>window.location.href = "register.php";</script>';
   exit();
}

if(isset($_POST['firstname'])){
    $data = $_POST;
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $username = $data['username'];
    $status = $data['status'];
    $password = md5($data['password']);
    $confirmpassword = md5($data['confirmpassword']); // เข้ารหัสด้วย md5
    
    $strSQL = "INSERT INTO 
    table_user(
        `user_firstname`,
        `user_lastname`,
        `user_username`,
        `user_status`,
        `user_password`, 
        `user_role`
    ) VALUES (
        '$firstname', 
        '$lastname', 
        '$username', 
        '$status', 
        '$password', 
        '2'
    )";
    
    $objQuery = mysqli_query($con, $strSQL) or die(mysqli_error($con));
    if ($objQuery) {
        echo "<script>alert('ลงทะเบียนเรียบร้อยแล้ว!')</script>";
        echo '<script>window.location.href = "login.php";</script>';
    } else {
        echo "<script>alert('พบข้อผิดพลาด!')</script>";
        echo '<script>window.location.href = "register.php";</script>';
    }
}
?>
