<?php
include("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
$id = $_GET['id'];
$auto = $_GET['auto'];	
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
//$id = $_GET['id'];
 $artist = $_GET['artist'];
 $from = $_GET['from'];
 $to = $_GET['to'];
 $d1= $from;
 $d2= $to;
 //echo $artist;
// $sart = $_POST['sart'];
 //echo $sart;
/*$sql = "SELECT fullname as name from qualitycheck inner join employee on employee.EmpID = qualitycheck.Manager";
$result = mysqli_query($connect, $sql);
$sql = "SELECT poscode FROM employee where EmpID = '$id';";
$result5 = mysqli_query($connect, $sql);
$row5 = mysqli_fetch_array ($result5);
 //echo $row2['name'];
*/
$sql = "SELECT `TransNo`, `Order_Number`, `Imprint_Method`, `Associate`, `Checker`, `Date`, `Accuracy`, `R1`,`I1`, `I2`, `I3`, `I4`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `F1`, `F2`, `F3`, `F4`, `F5`, `F6`, `F7`, `F8`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `U1`, `U2`, `U3`, `U4`, `U5`, `PO1`, `PO2`, `Notes` FROM `qc` WHERE Date BETWEEN '$d1' and '$d2' and Assoc = '$artist' ";
$result2 = mysqli_query ($connect, $sql);
$row = mysqli_fetch_array ($result2);
//echo $row['ORNo'];
//echo $row['Fullname'];
$count = mysqli_num_rows($result2); 
echo "Total". " ".$count;?>
<?php echo "" ;?>
<a href="sample1.php?d1=<?php echo $d1;?>&d2=<?php echo $d2;?>&artist=<?php echo $artist;?>">Convert to CSV file</a>

<html>
<head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<ul>
        <li><a href="qc.php?id=<?php echo $_GET['id'];?>&x=<?php echo $auto;?>"tabindex=1>Home</a></li>
       <li> <a href="dater_all.php?id=<?php echo $_GET['id'];?>&x=<?php echo $auto;?>"tabindex=-1>Report </a></li>
			 <li><a href="newpw.php?id=<?php echo $_GET['id'];?>&x=<?php echo $auto;?>"tabindex=-1>Change password</a></li>
			 <li><p align="right"><input type = "submit" name = "out" value = "Log-out" tabindex=-1/> </p></li>
			</ul>

<form name ="convert" method = "POST" />
</head>
<style type="text/css">
body {
	background: #fafafa url(http://jackrugile.com/images/misc/noise-diagonal.png);
	color: #444;
	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
	text-shadow: 0 1px 0 #fff;
}

strong {
	font-weight: bold; 
}

em {
	font-style: italic; 
}

table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
}	

th {
	background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#0dac85, #0dac85);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
	background: url(http://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(http://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
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
<body>

<table>
<tr>
<th scope="row"><b>ORNo</th>
      <th> <b> Associate</th>
      <th> <b> Quality Checker</th>
	  <th> <b> Evaluation Date</th>
	  <th> <b>Accuracy</th>
	  <th> <b> REMARKS</th>
     
	  </tr>
	  <?php  do { ;?>
<tr>	
 <td align="Left"><?php echo $row['ORNo']; ?></td>
  <td align="Left"><?php echo $row['Assoc']; ?></td>
   <td align="Left"><?php echo $row['Checker']; ?></td>
    <td align="Left"><?php echo $row['Date']; ?></td>
	 <td align="Left"><?php echo $row['Accuracy']; ?></td>
    <td align="Left"><?php echo $row['Notes'];  ?></td>
	
	
	</tr>
<tr>	
<?php } while($row = mysqli_fetch_array ($result2)) ; 
 ?> </tr>
 </table>

</form>
</body>
</html>
