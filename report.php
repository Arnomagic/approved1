<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<?php include ("navbar.php"); ?>
<br>
<form class="container form_container">
<canvas id="myChart"></canvas>

<?php
$sql_pending = "SELECT COUNT(*) AS total_pending FROM table_request WHERE request_status = 'รออนุมัติ'";
$sql_approved = "SELECT COUNT(*) AS total_approved FROM table_request WHERE request_status = 'อนุมัติ'";
$sql_rejected = "SELECT COUNT(*) AS total_rejected FROM table_request WHERE request_status = 'ไม่อนุมัติ'";

$result_pending = $con->query($sql_pending);
$result_approved = $con->query($sql_approved);
$result_rejected = $con->query($sql_rejected);

if ($result_pending->num_rows > 0) {
    $row_pending = $result_pending->fetch_assoc();
    $totalPending = $row_pending["total_pending"];
} else {
    $totalPending = 0;
}

if ($result_approved->num_rows > 0) {
    $row_approved = $result_approved->fetch_assoc();
    $totalApproved = $row_approved["total_approved"];
} else {
    $totalApproved = 0;
}

if ($result_rejected->num_rows > 0) {
    $row_rejected = $result_rejected->fetch_assoc();
    $totalRejected = $row_rejected["total_rejected"];
} else {
    $totalRejected = 0;
}

$con->close();

?>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['รออนุมัติ', 'อนุมัติ', 'ไม่อนุมัติ'],
        datasets: [{
            label: 'จำนวนการขอ',
            data: [<?php echo $totalPending; ?>, <?php echo $totalApproved; ?>, <?php echo $totalRejected; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</form>