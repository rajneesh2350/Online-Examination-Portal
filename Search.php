<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}
#myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 12px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}
#myUL {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
#myUL li a {
    border: 1px solid #ddd;
    margin-top: -1px; /* Prevent double borders */
    background-color: #FFCCFF;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    color: black;
    display: block
}
#myUL li a:hover:not(.header) {
    background-color: #C5FFA8;
}
</style>
</head>
<body>
<h2>Search Window...</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Type to Search Roll No. / D.O.B / Name..." title="Type to Search Roll No. / D.O.B / Name...">
<ul id="myUL">
<?php searchbyname(); ?>
</ul>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                } else {
                        li[i].style.display = "none";
                }
        }
}
</script>
</body>

</html>
<?php
    function searchbyname(){
    require_once('../logic/includes/conn.php');
    $sql = "Select * from student2019";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
            {
            echo '<li><a target="_blank" href="DataTable1.php?val1='.$row["rollno"].'" data-toggle="tooltip" title=" Address : '.$row["address"].' /  Mother Name : '.$row["mname"].'">'.$row["rollno"].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row["dob"].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row["name"].'</a></li>';
            }
} ?>
