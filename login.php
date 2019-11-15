<?php
require('includes/config.php');
require_once('includes/conn.php');
require('layout/header.php');
//check if already logged in move to home page
//process login form if submitted
if(isset($_POST['submit'])){
	$dob = $_POST['dob'];
    $xdob = strtotime($dob);
    $dob = date('d-m-Y',$xdob);
//	$password = $_POST['password'];
	$password = '2350';
    $rollno= strtoupper($_POST['rollno']);
    $sql = "SELECT * FROM student2019 WHERE rollno='$rollno' AND dob='$dob'  AND examstatus=0 LIMIT 1";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();
           $error[] =  "Result " . " - Rollno: " . $row["rollno"]. " DOB : " . $row["dob"]. "<br>";
           echo "id: " . $row["id"]. " - Rollno: " . $row["rollno"]. " DOB : " . $row["dob"]. "<br>";
   		   $_SESSION['loggedin'] = true;
		   $_SESSION['dob'] = $dob;
		   $_SESSION['rollno'] = $row['rollno'];
           $_SESSION['studentname'] = $row['name'];
           $_SESSION['emailid'] = $row['emailid'];


         	header('Location: memberpage.php');
            $conn->close();
} else {
    $error[] = 'Check Roll Number / D.O.B. is incorrect. / Exam Already Attempt. 0 results';
   }
}//end if submit
//define page title
$title = 'Login';
//include header template
require('layout/header.php');
?>
<head>
    <link rel="stylesheet" href="file://///10.149.45.1/htdocs/raj-oes/assets/bootstrap.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<script>
input,
input::-webkit-input-placeholder {
    font-size: 35px;
    line-height: 4;
}
::placeholder{
overflow: visible;
}
</script>
<script>
 var elem = document.getElementById("myvideo");
  function openFullscreen() {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { /* Firefox */
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE/Edge */
      elem.msRequestFullscreen();
    }
    $(document).on("keydown",function(ev){
    	console.log(ev.keyCode);
    	if(ev.keyCode===27||ev.keyCode===122) return false
    })
  }
</script>
</head>
<body>
<div class="container" id="myvideo">
	<div class="row">
	    <div class="col-xs-12">
	        <br>
        <p style="text-align: center"> <img src="TopHeadLogo.png"/></p>
			<form role="form" method="post" action="" autocomplete="off">
			  	<h2><p style="text-align: center">Please Login</P></h2>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Alert ! <?php echo $error ?> </strong>
</div>
<?php
//						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				?>
				<div class="form-group">
				  <label>Roll Number</label>
					<input type="text" style="font-size: 35px; width:100%; text-transform:uppercase" name="rollno" id="rollno"  placeholder="Roll Number" value="<?php if(isset($error)){ echo $_POST['rollno']; } ?>" tabindex="1" required>
				</div>
				<div class="form-group">
				    <label>Date of Birth</label>
					<input type="date" style="font-size: 35px; width:100%;" name="dob" id="dob" placeholder="Date of Birth - DD-MM-YYYY" value="<?php if(isset($error)){ echo $_POST['dob']; } ?>" tabindex="2" required>
				</div>
    			<hr>
				<div class="row">
					<input id="myvideo" type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="4">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
<?php
require('layout/footer.php');
?>
