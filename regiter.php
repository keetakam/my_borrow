<?php
include 'connect.php';

if(isset($_POST['signIN'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * From users WHERE email='$email' and password='$pasword'";
    $result=$conn->query($sql);

    if($result ->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header('Local: homepage.php');
        exit();

    }
    else{
        echo "Not Found";
    }
}
?>