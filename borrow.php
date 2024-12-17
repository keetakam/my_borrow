<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>borrow</title>
</head>
<body>
<?php
$conn2=mysqli_init();
if (!$conn2){die("mysqli_init failed");}
mysqli_ssl_set($conn2,NULL,NULL,"isrgrootx1.pem",NULL,NULL); 
if (!mysqli_real_connect($conn2,$servername,$username1,$password1,$dbname1,$port)){die("Connect Error: " . mysqli_connect_error());}
else {echo "Database connected serverless";}

echo '<br>';   

$sql = "SELECT NO ,code_id,name,type,status FROM object2 WHERE status = 0";  // Example query
$result = $conn2->query($sql);
if ($result->num_rows > 0) {
    // Start the table
    echo "<table border='2'>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>name</th>
                <th>type</th>
                <th>status</th>
            </tr>";
             // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["NO"]. "</td>   
                <td>" . $row["code_id"]. "</td>    
                <td>" . $row["name"]. "</td>
                <td>" . $row['type']. "</td>  
                <td>" . $row['status']. "</td>                             
              </tr>";
            
    }
    
    echo "</table>";  
    // End the table 
} 
else {
    echo "0 results";
}


$conn2->close();
?>

</body>
</html>