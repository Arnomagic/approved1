<?php include ("navbar.php"); ?>
<br>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">

    <?php include("css.css"); ?>

</style>
<style type="text/css">

<?php include("search.css"); ?>

</style>
<style>
  strong {
    color: #ffff; /* สีของตัวหนังสือภายใน strong */
  }
</style>
<body class="bg">
<form class="container form_container">
<div align="center">
    <h1>สมาชิกทั้งหมด</h1>
    <div class="search" style="width:100%;text-align:right;">
        <input placeholder="Search..." id="inputsearch" type="text">
        <button type="button" onclick="srcdata()">Go</button>
        <script>
          async function srcdata(){
            try {
                let value = document.getElementById("inputsearch").value
                let regoption ={
                    method: "GET"
                }
                let response = await fetch("search.php?value="+value,regoption)
                let text = await response.text()
                document.getElementById("tabledata").innerHTML = text
            } catch (error) {
                console.log(error)
            }
          }
        </script>
</div>
    <br>
    <table class="table table-bordered border-primary" width="1500" border="1" align="center">
      <tr>
      <td width="50" align="center" bgcolor="#E9B824"><strong>อันดับ</strong></td>
      <td width="300" align="center" bgcolor="#E9B824"><strong>ชื่อ-นามสกุล</strong></td>
      <td width="500" align="center" bgcolor="#E9B824"><strong>เรื่อง</strong></td>
      <td width="250" align="center" bgcolor="#E9B824"><strong>วันเวลา</strong></td>
      <td width="250" align="center" bgcolor="#E9B824"><strong>ชื่อไฟล์</strong></td>
      <td width="150" align="center" bgcolor="#E9B824"><strong>สถานะ</strong></td>
      </tr>
      <tbody id="tabledata">
      <?php
    
    $sql = "SELECT * FROM table_request ORDER BY request_id ASC";  //เรียกข้อมูลมาแสดงทั้งหมด
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
      </tbody>
      
    
    </table>
    </div>
</form>

</body>