<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<h4 class="card-title mt-2">สมัครสมาชิก</h4>
</header>
<article class="card-body">
<form method="post" action="ckregister.php">
	<div class="form-row">
		<div class="col form-group">
			<label>ชื่อ</label>   
		  	<input type="text" name="firstname" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>นามสกุล</label>
		  	<input type="text" name="lastname" class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// --> 
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>ชื่อผู้ใช้</label>
		  <input type="text" name="username" class="form-control">
		</div> <!-- form-group end.// -->
		<div class="form-group col-md-6">
		  <label>ตำแหน่ง</label>
		  <select id="inputState" name="status" class="form-control">
				<option value="บริหาร">ฝ่ายบริหาร</option>
				<option value="IT">ฝ่ายIT</option>
				<option value="HR">ฝ่ายHR</option>
				<option value="การเงิน">ฝ่ายบัญชี่</option>
				<option value="การตลาด">ฝ่ายการตลาด</option>
				<option value="ฝ่ายขาย">ฝ่ายขาย</option>
		  </select>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->
	<div class="form-group">
		<label>รหัสผ่าน</label>
	    <input class="form-control" name="password" type="password">
	</div>
    <div class="form-group">
		<label>ยืนยัน รหัสผ่าน</label>
	    <input class="form-control" name="confirmpassword" type="password">
	</div>
	<br>
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-primary btn-block"> ยืนยัน </button>
    </div> <!-- form-group// -->                                               
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">กลับไปที่<a href="login.php">เข้าสู่ระบบ</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->
