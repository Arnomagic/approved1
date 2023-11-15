<?php
include 'config.php'; 

$id = $_GET['id'];
$request_file = $_GET['request_file'];
$request_firstname = $_GET['request_firstname'];
$request_lastname = $_GET['request_lastname'];
$request_date = $_GET['request_date'];

$sql = "UPDATE table_request SET 
request_id = '$id' ,
request_status = 'อนุมัติ' 
WHERE request_id = $id";

$result = mysqli_query($con, $sql) or die ("Error in sql : $sql". mysqli_error($sql));

// สร้างลิ้งค์ดาวน์โหลด
$download_link = "http://portal.happysoftth.com/approved/download.php?id=$id";

$sToken = "4HlqtSFPNdw5U4X6IvXD0hMefhZY3JeHXCDRrMXQipq";
$sMessage = "ผู้ขออนุมัติ:".$request_firstname.$request_lastname."\n" ."สถานะ: อนุมัติ \n"."วันที่ ขออนุมัติ".$request_date."\n" ."ลิ้งค์ดาวน์โหลด:\n" . $download_link;

$chOne = curl_init();
curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($chOne, CURLOPT_POST, 1);
curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$sMessage");
$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($chOne);

//Result error 
if(curl_error($chOne)) 
{ 
    echo 'error:' . curl_error($chOne); 
} 
else { 
    $result_ = json_decode($result, true); 
    echo "status : ".$result_['status']; echo "message : ". $result_['message'];
}

mysqli_close($con);
echo "<script>alert('ดำเนินการสำเสร็จ')</script>";
echo '<script>window.location.href = "dashboard.php";</script>';
?>
