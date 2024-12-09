<?php

$host="localhost";
$user="root";
$pass="";
$db="csv_db 7";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}


ini_set ('error_reporting', E_ALL);
ini_set ('display_errors', '1');
error_reporting (E_ALL|E_STRICT);

$servername='gateway01.ap-southeast-1.prod.aws.tidbcloud.com';
$username1='4Mb27eL6Smm8pmq.root';
$password1='uHwC4nmT0g8Uts0f';
$dbname1='MyDB';
$port=4000;
?>