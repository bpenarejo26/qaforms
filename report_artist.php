<?php
include("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
	
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
//$id = $_GET['id'];
 $from = $_POST['from'];
 $to = $_POST['to'];
 $d1= $from.":00.000";
 $d2= $to.":59.997";
 $sart = $_POST['sart'];
 //echo $sart;
/*$sql = "SELECT fullname as name from qualitycheck inner join employee on employee.EmpID = qualitycheck.Manager";
$result = mysqli_query($connect, $sql);
$sql = "SELECT poscode FROM employee where EmpID = '$id';";
$result5 = mysqli_query($connect, $sql);
$row5 = mysqli_fetch_array ($result5);
 //echo $row2['name'];
*/
 $sql = "SELECT `TransNo`, `ORNo`, `Source`, `Brand`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`, `CustIns`, `OveRep`, `TexSiz`, `PosNeg`, `Size`, `Loca`, `Colo`, `ArtOrd`, `AdjArt`, `MocUp`, `ArtSiz`, `TemLay`, `OrdDet`, `ImpSiz`, `ArtBox`, `MocBox`, `UplFil`, `BacSli`, `Und`, `UplPro`, `AddNote`, `SVG`, `EDate`, `TransID`  FROM `qualitycheck`WHERE EvalDate BETWEEN '$d1' and '$d2' and Assoc = '$sart'";
$result2 = mysqli_query ($connect, $sql);
$row = mysqli_fetch_array ($result2);
//echo $row['ORNo'];
//echo $row['Fullname'];
$count = mysqli_num_rows($result2); 
echo "Total". " ".$count;?>


<html>
<head>
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
</style>
<body>

<table>
<tr>
<th scope="row"><b>ORNo</th>
      <th> <b> Associate</th>
      <th> <b> Quality Checker</th>
	  <th> <b> Evaluation Date</th>
	  <th> <b>Accuracy</th>
	  <th> <b> Customer Instruction</th>
	  <th> <b> ART Standard</th>
	  <th> <b> Mock Up</th>
	  <th> <b> FILM</th>
	  <th> <b> PROOF</th>
	  <th> <b> REMARKS</th>
     
	  </tr>
	  <?php  do { ;?>
<tr>	
 <td align="Left"><?php echo $row['ORNo']; ?></td>
  <td align="Left"><?php echo $row['Assoc']; ?></td>
   <td align="Left"><?php echo $row['Checker']; ?></td>
    <td align="Left"><?php echo $row['EvalDate']; ?></td>
	 <td align="Left"><?php echo $row['Accuracy']; ?></td>
	  <td align="Left"><?php echo $row['CustIns']; ?></td>
	   <td align="Left"><?php echo $row['OveRep']; ?></td>
	    <td align="Left"><?php echo $row['PosNeg']; ?></td>
  <td align="Left"><?php echo $row['Size'];  ?></td>
   <td align="Left"><?php echo $row['Loca'];  ?></td>
    <td align="Left"><?php echo $row['AddNote'];  ?></td>
	
	
	</tr>
<tr>	
<?php } while($row = mysqli_fetch_array ($result2)) ; 
 ?> </tr>
 </table>

</form>
</body>
</html>
