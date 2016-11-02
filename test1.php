
<HTML>
<body>
<form name = "POST" method = "POST"/>
<input type = "submit" name = "test" value = "submit" />
</form>
</body>
</html>
<?php
include("connection.php"); {
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
	
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT fullname as name1 FROM employee ";
$result = mysqli_query($connect, $sql);
$sql2 = "SELECT fullname as name2 FROM employee where poscode = '3'";
$result2 = mysqli_query($connect, $sql2);
$row2 = mysqli_fetch_array($result2);
$sql3 = "SELECT Name from brand";
$result3 = mysqli_query($connect, $sql3);
$row3 = mysqli_fetch_array($result3);
$sql4 = "SELECT fullname as name3 FROM employee where poscode = '4'";
$result4 = mysqli_query($connect, $sql4);
$row4 = mysqli_fetch_array($result4);	

if(isset($_POST['test'])) {
if (mysqli_num_rows($result) > 0 ) {
			
			while($row = mysqli_fetch_assoc($result)) {
			echo $row['name1']."-"; 
			
														}
											}
}
}
?>
