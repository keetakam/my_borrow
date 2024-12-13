<?php
/*  
$host="localhost";
$user="root";
$pass="";
$db="csv_db 7";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
} */

ini_set ('error_reporting', E_ALL);
ini_set ('display_errors', '1');
error_reporting (E_ALL|E_STRICT);

$servername='gateway01.ap-southeast-1.prod.aws.tidbcloud.com';
$username1='4Mb27eL6Smm8pmq.root';
$password1='uHwC4nmT0g8Uts0f';
$dbname1='MyDB';
$port=4000;



$conn2=mysqli_init();
if (!$conn2){die("mysqli_init failed");}
mysqli_ssl_set($conn2,NULL,NULL,"isrgrootx1.pem",NULL,NULL); 
if (!mysqli_real_connect($conn2,$servername,$username1,$password1,$dbname1,$port)){die("Connect Error: " . mysqli_connect_error());}
else {echo "Database connected serverlessaa";}

?>

