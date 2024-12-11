<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <!-- <div style="text-align:center; padding:15%;"> -->
      <!-- <p  style="font-size:50px; font-weight:bold;"> -->
       Hello x <<!-- ?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>  -->
        
      </p>
      <a href="logout.php">Logout</a>

      <p>Connect LocalDB</p> 

      <h1>connect serverless</h1>
        <?php
        $conn2=mysqli_init();
        if (!$conn2){die("mysqli_init failed");}
        mysqli_ssl_set($conn2,NULL,NULL,"isrgrootx1.pem",NULL,NULL); 
        if (!mysqli_real_connect($conn2,$servername,$username1,$password1,$dbname1,$port)){die("Connect Error: " . mysqli_connect_error());}
        else {echo "Database connected serverless";}
        
        echo '<br>';   
         
        $conn2->set_charset("utf8mb4");
            $sql2 = "SELECT PersonID,Username,Type FROM Users";  // Example query
            $result2 = $conn2->query($sql2);
            while($row2 = $result2->fetch_assoc()) {
                echo $row2["Username"]. ' Type'.$row2["Type"];
            }

        ?>
    

    <h2>ตารางข้อมูลพัสดุ</h2>
         <?php
$conn2=mysqli_init();
if (!$conn2){die("mysqli_init failed");}
mysqli_ssl_set($conn2,NULL,NULL,"isrgrootx1.pem",NULL,NULL); 
if (!mysqli_real_connect($conn2,$servername,$username1,$password1,$dbname1,$port)){die("Connect Error: " . mysqli_connect_error());}
else {echo "Database connected serverless";}

echo '<br>';   

$sql = "SELECT NO ,code_id,name,type FROM object";  // Example query
$result = $conn2->query($sql);
if ($result->num_rows > 0) {
    // Start the table
    echo "<table border='2'>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>name</th>
                <th>type</th>
                <th>edit</th>  
            </tr>";
             // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["NO"]. "</td>   
                <td>" . $row["code_id"]. "</td>    
                <td>" . $row["name"]. "</td>
                <td>" . $row['type']. "</td>
                <td>" . $row["NO"]. "</td>                 
              </tr>";
    }
    echo "</table>"; // End the table
} else {
    echo "0 results";
}
$conn->close();
?>

    </div>
</body>
</html>