<?php require('includes/config.php');
//if not logged in redirect to login page
if(!$_SESSION['loggedin']){ header('Location: index.php'); }
//define page title
$title = 'Welcome : '.$_SESSION['studentname'];
//include header template
require('layout/header.php');
?>
<html>
<head>
    
        <link rel="stylesheet" href="file://///10.149.45.1/htdocs/logic/assets/bootstrap.min.css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <!--  Material Dashboard CSS    -->
        <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<script>
document.documentElement.requestFullscreen();
if (document.fullscreenEnabled) {
 document.documentElement.requestFullscreen();
}
document.addEventListener("fullscreenchange", function (event) {
    if (document.fullscreenElement) {
document.documentElement.requestFullscreen();
    } else {
document.documentElement.requestFullscreen();     }
});
</script>
<script type="text/javascript">
        window.onload = function(){
           var refButton = document.getElementById("chkAgree2");
            refButton.onclick = function() {
//                alert('I am clicked!');
                    if (document.getElementById("chkAgree2").checked == true) {
                        document.getElementById("btnExam2").disabled = false; }
                    else {
                        document.getElementById("btnExam2").disabled = true; }
            }
        };
</script>
</head>
<body>
    <div id="demo"></div>
<div class="container">
	<div class="row">
	    <div class="col-xs-12">
               <p style="text-align: center"> <img src="TopHeadLogo.png"/></p>
			   <h4 style="text-align: center"><?php echo $_SESSION['studentname']; ?><span style="color: #969696">&nbsp;Best of Luck ! &nbsp;&nbsp;Kindly Check Your Roll No.:</span><?php echo $_SESSION['rollno']; ?>&nbsp;&nbsp;<span style="color: #969696">& Your D.O.B.:</span><?php echo $_SESSION['dob']; ?></h4>
               <h4 style="text-align: center">Your Exam time will start after you click on Exam Button.</h4>
               <h4 style="text-align: center">Please do not click on <b>Forward/Back/Refresh</b> Buttons on browser.</h4>
               <p>
               <a href='finallogout.php' class="btn btn-danger" style="width:100%;" id="btnLogout">Logout</a>
        <div  style="text-align: center">
                <p style="text-align: center; margin-left: 2px; margin-right: 2px; margin-top: 1px; margin-bottom: 1px; line-height: 1.2"><br>
                <div id="demo" style="color: #FF0000; font-size: 16px">
                 <input type="checkbox" id="chkAgree2" class="largerCheckbox" onclick="goFurther2()">
                Click to confirm that you read all above information, and further no clarification[s] required.</div>
                Are you confirm?</p>
                </input>
                	<form role="form" method="post" action="index4.php" autocomplete="off">
                <button type="submit" class="btn btn-success" style="width:100%;" id="btnExam2" disabled>
                    Exam<span class="spinner-grow spinner-grow-bg"></span>
                </button>
                <hr>
                	</form>
</div>
<?php $xrollno=$_SESSION['rollno']; $xdob=$_SESSION['dob']; $xpass=$_SESSION['pass']; $xuser=$_SESSION['user'];
    if ($xrollno==$xpass && $xdob==$xuser)
    {
        echo '<a href="search.php" class="btn btn-warning" style="width:100%;" id="btnKey" target="_blank">Result</a> ';
        echo '<a href="../EntryForm/paper_entry.php" class="btn btn-info" style="width:100%;" id="btnKey">Question Paper Entry</a> ';
//        echo '<a href="DataTable1.php?val1=All" class="btn btn-info" style="width:100%;" id="btnKey">Exam Key</a>';
    }
?>
<div class="col-xs-12">
    <div class="spinner-grow text-muted"></div>
    <div class="spinner-grow text-primary"></div>
    <div class="spinner-grow text-success"></div>
    <div class="spinner-grow text-info"></div>
    <div class="spinner-grow text-warning"></div>
    <div class="spinner-grow text-danger"></div>
    <div class="spinner-grow text-secondary"></div>
    <div class="spinner-grow text-dark"></div>
    <div class="spinner-grow text-light"></div>
</div>
                </p>
				<hr>
		</div>
	</div>
</div>
</body>
<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<?php
//include header template
require('layout/footer.php');
?>
</html>