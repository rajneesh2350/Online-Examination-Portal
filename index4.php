<?php require('includes/config.php');
      require('layout/header.php');
//if not logged in redirect to login page
//if(!$_SESSION['loggedin']){ header('Location: index.php'); }
?>
<?php
//define page title
//include header template
$title = $_SESSION['dob']; //DOB
$rollno = $_SESSION['rollno'];
$_SESSION["okdata"] = TRUE;
$_SESSION["xrollno"] = $rollno;
$_SESSION["xformsaved"] = "Normal";
date_default_timezone_set('Asia/Kolkata');
$_SESSION["xstarttime"] = date_create()->format('d-M-Y H:i:s');
$xrollno=$_SESSION["xrollno"];
$xstarttime=$_SESSION["xstarttime"];
$noofquestion=$_SESSION['noofquestion'];

?>
<html>
<head>
<script>
    $('input[type=radio], input[type=checkbox]').on("click", function() {
    var $t = $(this);
    //If it's checked
    if ($t.is(':checked')) {
        //Add the green class to the parent
        $t.parent().addClass("greenText");
    } else {
        //Remove the green class from the parent
        $t.parent().removeClass("greenText");
    }
});
</script>

     <link rel="stylesheet" href="/style/main.css">
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 </head>
<body onload=show5()>
<div class="container">
    <div class="center-block">
        <div class="card">
            <div class="card-content">
                <div id="page-wrap">
                <div class="card-header" data-background-color="purple" style="position:fixed; width:81%; Height:Auto;" >

                        <p style="text-align: center; margin-top: 40px; font-size: 27px">
                         <?php echo $xrollno."&nbsp;-&nbsp;".$_SESSION['studentname'] ?>&nbsp;- Welcome to online Examination @ IGIPESS
                         <span id="liveclock"></span>
                        </p>
                        <p style="text-align: center">
                            <?php require("timer4.php");
                            //echo "<p style='text-align: center'>Roll No. : ".$xrollno."     Start Time : ".$xstarttime.'</p>';

                            ?>
                        </p>
                </div>
                <div id="score" class="card-header" data-background-color="orange" style="position:fixed; width:81%; Height:Auto;" >
                     <?php
                         $x=0;
                         while ( $noofquestion-1 > $x ){
                         $x=$x+1;
                         $Qid=$x; $Qid='Qid'.$Qid;
                         ?>
                         <a href="#<?php echo $Qid; ?>">&nbsp;<?php echo $x+1; ?></a>
                     <?php }    ?>
                </div>
                </div>
 <div class="card-content">
<br><br><br><br><br><br><br>
        <form action="logout.php" method="post" enctype="multipart/form-data" id="quiz">
            <ol style="font-size: 20px">
 <?php
            require_once('includes/conn.php');
            $sql = "SELECT * FROM Paper1 order by rand() limit $noofquestion;";
            $result = $conn->query($sql);
            $x=0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                ?>
                <?php $sno=$row["id"]; $sno='question'.$sno;
                 //     $age['Ans'.$sno] = $row["solution"];
                 //     echo $age['Ans'.$sno];
                 $x=$x+1;
                 $Qid=$x; $Qid='Qid'.$Qid;
                ?>
                            <li>
            <input type="hidden" id="<?php echo $row['id']; ?>" name="<?php echo $Qid; ?>" value="<?php echo $row['id']; ?>" />
                            <?php // echo $Qid; ?>
                            <h4 id="<?php echo $Qid; ?>"><?php echo $row["question"] ?></h4>
                                <div>
                                    <input class="largerRadio" type="radio" name="<?php echo $sno; ?>" id="<?php echo $sno; ?>" value="A"/>
                                    A)<label for="<?php echo $sno; ?>"><?php echo $row["option1"] ?></label>
                                </div>
                                <div>
                                    <input class="largerRadio" type="radio" name="<?php echo $sno; ?>" id="<?php echo $sno; ?>" value="B" />
                                    B)<label for="<?php echo $sno; ?>"><?php echo $row["option2"] ?></label>
                                </div>
                                <div>
                                    <input class="largerRadio" type="radio" name="<?php echo $sno; ?>" id="<?php echo $sno; ?>" value="C" />
                                    C)<label for="<?php echo $sno; ?>"><?php echo $row["option3"] ?></label>
                                </div>
                                <div>
                                    <input class="largerRadio" type="radio" name="<?php echo $sno; ?>" id="<?php echo $sno; ?>" value="D" />
                                    D)<label for="<?php echo $sno; ?>"><?php echo $row["option4"] ?></label>
                                </div>
                            </li>
                            <hr/>
<?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
?>
            </ol>
<div  style="text-align: center">
                <input type="checkbox" id="chkAgree" class="largerCheckbox" onclick="goFurther()">
                <input type="hidden" name="formsubmitted" value="2350">
                <p style="text-align: center; margin-left: 2px; margin-right: 2px; margin-top: 2px; margin-bottom: 2px; line-height: 1.2"><br>
                <span style="color: #FF0000"><span style="font-size: 16px">Click on box to Confirm that all questions are attempted, and confirm to save,
                After that you are not able to edit the Answer[s].</span></span>
                Are you confirm?</p>
                </input>
                <button type="submit" class="btn btn-success" style="width:100%;" id="btnSubmit" disabled>Submit / Save</button>
</div>
        </form>
    </div>
                                </div>
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
    <!--   Core JS Files
    <script src="assets/js/material.min.js" type="text/javascript"></script>-->
    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->
    <!-- Material Dashboard javascript methods
    <script src="assets/js/material-dashboard.js"></script> -->
 <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script> -->
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>-->
  <script src="./assets/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
  <script src="./assets/js/Clock.js" type="text/javascript"></script>
</html>
