<?php
include("connection.php");
ob_start();
session_start();
$id = $_GET['id'];
$auto = $_GET['x'];
//echo $auto;
if($id == NULL || $auto == NULL) { header("Location:login.php"); }
if($_SERVER["REQUEST_METHOD"] == "POST")	
	
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT DMName from employee where PosCode = '4'order by DMName ASC" ;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$sql2 = "select Manager from employee group by Manager order by Manager ASC";
$result2 = mysqli_query($connect, $sql2);
$row2 = mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<a align= "center" href="qa.php?id=<?php echo $_GET['id'] ;?>&x=<?php echo $_GET['x'];?>">Back to QC Form</a>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

	background-color: red !important;
.custom-date-style {
}

.input{	
}
.input-wide{
	width: 500px;
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
<meta charset="utf-8">
<title>BEL USA - Manila QA Form</title>
</head>
<form name ="date-picker" method="POST" action = "report.php">


<body>
<table width="50%" border="0">
  <tbody>
    <tr>
      <th height="100" colspan="4" scope="col"><img  class = "center fit" src="1-01.jpg" > </th>
    </tr>
    <tr>
      <th scope="row">Select Team:</th>
	  <td><?php echo "<select name=sart value='sart'tabindex=2>";
	   if(isset($_POST['submit']) && (!empty($_POST['sart']))) { echo "<option value='".$_POST['sart']."'>".$_POST['sart']."</option>";}
			if (mysqli_num_rows($result2) > 0) {
		
				while($row2 = mysqli_fetch_assoc($result2)) {
					echo "<option value='".$row2[Manager]."'>$row2[Manager]</option>"; 
														  }
											  } 
		    else {
					echo "0 results";
				 }
					echo "</select>"; ?></td>
			
    </tr>
	<tr>
      <th width="30%" scope="row">Date From:</th>
      <td><input type="text" value="" id="datetimepicker" name ="from"/></td>
    </tr>
	<tr>
      <th width="30%" scope="row">Date To:</th>
      <td><input type="text" value="" id="datetimepicker2" name ="to"/></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th> 
      <td><input type = "submit" name ="search" value = "Generate"/></td>
    </tr>
	<tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-02.jpg" > </th>
    </tr>
  </tbody>



</tbody>
</table>
<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2016/01/01'
});
$('#datetimepicker').datetimepicker({value:'',step:10});
$('.some_class').datetimepicker();
$('#datetimepicker2').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2016/12/31'
});
$('#datetimepicker2').datetimepicker({value:'',step:10});
$('.some_class').datetimepicker();
</script>
</form>
</html>
