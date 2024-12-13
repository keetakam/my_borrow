<?php
include ('connect.php');

if(isset($_POST['add_object'])){
    echo "yes it is pressed";

    $ID_ =$_POST['id'];
    $Name_ =$_POST['name'];
    $Type_ =$_POST['type'];
    $Status_ =$_POST['status'];

    if($ID_ ==""|| empty($ID_)){
        header ('location:adminpage.php?message= you need to xxxxxx');
    }
    else{
        $query = "INSERT INTO `Object2` (`no`,`name`) VALUES(NULL,'$Name_')";
        $result = mysqli_query($conn2,$query);
        if(!$result){
            die("Query Failed". mysqli_connect_error());
        }
        else{
            header('location:adminpage.php?insert_msg= You data has been ADDED');
        }
    }
}
?>