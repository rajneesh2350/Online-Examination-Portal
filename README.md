# Online-Examination-Portal

ALL PROJECT FILES WITHIN raj-oep.rar (including database and snapshoot of project)

Conduct online exam at your own at your school/college or institute.
RAJNEESH2350@GMAIL.COM

create your own database .... and put 3 following named tables  (VIEW ALLSO SNAP FOLDER FOR SNAP SHOOT OF THE EXAMINATION PORTAL VIEW AND LOOK)

1. paper1, 
2. result1,
3. student2019 tables 
if you need to put data init sample excel csv files are there to dumping the data into paper1 and student2019.

Change in config and conn file as per your need in the include folder

CONN >> 
$servername = "localhost";
$username = "Your UserName";
$password = "Your DataBasePassword";
$dbname =   "Your DatabaseName";


CONFIG >>
ob_start();
session_start();
//application address
define('DIR','http://yoursitepath.com');
define('SITEEMAIL','rajneesh2350@gmail.com'); // write me if you need any help
$_SESSION['pass']='2001'; // admin ID // ROLL NO FROM STUDENT2019 - ROLLNO
$_SESSION['user']='26-11-2001'; // admin Password // DATE OF BIRTH FROM STUDENT2019 - DOB
$_SESSION['noofquestion']=50;
define('timer',1800); //Paper Timeout in Seconds 30 Minitus equal to 1800 seconds //Retrieve $totaltime=constant("timer");


as the project is worked on offline and online system kindly view following php programme and find the local path changeinto domain path and via-a-vis.

index.php
login.php
index4.php
memberpage.php
logout.php
finallogout.php
search.php
status.php
timer4.php
genrate_result.php


NOTE : 
ALL MACHINES MUST BE CONFIGURED WITH STATIC IP ADDRESS SO THE GATHERED INFORMATION REGARDING THE MACHINE ID IS CORRECTLY SAVED INTO RESULT1 FILE. 
(FOR OFFLINE CLASSROOM)

You may create your own project logo for this open the TopHeadLogo.png file as per your conviences software and make change 
(pls consider width and length of the image)


email me for further support or help me to improve.

RAJNEESH2350@GMAIL.COM



