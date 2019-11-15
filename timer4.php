<script type="text/javascript" src="assets/js/jquery-3.1.0.min.js"></script>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="file://///10.149.45.1/htdocs/raj-oes/assets/font-awesome.min.css">
<style>
#div1 {
    font-size:20px;
}
</style>


</head>
<body>
<span style="font-size: 25px">Time Left :</span><span style="font-size: 25px" id='timer'></span>
<?php //$totaltime=$_SESSION['timer'];
$totaltime=constant("timer");?>
<script>
    //define your time in second
        var c="<?php echo $totaltime; ?>";
        var t;
        timedCount();
        function timedCount()
        {
        	var hours = parseInt( c / 3600 ) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;
        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
        	$('#timer').html(result);
            if(c == 0 )
            {
            	//setConfirmUnload(false);
                //$("#quiz_form").submit();
//                    $("#quiz").submit();
                    <?php $_SESSION["xformsaved"] = "TimesUp";?>
                    parent.document.getElementById("quiz").submit();
                 //   window.location="index2.php";
            }
            c = c - 1;
            t = setTimeout(function()
            {
             timedCount()
            },
            1000);
        }
    </script>
    <script>
function hourglass() {
    var a;
    a = document.getElementById("div1");
    a.innerHTML = "&#xf251;";
    setTimeout(function () {
            a.innerHTML = "&#xf252;";
        }, 1000);
    setTimeout(function () {
            a.innerHTML = "&#xf253;";
        }, 2000);
}
hourglass();
setInterval(hourglass, 3000);
</script>
    </body>
</html>
