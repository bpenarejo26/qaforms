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
<?php $id = $_GET['id']; //echo $id;?>
<body>
<table width="30%" border="0">
  <tbody>
    <tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-01.jpg" > </th>
    </tr>
    <tr>
      <th width="30%" scope="row">Old password:</th>
      <td width="70%"><input type = "text" name = "old" /> </td>
    </tr>
    <tr>
      <th scope="row">New password:</th>
      <td><input type = "password" name = "pass1" /></td>
    </tr>
	<tr>
      <th scope="row">Re-type new password:</th>
      <td><input type = "password" name = "pass2" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th> 
      <td><input type = "submit" name ="edit" value = "Change"/></td>
    </tr>
	<tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-02.jpg" > </th>
    </tr>
  </tbody>
  <a align= "center" href="http://10.16.7.123:8888/branders/login.php">Back to home page</a>
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

if(isset($_POST['edit'])) {
$old = $_POST['old'];
//echo $old;
$select = "select password from employee where empid = '$id' and password ='$old'";
$result0 = mysqli_query ($connect, $select);
$row = mysqli_fetch_array ($result0);
//echo mysqli_num_rows($result0);

if ((mysqli_num_rows($result0) > 0) && (!empty($_POST['pass1']) && ($_POST['pass1'] == $_POST['pass2']))) {	
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$update = "UPDATE employee SET Password='$pass1' WHERE EmpID = '$id'";
$result = mysqli_query($connect, $update) ;
echo "You account has been updated! click back home to continue";
}
else
{ echo "password not match!";
}
}
?>
