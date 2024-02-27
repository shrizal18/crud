<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library - Home</title>
	<style>
.box h1{
    text-align: center;
	color: #ffffff;
	font-size: 2.8em;
    padding: 10px;
	margin: 20px;
}
.box{
	position: relative;
	width: 100%;
	height: 675px;
	border-radius: 8px;
	overflow: hidden;
    max-width: 80%;
	
}

.form{
	margin: 30px;
	 position: absolute;
	 inset: 2px;
	 border-radius: 8px;
	 z-index: 10;
	 padding: 50px;
	 display: flex;
	 flex-direction: column;
}
input
{
	width: 98%;
	padding: 10px;
	color: #000000;
	font-size: 1em;
    position: relative;
	margin-top: 20px;
    border-radius: 8px;
	letter-spacing: 0.05em;
}
input[type=submit]{
	width: 100.1%;
}



</style>
</head>
<body>
<?php

require("./cont/head.php");
// Setting connection variables
$server = "localhost";
$username = "root";
$password = "";
$database = "library"; 

// Creating a database connection
$con = mysqli_connect($server, $username, $password, $database);

// Checking for connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
   
}

// Checking if form data is submitted

?>
  <div class="box">
        <h1>Update Your Information</h1>
        <div class="form">
    <form method="POST">
    <?php
    $id = $_GET['id'];
// Retrieving data from the database
$sql = "SELECT * FROM `list` WHERE id=$id";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error retrieving data: " . mysqli_error($con));
}
while ($row = mysqli_fetch_assoc($result)) {
?>
        <input type="text" name="name" id="name" value="<?php echo "{$row['name']}";?>" >
        <input type="hidden" name="id" value="<?php echo "{$row['id']}";?>">
        <input type="text" name="address" id="address" value="<?php echo "{$row['address']}";?>">
        <input type="text" name="ph" id="phNumber" value="<?php echo "{$row['ph']}";?>">
        <input type="text" name="book" id="book"" value="<?php echo "{$row['book']}";?>">
        <input type="text" name="author" id="author" value="<?php echo "{$row['author']}";?>">
        <input type="text" name="taken_date" id="taken_date"  value="<?php echo "{$row['taken_date']}";?>">
		<input type="submit" value="Update">
    </form>
    <?php
}
    if(isset($_POST['name'])) {
        // Collecting post variables
        $id = $_GET['id']; // assuming having an 'id' field in your form
        $name = $_POST['name'];
        $address = $_POST['address'];
        $ph = $_POST['ph'];
        $book = $_POST['book'];
        $author = $_POST['author'];
        $taken = $_POST['taken_date'];
    
        // Updating data in the database
        $sql = "UPDATE `list` SET 
                `name`='$name', 
                `address`='$address', 
                `ph`='$ph', 
                `book`='$book', 
                `author`='$author', 
                `taken_date`='$taken' 
                WHERE id=$id";
    
        if (mysqli_query($con, $sql)) {
           header('location:ret.php');
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
    
    // Closing the connection
    mysqli_close($con);
    ?>
</div>
</div>
</body>
</html>