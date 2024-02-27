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
if(isset($_POST['name'])){
  // Setting connection variables
$server = "localhost";
$username = "root";
$password = "";
$database = "library"; 

// database connection
$con = mysqli_connect($server, $username, $password, $database);

// Checing for connection 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
    // Collecting post variables
    $name = $_POST['name'];
    $address = $_POST['address'];
    $ph = $_POST['ph'];
    $book = $_POST['book'];
    $author = $_POST['author'];
    $taken = $_POST['taken_date'];
    $sql =" INSERT INTO `library`.`list` ( `name`, `address`, `ph`, `book`, `author`, `taken_date`) VALUES ( '$name', '$address', '$ph', '$book', '$author', '$taken') ";
  
    if ($con->query($sql) === TRUE) {
        $lastInsertedId = mysqli_insert_id($con);
        header('location:ret.php');
     } else {
       // echo "Error inserting record: " . $con->error;
    }
    $con->close();    
}
?>
    <div class="box">
        <h1>Details for Borrowing Book</h1>
        <div class="form">
    <form method="POST">
        <input type="text" name="name" id="name" placeholder="Enter Your Name ">
        <input type="text" name="address" id="address" placeholder="Enter Your Address">
        <input type="text" name="ph" id="ph" placeholder="Enter Your Phone Number">
        <input type="text" name="book" id="book" placeholder="Enter Name of Book">
        <input type="text" name="author" id="author" placeholder="Enter Name of Author">
        <input type="text" name="taken_date" id="taken_date"  placeholder="Enter Taken Date ">
		<input type="submit" value="Submit">
    </form>
</div>
</div>
</body>
</html>