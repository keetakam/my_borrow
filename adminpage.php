<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Adminpage1</title>
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
       <p>
       <?php
       $sql2 = "SELECT PersonID,Username,Type,password FROM Users";  // Example query
            $result2 = $conn2->query($sql2);
            while($row2 = $result2->fetch_assoc()) {
                echo $row2["Username"]. ' Type:'.$row2["Type"]. " password:". $row2["password"];
            }
            ?>
      </p>
      <a href="logout.php">Logout</a>
<!-- 
      <p>Connect LocalDB</p>  -->

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
            <div class="box1">
            <h2>ตารางข้อมูลพัสดุ</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD OBJECT</button>
            <!-- Button trigger modal -->
          </div>
          
           <?php 
  if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
  }
?> 
  <?php
  if(isset($_GET['insert_message'])){
    echo "<h6>".$_GET['insert_message']."</h6>";
  }

  ?>

<?php
$conn2=mysqli_init();
if (!$conn2){die("mysqli_init failed");}
mysqli_ssl_set($conn2,NULL,NULL,"isrgrootx1.pem",NULL,NULL); 
if (!mysqli_real_connect($conn2,$servername,$username1,$password1,$dbname1,$port)){die("Connect Error: " . mysqli_connect_error());}
else {echo "Database connected serverless";}

echo '<br>';   

$sql = "SELECT NO ,code_id,name,type,status FROM object2";  // Example query
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
                <th>edit</th>  
            </tr>";
             // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["NO"]. "</td>   
                <td>" . $row["code_id"]. "</td>    
                <td>" . $row["name"]. "</td>
                <td>" . $row['type']. "</td>  
                <td>" . $row['status']. "</td>     
                <!--td>" .$row["NO"]. "</td-->
                <td>" . "</td>                             
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
    </div>

<?php 
  if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
  }
?>
    <!-- Modal -->
<form action = "insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add object</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">

          <label for="id">id</label>
          <input type="text" name="id" class ="form-control">
        </div>
        <div class="form-group">
          <label for="name">name</label>
          <input type="text" name="name" class ="form-control">
        </div>
        <div class="form-group">
          <label for="type">type</label>
          <input type="text" name="type" class ="form-control">
        </div>

        <div class="form-group">
          <label for="status">status</label>
          <input type="text" name="status" class ="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success " name="add_object">aa</submit>
      </div>
    </div>
  </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body> 



</div>
</html>