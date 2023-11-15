<?php include ("navbar.php"); ?>
<br>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
include 'config.php';
$user_id = $_SESSION["user_id"];

// Query to select user data based on the user ID
$sql = "SELECT * FROM table_user WHERE user_id = $user_id";

// Execute the query
$result = $con->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the user data as an associative array
    $user_data = $result->fetch_assoc();
?>
<style type="text/css">

<?php include("css.css"); ?>

</style>
<body class="bg">
<div class="container">
<br>  
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header" align="center">
	<h4 class="card-title mt-2">ส่งคำขอ</h4>
</header>
<article class="card-body">
<form method="post" action="ckrequest.php" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col form-group">
			<label>ชื่อ</label>   
		  	<input type="text" name="firstname" class="form-control" value="<?php echo $user_data['user_firstname'];?>" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>สกุล</label>
		  	<input type="text" name="lastname" class="form-control" value="<?php echo $user_data['user_lastname'];?>" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>เรื่อง</label>
		<input type="text" name="subject" class="form-control" placeholder="">
	</div>
	<label for="file-input" class="drop-container">
  <span class="drop-title">Drop files here</span>
  or
  <input type="file" name="fileToUpload" required="" id="file-input">
  <input type="submit" value="ส่งคำขอ" name="submit">

</label>
	<br>                                            
</form>
</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->
<?php
} else {
    // Handle the case when the query fails
    echo "Error: " . $con->error;
}

// Close the database connection
$con->close();
?>

