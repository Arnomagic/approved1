<?php
include 'config.php';
    $name = $_GET['value'];
    $sql = "SELECT * FROM table_request WHERE request_subject LIKE '%$name%'  OR request_file LIKE '%$name%' OR request_firstname LIKE '%$name%'  ORDER BY request_id ASC;";  //เรียกข้อมูลมาแสดงทั้งหมด
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
