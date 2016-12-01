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
ul{
        padding: 0;
        list-style: none;
        background: #1375bc;
    }
    ul li{
        display: inline-block;
        position: relative;
        line-height: 21px;
        text-align: left;
    }
    ul li a{
        display: block;
        padding: 8px 25px;
        color: #FFFFFF;
        text-decoration: none;
    }
    ul li a:hover{
        color: #fff;
        background: #939393;
    }
    ul li ul.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #1375bc;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown{
        display: block;	/* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }

</style>
<form name ="admin" method="POST"/>
<meta charset="utf-8">
<title>BEL USA - Manila QA Form</title>
</head>
<ul>
        <li><a href="qa.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=1>Home</a></li>
       
        <li> <a href="dater_all.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=-1>Report </a></li>
			 <li><a href="newpw.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=-1>Change password</a></li>
			 <li><p align="right"><input type = "submit" name = "out" value = "Log-out" tabindex=-1/> </p></li>
			</ul>
<?php $id = $_GET['id']; //echo $id;?>
<body>
<table width="30%" border="0">
  <tbody>
    <tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-01.jpg" > </th>
    </tr>
    <tr>
      <th width="30%" scope="row">Old password:</th>
      <td width="70%"><input type = "password" name = "old" /> </td>
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
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
//echo $old;
$select = "select password from employee where EmpID = '$id'";
$result0 = mysqli_query ($connect, $select);
$row = mysqli_fetch_array ($result0); 
if (((password_verify($old, $row['password']) == TRUE) && mysqli_num_rows($result0) > 0) && (!empty($_POST['pass1']) && ($_POST['pass1'] == $_POST['pass2']))) {	
$pass = password_hash($_POST['pass1'], PASSWORD_BCRYPT, array("cost" => 10));
$update = "UPDATE employee SET Password='$pass' WHERE EmpID = '$id'";
$result = mysqli_query($connect, $update);
//echo $pass;
echo "You account has been updated with new password! Please re log-in your account";
}
else
{ echo "password not match!";
}

}
if(isset($_POST['out'])){
	$EasternTimeStamp =mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));
	$udate = date('Y-m-d H:i:s',$EasternTimeStamp );
	$update = "update logbook set `Time-out` = '$udate' where Ref like '%$auto%' ";
	$result = mysqli_query($connect, $update);
	session_destroy();	
	header("Location:login.php");
	}
	
?>
