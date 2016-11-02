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
$id = $_GET['id'];
//echo $id;
$sql = "SELECT distinct fullname as name1 FROM employee where poscode = '2'";
$result = mysqli_query($connect, $sql);


?>
<style>
.input {
text-align: right;
}
       
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin-Panel</title>
</head>
<form name = "new" method = "POST" />
<body>
<table width="34%" border="0">
  <tbody>
    <tr>
      <th colspan="2" scope="col"> <height="100" colspan="2" scope="col"><img  class = "center fit" src="1-01.jpg" </th>
    </tr>
    <tr>
      <th width="27%" scope="row" align="left"> Username</th>
      <td width="73%"><input type = "text" name = "uname" align="left"/></td>
    </tr>
    <tr>
      <th scope="row" align="left">Password</th>
      <td><input type = "text" name = "pass" /></td>
    </tr>
    <tr>
      <th scope="row" align="left">Full Name</th>
      <td><input type = "text" name = "fname" /></td>
    </tr>
    <tr>
      <th scope="row" align="left">Position</th>
      <td><select name = "pos">
	  <option value = "0">  </option>
	  <option value = "Art"> Artist </option>
	  <option value = "SA"> Sales  </option>
	  <option value = "QA"> Quality Assurance </option>
	  <option value = "IT"> IT </option>
	  <option value = "MAN"> Manager </option>
	  </td>
    </tr>
    <tr>
      <th scope="row" align="left">Manager</th>
      <td><?php 
		echo "<select name=tm value='TM'tabindex=5 style='float:left' />";

		//echo "<option value=$row[id]>$row[name]</option>";
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<option value='".$row[name1]."'>$row[name1]</option>"; 
														  }
											  } 
		    else {
					echo "0 results";
				 }
					echo "</select>"; 


		?></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type = "submit" name = "create" value = "register"/></td>
    </tr>
    <tr>
      <th colspan="2" scope="col"> <height="100" colspan="2" scope="col"><img  class = "center fit" src="1-02.jpg" </th>
    </tr>
    <tr>
      <th colspan="2" scope="row"></th>
    </tr>
  <a align= "center" href="http://10.16.1.102:8085/qaforms/login.php">Back to home page</a></td>
<?php 

if(isset($_POST['create'])) {
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$fname = $_POST['fname'];
	$pos = $_POST['pos']; 
	$tm = $_POST['tm'];
	if (empty($_POST['uname']) || (empty($_POST['pass'])) || (empty($_POST['fname'])) || (empty($_POST['pos'])) || (empty($_POST['tm'])))
	{
		echo "<script type='text/javascript'>alert('Please complete all required field!')</script>";
	}	
		else 
		{
			if($_POST['pos'] == "IT") { $lvl = 1; } else { $lvl = 3;}
			if($_POST['pos'] == "QA") { $posc = 3;}
			if(($_POST['pos'] == "SA") || ($_POST['pos'] == "Art")) { $posc = 4;}
			if($_POST['pos'] == "MAN") { $posc = 2;}
			if($_POST['pos'] == "IT") { $posc = 0;}
			$insert_q = "INSERT INTO `employee` (`EmpID`, `Username`, `Password`, `Level`, `FullName`, `Position`, `PosCode`, `Manager`, `Disable`) VALUES (NULL, '$uname', '$pass', '$lvl', '$fname', '$pos', '$posc', '$tm', 1)";
			$result = mysqli_query($connect, $insert_q);
			echo "<script type='text/javascript'>alert('".$fname." Sucessfully saved!')</script>";
			
		}
	
	
}
?>
</form>
</table>
</body>
</html>
