<?php
$x=searchbyname();
    function searchbyname(){
    require_once('../logic/includes/conn.php');
    $sql = "Select * from student2019";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
            {
            echo '<li><a target="_blank" href="DataTable1.php?val1='.$row["rollno"].'" data-toggle="tooltip" title=" Address : '.$row["address"].' /  Mother Name : '.$row["mname"].'">'.$row["rollno"].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row["dob"].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row["name"].'</a></li>';
            }
} ?>
