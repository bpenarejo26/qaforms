<!doctype html>
<html>
<head>
<style>
       
.fit {
  max-width: 100%;
  max-height: 100%;
}
.center {
  display: block;
  margin-top: 0.01em;
}
table {
	font-size: 14px;
	line-height: 24px;
	margin: 0.01em auto;
	text-align: left;
}

</style>
<form name ="admin" method="POST"/>
<meta charset="utf-8">
<title>BEL USA - Manila QA Form</title>
</head>

<body>
<table width="30%" border="0">
  <tbody>
    <tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-01.jpg" > </th>
    </tr>
    <tr>
      <th width="30%" scope="row">Username</th>
      <td width="70%"><input type = "text" name = "user" /> </td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td><input type = "password" name = "pass" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th> 
      <td><input type = "submit" name ="search" value = "Log-In"/></td>
    </tr>
	<tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-02.jpg" > </th>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>

<?php 
include("connection.php");
ob_start();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
	
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['search'])) {
$user  = $_POST['user'];
$pass = $_POST['pass'];

$sql = "select EmpID, Fullname, Disable, Manager, Level from employee where Username = '$user' and Password = '$pass'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$countrow = mysqli_num_rows($result);
//echo $countrow;
if($countrow <= 0) {
echo "Please check username and password!";
}
else {
	if(($row['Level'] == 1) && ($row['Disable'] == TRUE)){
	echo $row['Disable']; 
	$id = $row['EmpID']; $y = $row['Manager'];
	header("Location:http://10.16.1.102:8082/qaforms/admin.php?id=".$id);						
							}
							else

							{
								if($row['Disable'] == TRUE) {
								$id = $row['EmpID'];  $id2 = $row['Manager']; header("Location:http://10.16.1.102:8085/qaforms/qa.php?id=".$id);
								}
							}
}
if($row['Disable'] == "0") {echo "Your account is not active. Please contact your IT administrator";}
}
?>
