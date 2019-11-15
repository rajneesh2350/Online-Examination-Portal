<!DOCTYPE html>
<?php
$numUsers=0;
function checkdata(){
//echo gethostname(); // may output e.g,: sandie
//echo "<br>";
//echo php_uname('n'); // may output e.g,: sandie
//echo "<br>";
//echo gethostbyaddr($_SERVER['REMOTE_ADDR']);
//echo "<br>";
    require_once('includes/conn.php');
    $sql2 = "SELECT COUNT(DISTINCT rollno) as num FROM student2019 where semester=3" ;
    $result2 = $conn->query($sql2);
    while($row = $result2->fetch_assoc()) { $numUsers = $row['num']; }
    define('totalstudent',$numUsers); //in Seconds 30 Minitus 1800 seconds //Retrieve $totaltime=constant("timer");

    $sql3 = "SELECT COUNT(DISTINCT rollno) as num3 FROM student2019 where semester=3 and examstatus=1" ;
    $result3 = $conn->query($sql3);
    while($row = $result3->fetch_assoc()) { $numUsers3 = $row['num3']; }
    define('examdone',$numUsers3); //in Seconds 30 Minitus 1800 seconds //Retrieve $totaltime=constant("timer");
}
checkdata();
?>
<html lang="en-US">
<head>
<meta http-equiv="refresh" content="10" >
</head>
<body>
<h1>Running Exam Status...</h1>
<div id="piechart"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Exam Done', '50 Q in 30 Minutes'],
    ['Student',<?php echo constant("totalstudent"); ?>],
    ['Exam Done',<?php echo constant("examdone"); ?>]
]);
    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Exam Done !', 'width':800, 'height':600};
    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>
</body>
</html>
