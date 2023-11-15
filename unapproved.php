<?php
include 'config.php'; 

$id = $_GET['id'];
$request_file = $_GET['request_file'];

$sql = "UPDATE table_request SET 
request_id = '$id' ,
request_status = 'ไม่อนุมัติ' 

WHERE request_id = $id

";

$result = mysqli_query($con, $sql) or die ("Error in sql : $sql". mysqli_error($sql));
$sToken = "4HlqtSFPNdw5U4X6IvXD0hMefhZY3JeHXCDRrMXQipq";
$sMessage = "เอกสาร".$request_file."ถูกปฏิเสธ";

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

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