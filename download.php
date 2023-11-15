<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูเอกสาร</title>
    <style>
        body{
            width: auto;
            height: 297mm;
        }
    </style>
</head>
<body>
<?php
include("config.php"); // เชื่อมต่อกับฐานข้อมูล (อาจจะไม่จำเป็นถ้าคุณเชื่อมต่อกับฐานข้อมูลไว้แล้ว)

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM table_request WHERE request_id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $file = mysqli_fetch_assoc($result);
        $filepath = 'upload/' . $file['request_file'];
        ?>
        <iframe src="<?php echo $filepath; ?>" style="width: 100%; height: 100%;"></iframe>
        <?php
        // if (file_exists($filepath)) {
        //     $file_extension = pathinfo($filepath, PATHINFO_EXTENSION);

        //     // ตรวจสอบนามสกุลของไฟล์และตั้งค่า Content-Type ให้ถูกต้อง
        //     $content_type = "";
        //     switch ($file_extension) {
        //         case "pdf":
        //             $content_type = "application/pdf";
        //             break;
        //         case "doc":
        //             $content_type = "application/msword";
        //             break;
        //         case "docx":
        //             $content_type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
        //             break;
        //         default:
        //             $content_type = "application/octet-stream";
        //     }

        //     header('Content-Description: File Transfer');
        //     header('Content-Type: ' . $content_type);
        //     header('Content-Disposition: attachment; filename=' . basename($filepath));
        //     header('Expires: 0');
        //     header('Cache-Control: must-revalidate');
        //     header('Pragma: public');
        //     header('Content-Length: ' . filesize($filepath));
        //     readfile($filepath);
        //     exit;
        // } else {
        //     echo "ไฟล์ไม่พบ";
        // }
    } else {
        echo "ข้อผิดพลาดในการค้นหาข้อมูล";
    }
} else {
    echo "ไม่พบรหัสคำขอ (ID)";
}
?>
    
</body>
</html>

