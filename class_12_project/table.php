<?php
// Setting connection variables
$server = "localhost";
$username = "root";
$password = "";
$database = "library"; 

// database connection
$con = mysqli_connect($server, $username, $password, $database);

// Checking for connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Creating a table
$tableName = "list"; 
$sql = "CREATE TABLE $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    address VARCHAR(50),
    ph VARCHAR(10),
    book VARCHAR(50),
    author VARCHAR(50),
    taken_date VARCHAR(50),
    return_date VARCHAR(50)
)";

if (mysqli_query($con, $sql)) {
    echo "Table $tableName created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($con);
}
// Closing the connection
mysqli_close($con);
?>

