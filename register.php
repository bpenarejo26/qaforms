

<html>
<body>
<form name = "registration" method = "POST" />
Input Full Name : <input type = "text" name = "FullName" /> <td> <input type = "submit" name = "register" value = "+"/> </td>
<br>(First Name and Last Name)
</form>
</body>
</html>



<?php 

$id = $_GET['id'];
//echo $id;
include("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
	

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['register'])) {
	$FullName = $_POST['FullName'];
$sql = "INSERT INTO `employee` (`EmpID`, `Username`, `Password`, `Level`, `FullName`, `Position`, `PosCode`) VALUES (NULL, 'default', 'password', '3', '$FullName', 'Default', '$id')";
if ($connect->query($sql) === TRUE) {
    echo "New record created successfully";
	header("Location:http://10.16.1.102:8085/qaforms/qa.php");
} else {
    //echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();

}
?>
