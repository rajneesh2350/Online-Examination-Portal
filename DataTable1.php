<?php require('includes/config.php');
    require('layout/header.php');
    //if not logged in redirect to login page
    if(!$_SESSION['loggedin']){ header('Location: login.php'); }
    //define page title
    $XRollNo=$_GET["val1"];
    $XToken=$XRollNo;
    if (empty($XToken)) {  header('Location: login.php'); }
?>
<head>
    <style>
    @media print {
    #myPrntbtn {
        display :  none;
    }
}
   .tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;margin:0px auto;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;}
    .tg .tg-4da3{background-color:#9de0ad;font-weight:bold;font-size:16px;border-color:#493f3f;text-align:center;vertical-align:top}
    .tg .tg-jwuj{border-color:#493f3f;text-align:centre;vertical-align:top}
    .tg .tg-opm7{font-size:24px;background-color:#9de0ad;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-sthn{border-color:#493f3f;text-align:left;vertical-align:middle}
    @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style/main.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
</head>
<a href='finallogout.php' id="myPrntbtn" class="btn btn-danger" style="width:100%;" id="btnLogout">Logout</a>
<!--<form>
<?php
    require_once('includes/conn.php');
    $sql = "Select * from student2019";
    $result = $conn->query($sql);
    echo "<select name='rollno'>";
    echo "<option>-- Select Roll No --</option>";
    while($row = $result->fetch_assoc())
            {
            echo "<option value='$row[rollno]'>$row[rollno]</option>n";
            }
    echo "</select>";
?>
</form>
//header('Location: http://10.149.45.1/logic/DataTable1.php?val1='.$_POST['rollno'].'#no-back-button');
-->
<?php
$studentname='';
$totalCorrect = 0;
$totalq=0;

            require_once('includes/conn.php');
            if ($XToken=='All')
            {
                $sql = "Select A.id,A.Question,A.Option1,A.Option2,A.Option3,A.Option4,A.solution as CorrectAns,B.Student_ans As StudentAns,B.RollNo,B.Starttime,B.EndTime,B.TimeStamp from Paper1 A,Result1 B where A.id=B.Question_Id";
            }
            else {
                $sql = "Select A.id,A.Question,A.Option1,A.Option2,A.Option3,A.Option4,A.solution as CorrectAns,B.Student_ans As StudentAns,B.RollNo,B.Starttime,B.EndTime,B.TimeStamp from Paper1 A,Result1 B where A.id=B.Question_Id and B.RollNo='$XRollNo'";
                $sql2 = "Select * from Student2019 where RollNo='$XRollNo' LIMIT 1";
                $result2 = $conn->query($sql2); while($row = $result2->fetch_assoc()) { $studentname=$row["name"]; $studentmachine=$row["machinename"];}
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
?>
    <div class="tg-wrap"><table id="tg-pkvTU" class="tg">
<?php
$token=1;
                while($row = $result->fetch_assoc())
                {

if ($token==1) {
    ?>
    <tr>
<?php
$checkOutTime   = strtotime($row["EndTime"]);
$loginTime      = strtotime($row["Starttime"]);
$diff           = $checkOutTime - $loginTime;
$hours = floor($diff / 3600);
$minutes = floor(($diff / 60) % 60);
$seconds = $diff % 60;
//echo "$hours:$minutes:$seconds";
echo '<p style="text-align: center"><span style="font-size: 26px">Student Name :<b>'.$studentname.'</span></b></p>';
?>

        <th class="tg-opm7" colspan="9">Roll No. :&nbsp;<?php echo $row["RollNo"];      ?>
        &nbsp;&nbsp;Start:&nbsp;<?php echo $row["Starttime"];   ?>
        &nbsp;&nbsp;End  :&nbsp;<?php echo $row["EndTime"];     ?>
        &nbsp;&nbsp;Total:&nbsp;<?php echo "$hours:$minutes:$seconds";?>
        &nbsp;&nbsp;Machine ID:&nbsp;<?php echo $studentmachine;?>
        </th>

    </tr>
     <tr>
        <td class="tg-4da3">SN</td>
        <td class="tg-4da3">id</td>
        <td class="tg-4da3">Question</td>
        <td class="tg-4da3">Option A</td>
        <td class="tg-4da3">Option B</td>
        <td class="tg-4da3">Option C</td>
        <td class="tg-4da3">Option D</td>
        <td class="tg-4da3">Ans</td>
        <td class="tg-4da3">Correct</td>
    </tr>
<?php }
    $totalq=$totalq+1;
    if ($row["StudentAns"] == $row["CorrectAns"]) { $totalCorrect++; }
?>
    <tr>
        <td class="tg-jwuj"><?php echo $totalq; ?><?php if ($row["StudentAns"] == $row["CorrectAns"]) { echo '<b><span style="font-size: 20px">'.'&radic;'.'</span></b>'; }?></td>
        <td class="tg-jwuj"><?php echo $row["id"]; ?>         </td>
        <td class="tg-sthn"><?php echo $row["Question"]; ?>   </td>
        <td class="tg-sthn"><?php echo $row["Option1"]; ?>    </td>
        <td class="tg-sthn"><?php echo $row["Option2"]; ?>    </td>
        <td class="tg-sthn"><?php echo $row["Option3"]; ?>    </td>
        <td class="tg-jwuj"><?php echo $row["Option4"]; ?>    </td>
        <?php if ($row["StudentAns"] <> $row["CorrectAns"]) { ?>
        <td class="tg-jwuj" style="color: #FF0000"><?php echo $row["StudentAns"]; ?> </td>
        <?php } else { ?> <td class="tg-jwuj"><?php echo $row["StudentAns"]; ?> </td>
        <?php } ?>
        <td class="tg-jwuj"><?php echo $row["CorrectAns"]; ?><?php if ($row["StudentAns"] == $row["CorrectAns"]) { echo '<b><span style="font-size: 20px">'.'&radic;'.'</span></b>'; }?> </td>
    </tr>
       <?php $token=0;
                }
                echo '</table></div>';
            } else {
                echo "0 results";
            }
            $conn->close();
?>
</table></div>
<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<script charset="utf-8">var TGSort=window.TGSort||function(n){"use strict";function r(n){return n.length}function t(n,t){if(n)for(var e=0,a=r(n);a>e;++e)t(n[e],e)}function e(n){return n.split("").reverse().join("")}function a(n){var e=n[0];return t(n,function(n){for(;!n.startsWith(e);)e=e.substring(0,r(e)-1)}),r(e)}function o(n,r){return-1!=n.map(r).indexOf(!0)}function u(n,r){return function(t){var e="";return t.replace(n,function(n,t,a){return e=t.replace(r,"")+"."+(a||"").substring(1)}),l(e)}}function i(n){var t=l(n);return!isNaN(t)&&r(""+t)+1>=r(n)?t:NaN}function s(n){var e=[];return t([i,m,g],function(t){var a;r(e)||o(a=n.map(t),isNaN)||(e=a)}),e}function c(n){var t=s(n);if(!r(t)){var o=a(n),u=a(n.map(e)),i=n.map(function(n){return n.substring(o,r(n)-u)});t=s(i)}return t}function f(n){var r=n.map(Date.parse);return o(r,isNaN)?[]:r}function v(n,r){r(n),t(n.childNodes,function(n){v(n,r)})}function d(n){var r,t=[],e=[];return v(n,function(n){var a=n.nodeName;"TR"==a?(r=[],t.push(r),e.push(n)):("TD"==a||"TH"==a)&&r.push(n)}),[t,e]}function p(n){if("TABLE"==n.nodeName){for(var e=d(n),a=e[0],o=e[1],u=r(a),i=u>1&&r(a[0])<r(a[1])?1:0,s=i+1,v=a[i],p=r(v),l=[],m=[],g=[],h=s;u>h;++h){for(var N=0;p>N;++N){r(m)<p&&m.push([]);var T=a[h][N],C=T.textContent||T.innerText||"";m[N].push(C.trim())}g.push(h-s)}var L="tg-sort-asc",E="tg-sort-desc",b=function(){for(var n=0;p>n;++n){var r=v[n].classList;r.remove(L),r.remove(E),l[n]=0}};t(v,function(n,t){l[t]=0;var e=n.classList;e.add("tg-sort-header"),n.addEventListener("click",function(){function n(n,r){var t=d[n],e=d[r];return t>e?a:e>t?-a:a*(n-r)}var a=l[t];b(),a=1==a?-1:+!a,a&&e.add(a>0?L:E),l[t]=a;var i=m[t],v=function(n,r){return a*i[n].localeCompare(i[r])||a*(n-r)},d=c(i);(r(d)||r(d=f(i)))&&(v=n);var p=g.slice();p.sort(v);for(var h=null,N=s;u>N;++N)h=o[N].parentNode,h.removeChild(o[N]);for(var N=s;u>N;++N)h.appendChild(o[s+p[N-s]])})})}}var l=parseFloat,m=u(/^(?:\s*)([+-]?(?:\d+)(?:,\d{3})*)(\.\d*)?$/g,/,/g),g=u(/^(?:\s*)([+-]?(?:\d+)(?:\.\d{3})*)(,\d*)?$/g,/\./g);n.addEventListener("DOMContentLoaded",function(){for(var t=n.getElementsByClassName("tg"),e=0;e<r(t);++e)try{p(t[e])}catch(a){}})}(document);</script>
<?php
date_default_timezone_set('Asia/Kolkata');
echo date("l jS \of F Y h:i:s A");
echo '<div class="card-header" data-background-color="purple"><p style="text-align: right"><span style="font-size: 20px">';
echo 'Signature : ___________ Name : '.$studentname.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Result : '.$totalCorrect.'/'.$totalq.'</span></p></div>';

?>
