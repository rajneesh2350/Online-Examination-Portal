<?php require('includes/config.php');
//if not logged in redirect to login page
if(!$_SESSION['loggedin']){ header('Location: index.php'); }
//define page title
$title = $_SESSION['studentname'];
//include header template
require('layout/header.php');
?>
<script>
    parent.document.getElementById("btnSubmit").disabled = true;
</script>
<?php
//session_start();
if ($_SESSION["okdata"])
{
    $xdob=$_SESSION["dob"];
    $xrollno=$_SESSION["xrollno"];
    $xstarttime=$_SESSION["xstarttime"];
    date_default_timezone_set('Asia/Kolkata');
    $xendttime=date_create()->format('d-M-Y H:i:s');
    $xformsaved=$_SESSION["xformsaved"];
    $noofquestion=$_SESSION['noofquestion'];
    ?>
    <script>
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
        window.onhashchange=function(){window.location.hash="no-back-button";}
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
        /* break back button */
        window.onload=function(){
            var i=0; var previous_hash = window.location.hash;
            var x = setInterval(function(){
                i++; window.location.hash = "/noop/" + i;
                if (i==10){clearInterval(x);
                    window.location.hash = previous_hash;}
            },10);
        }
    </script>
    <?php
//echo "Posted Value : ".$_POST['formsubmitted']."<br><br>";
    require_once('includes/conn.php');
    $xmname=gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $sql2 = "UPDATE student2019 SET EXAMSTATUS=1,Machinename='$xmname' WHERE rollno='$xrollno' AND dob='$xdob'" ;
    $result2 = $conn->query($sql2);
// $noofquestion=5;
    for ($x = 1; $x <= $noofquestion; $x++) {
        $Qid=$x; $Qid='Qid'.$Qid;
        //   echo "The Question number is: $Qid <br>";
        $Qno=$_POST['Qid'.$x];
//    echo "The Quest ID is:".$Qno;
        $sql = "SELECT * FROM Paper1 where id=$Qno limit 1;";
        $result = $conn->query($sql);
        $totalCorrect = 0;
        while($row = $result->fetch_assoc()) {
            $sno=$row["id"];
            $sno='question'.$sno;
            if(isset($_POST[$sno])) { $answer1 = $_POST[$sno]; } else { $answer1='U'; }
            $sno=$row["id"];
            $age['Ans'.$sno] = $row["solution"];
            if ($answer1 == $age['Ans'.$sno]) { $totalCorrect++; }
            $xcorrect_id=$age['Ans'.$sno];
            $sql2 = "INSERT INTO Result1 (question_id,correct_ans,student_ans,starttime,endtime,timestamp,form_saved_as,rollno,dob)
            VALUES($sno , '$xcorrect_id' , '$answer1' ,  '$xstarttime' , '$xendttime' , now(),'$xformsaved','$xrollno','$xdob')";
            $result2 = $conn->query($sql2);
            //           echo $sql2;
            //          echo $result2;
        }
    }
    if ($_SESSION["xformsaved"]=="TimesUp"){ echo "Data Submitted Successfully... and Your Time is Finished...!<br><br>"; }
    if ($_POST['formsubmitted']=="2350"){ echo "Data Submitted Successfully...! <br><br>"; }
    echo '<script> alert("Your Answer Sheet Successfully submitted...Now leave the Examination Hall."); </script>';
// destroy the session
    $_SESSION["okdata"] = FALSE;
    $_SESSION["xrollno"] = "";
    $_SESSION["xformsaved"] = "";
    $_SESSION["xstarttime"] = "";
//exit();
    $conn->close();
    session_unset();
    session_destroy();
    echo '<script> window.location="index.php"; </script>';
    $_SESSION["okdata"] = FALSE;
    $_SESSION["xrollno"] = "";
    $_SESSION["xformsaved"] = "";
    $_SESSION["xstarttime"] = "";
    session_unset();
    session_destroy();
}
?>
