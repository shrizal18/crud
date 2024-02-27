<?php
// Seting  connection variables
$server = "localhost";
$username = "root";
$password = "";
$database = "library"; 

// Creating a database connection
$con = mysqli_connect($server, $username, $password, $database);

// Check for connection success
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
   
}

// Check if form data is submitted
if(isset($_GET['id'])) {
    // Collect post variables
    $id = $_GET['id']; // assuming you have an 'id' field in your form
  

    // Update data in the database
    $sql = "DELETE FROM `list` WHERE `list`.`id` = $id";

    if (mysqli_query($con, $sql)) {
        header('location:ret.php');
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

// Close the connection
mysqli_close($con);
?>
