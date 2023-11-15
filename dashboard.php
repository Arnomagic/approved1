<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php include ("navbar.php"); ?>
<br>
<?php

$sql_query = "SELECT COUNT(*) as count FROM table_request";

$result = $con->query($sql_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row["count"];
?>
<style type="text/css">

    <?php include("css.css"); ?>

</style>
<body class="bg">
  <form class="form_container">
    <div class="row">
      <div class="d-flex justify-content-center">
        <div class="card mr-5 card-new" >
          <div class="card-body-new">
          <h5 class="card-title">จำนวนทั้งหมด:</h5><br>
          <?php echo "<h1 align='center'>$count</h1>";?><br>
          <a href="request_all.php" class="cssbuttons-io-button" >
          รายละเอียด
          <div class="icon">
          <svg
            height="24"
            width="24"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path
            d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
            fill="currentColor"
            ></path>
          </svg>
          </div>
          </a>
        </div>
        </div>
          <?php
          }



              $sql = "SELECT COUNT(*) AS total FROM table_request WHERE request_status = 'อนุมัติ'" ;

// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
$result1 = $con->query($sql);

// ตรวจสอบผลลัพธ์และแสดงผล
if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $count1 = $row["total"];
?>
  <div class="card mr-5 card-new" >
    <div class="card-body-new">
      <h5 class="card-title">จำนวนที่อนุมัติ:</h5><br>
      <?php echo "<h1 align='center'>$count1</h1>";?><br>
      <a href="request_approved.php" class="cssbuttons-io-button">
      รายละเอียด
  <div class="icon">
    <svg
      height="24"
      width="24"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
        fill="currentColor"
      ></path>
    </svg>
  </div>
</a> 
   </div>
  </div>
  <?php
  } else {
    echo "ไม่พบข้อมูลที่ตรงกับเงื่อนไข";
}

$sql = "SELECT COUNT(*) AS total FROM table_request WHERE request_status = 'ไม่อนุมัติ'" ;

// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
$result2 = $con->query($sql);

// ตรวจสอบผลลัพธ์และแสดงผล
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $count2 = $row["total"];
?>

  <div class="card card-new" >
    <div class="card-body-new">
    <h5 class="card-title">จำนวนที่ไม่อนุมัติ:</h5><br>
      <?php echo "<h1 align='center'>$count2</h1>";?><br>
      <a href="request_unapproved.php" class="cssbuttons-io-button">
  รายละเอียด
  <div class="icon">
    <svg
      height="24"
      width="24"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
        fill="currentColor"
      ></path>
    </svg>
  </div>
</a>
    </div>
  </div>
</div>
</div>
<?php
} else {
    echo "ไม่พบข้อมูลที่ตรงกับเงื่อนไข";
}
?>
<style>
  strong {
    color: #ffff; /* สีของตัวหนังสือภายใน strong */
  }
</style>
<br>
<?php
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {
  ?><div align="center">
  <table class="table table-bordered border-primary" width="1500" border="1" align="center">
    <tr>
      <td width="50" align="center" bgcolor="#E9B824"><strong>อันดับ</strong></td>
      <td width="250" align="center" bgcolor="#E9B824"><strong>ชื่อ-นามสกุล</strong></td>
      <td width="400" align="center" bgcolor="#E9B824"><strong>เรื่อง</strong></td>
      <td width="200" align="center" bgcolor="#E9B824"><strong>วันเวลา</strong></td>
      <td width="200" align="center" bgcolor="#E9B824"><strong>ชื่อไฟล์</strong></td>
      <td width="150" align="center" bgcolor="#E9B824"><strong>สถานะ</strong></td>
      <td colspan='3' width="200" align="center" bgcolor="#E9B824" align='center'><strong></strong></td>
    </tr>
    <?php
  
    include("config.php");
    $sql = "SELECT * FROM table_request WHERE request_status='รออนุมัติ'";  //เรียกข้อมูลมาแสดงทั้งหมด
    $result = mysqli_query($con, $sql);
  
    while($row = mysqli_fetch_array($result))
    {
      $request_date = date("d-m-Y H:i", strtotime($row["request_date"]));
      echo "<tr>";
      echo "<td align='center'>" . $row["request_id"] . "</td>";
      echo "<td align='center'>" . $row["request_firstname"] . " " . $row["request_lastname"] . "</td>";    
      echo "<td align='center'>" . $row["request_subject"] . "</td>";
      echo "<td align='center'>$request_date</td>";
      echo "<td align='center'>" . $row["request_file"] . "</td>";
      echo "<td align='center'>" . $row["request_status"] . "</td>";
      ?>  
      <td align='center'><a type="button" href="approved.php?id=<?php echo $row["request_id"];?>&request_firstname=<?php echo $row["request_firstname"];?>&request_lastname=<?php echo $row["request_lastname"];?>&request_file=<?php echo $row["request_file"];?>&request_date=<?php echo $row["request_date"];?>" onclick="return confirm('ยืนยันการอนุมัติ');"><i class="bi bi-calendar-check"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg></i></a></td>
      <td align='center'><a type="button" href="unapproved.php?id=<?php echo $row["request_id"];?>&request_file=<?php echo $row["request_file"];?>" onclick="return confirm('ยืนยันการปฏิเสธ');"><i class="bi bi-calendar-x"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
</svg></i></a></td>
      <td align='center'><a type="button" target="_blank" href="download.php?id=<?php echo $row["request_id"];?>"><i class="bi bi-download"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
  <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
</svg></i></a></td>
    <?php
      echo "</tr>";
    }
    ?><?php
} else {
    ?><div align="center">
    <h1>จัดการสมาชิก</h1>
    <br>
    <table class="table table-bordered border-primary" width="1500" border="1" align="center">
      <tr>
      <td width="50" align="center" bgcolor="#EE9322"><strong>อันดับ</strong></td>
      <td width="300" align="center" bgcolor="#EE9322"><strong>ชื่อ-นามสกุล</strong></td>
      <td width="400" align="center" bgcolor="#EE9322"><strong>เรื่อง</strong></td>
      <td width="200" align="center" bgcolor="#EE9322"><strong>วันเวลา</strong></td>
      <td width="200" align="center" bgcolor="#EE9322"><strong>ชื่อไฟล์</strong></td>
      <td width="150" align="center" bgcolor="#EE9322"><strong>สถานะ</strong></td>
      </tr>
      <?php
      
      $user_firstname=$_SESSION["user_firstname"];
      $sql = "SELECT * FROM table_request WHERE request_firstname='$user_firstname'";  //เรียกข้อมูลมาแสดงทั้งหมด
      $result = mysqli_query($con, $sql);
    
      while($row = mysqli_fetch_array($result))
      {
        $request_date = date("d-m-Y H:i", strtotime($row["request_date"]));
        echo "<tr>";
        echo "<td align='center'>" . $row["request_id"] . "</td>";
        echo "<td align='center'>" . $row["request_firstname"] . " " . $row["request_lastname"] . "</td>";    
        echo "<td align='center'>" . $row["request_subject"] . "</td>";
        echo "<td align='center'>$request_date</td>";
        echo "<td align='center'>" . $row["request_file"] . "</td>";
        echo "<td align='center'>" . $row["request_status"] . "</td>";
        echo "</tr>";
      }
      ?>    
    
    </table>
    </div>
    <?php
}
?>

</form>
</body>
