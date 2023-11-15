<?php
  include("config.php");

if(trim($_POST["subject"]) == ""){
    echo "<script>alert('คุณยังไม่กรอกชื่อเรื่อง !')</script>";
    echo '<script>window.location.href = "request.php";</script>';
    exit();
}

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $subject = $_POST["subject"];
    
    $targetDirectory = "upload/";  // ระบุโฟลเดอร์ที่คุณต้องการให้ไฟล์ถูกบันทึก
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // ตรวจสอบประเภทของไฟล์
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "<script>alert('เฉพาะไฟล์ .pdf และ .doc เท่านั้นที่อนุญาตให้อัปโหลด !')</script>";
        echo '<script>window.location.href = "request.php";</script>';
        $uploadOk = 0;
    }if ($uploadOk == 0) {
        echo "ขออภัย, มีข้อผิดพลาดในการอัปโหลดไฟล์";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "ไฟล์ " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ถูกอัปโหลดเรียบร้อย";

            // เก็บข้อมูลไฟล์ในฐานข้อมูล
            $filename = basename($_FILES["fileToUpload"]["name"]);
            $fileSize = $_FILES["fileToUpload"]["size"];
            $fileType = $_FILES["fileToUpload"]["type"];
        }
    // ดึงวันเวลาปัจจุบัน
    $current_datetime = date("Y-m-d H:i:s");

    // บันทึกข้อมูลลงในฐานข้อมูล
    $insert_query = "INSERT INTO table_request (request_firstname, request_lastname, request_subject, request_file, request_date, request_status) VALUES ('$firstname', '$lastname', '$subject', '$filename','$current_datetime', 'รออนุมัติ')";

        if (mysqli_query($con, $insert_query)) {
            // บันทึกข้อมูลสำเร็จ
            echo "<script>alert('ข้อมูลถูกบันทึกเรียบร้อยแล้ว!')</script>";
            echo '<script>window.location.href = "dashboard.php";</script>';
        } else {
            // เกิดข้อผิดพลาดในการบันทึกข้อมูล
            echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล!')</script>" . mysqli_error($con);
            echo '<script>window.location.href = "request.php";</script>';        
        }
    } 
}
mysqli_close($con);
?>