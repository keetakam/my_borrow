<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test1xxx</title>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, voluptatum.</p> 
</body>
<br>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>ตารางข้อมูลพัสดุ</h2>
         <?php

// $db_server = 'localhost';
// $db_user = "root";
// $db_pass = "";
// $db_name = 'test1';
// $conn = "";

ini_set ('error_reporting', E_ALL);
ini_set ('display_errors', '1');
error_reporting (E_ALL|E_STRICT);

$servername='gateway01.ap-southeast-1.prod.aws.tidbcloud.com';
$username='4Mb27eL6Smm8pmq.root';
$password='uHwC4nmT0g8Uts0f';
$dbname='MyDB';
$port=4000;

$conn=mysqli_init();
if (!$conn){die("mysqli_init failed");}
mysqli_ssl_set($conn,NULL,NULL,"isrgrootx1.pem",NULL,NULL); 
if (!mysqli_real_connect($conn,$servername,$username,$password,$dbname,$port)){die("Connect Error: " . mysqli_connect_error());}
else {echo "Database connected";}

echo '<br>';   


$conn->set_charset("utf8mb4");

$sql = "SELECT NO ,code_id,name FROM object";  // Example query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the table
    echo "<table border='2'>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>name</th>
                <th>edit</th>

               
            </tr>";
             // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["NO"]. "</td>   
                <td>" . $row["code_id"]. "</td>    
                <td>" . $row["name"]. "</td>
                <td>" . $row["NO"]. "</td>                 
              </tr>";
    }
    echo "</table>"; // End the table
} else {
    echo "0 results";
}
$conn->close();
?>
</html>