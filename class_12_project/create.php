<?php
// Setting connection variables
$server = "localhost";
$username = "root";
$password = "";

// Creating a database connection
$con = mysqli_connect($server, $username, $password);

// Checking for connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Creating a new database
$sql = "CREATE DATABASE library";

if (mysqli_query($con, $sql)) {
    echo "Database created successfully!";
} else {
    echo "Error creating database: " . mysqli_error($con);
}
// Closing the connection
mysqli_close($con);
?>


