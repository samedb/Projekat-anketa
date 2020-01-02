
<?php
include "inc/Chart.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Charts</title>
	<link rel="stylesheet" href="css/chart.css">
	<script src="inc/ChartJS.min.js"></script>
</head>
<body>
  <!-- Your code here -->
  <?php
$PieChart = new Chart('pie', 'examplePie');
$PieChart->set('data', array(2, 10, 16, 30, 42));
$PieChart->set('legend', array('Work', 'Eat', 'Sleep', 'Listen to music', 'Code'));
$PieChart->set('displayLegend', true);
echo $PieChart->returnFullHTML();
?>
</body>
</html>