<?php
session_start();
$_SESSION["okdata"] = FALSE;
$_SESSION["xrollno"] = "";
$_SESSION["xformsaved"] = "";
$_SESSION["xstarttime"] = "";
   session_destroy();
   session_unset();
echo '<script> alert("Now leave the Examination Hall."); </script>';
header('Location: index.php');
?>

