<?php
require("./cont/head.php");
// Seting connection variables
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

?>
<div class="box">
<h1>Book Borrowed History</h1>
<table border='1'>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Book</th>
            <th>Author</th>
            <th>Taken Date</th>
            <th>Action</th>
            <th> </th>
        </tr>
<?php
$i=1;
// Retrieving data from the database
$sql = "SELECT * FROM `list`";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error retrieving data: " . mysqli_error($con));
}
while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
            <td><?php echo $i?></td>
            <td><?php echo "{$row['name']}";?></td>
            <td><?php echo "{$row['address']}";?></td>
            <td><?php echo "{$row['ph']}";?></td>
            <td><?php echo "{$row['book']}";?></td>
            <td><?php echo "{$row['author']}";?></td>
            <td><?php echo "{$row['taken_date']}";?></td>
            <td><a href="udp.php?id=<?=$row['id'] ?>">EDIT</a></td>
            <td><a href="del.php?id=<?=$row['id'] ?>">DELETE</a></td>
          </tr>

<?php
$i++;
}
// Closing the connection
mysqli_close($con);
?>
</table>
<a href="add.php"> <input type="submit" value="Add New Data"></a>
</div>
<style>
    .box
{
    background-color:#a98ee6;
	position: relative;
	width: 150vh;
	height: 100%;
	border-radius: 8px;
	overflow: hidden;
}
.box h1{
    text-align: center;
	color: #ffffff;
	font-size: 2.8em;
    padding: 10px;
}
.box table{
    padding :  10px;
    margin: 3vh;
    border-collapse: collapse;

}
table th , table td{
    padding: 15px;
    border: 2px solid black;
}

.box input[type=submit]
{
	width: 96%;
	padding: 10px;
    background-color: aquamarine;
	color: #000000;
	font-size: 1.4em;
    position: relative;
	margin: 20px;
    border-radius: 8px;
	letter-spacing: 0.05em;
}


</style>