<?php
include("connection.php");
ob_start();
session_start();
$id = $_GET['id'];
$auto = $_GET['x'];
//echo $auto;
if($id == NULL || $auto == NULL) { header("Location:login.php"); }
if($_SERVER["REQUEST_METHOD"] == "POST")	
	
$connect = mysqli_connect("localhost", "root", "Fic5#w0F", "branders");  
 function fill_Manager($connect)  
 {  
      $output = '';  
      $sql = "select Manager from employee group by Manager order by Manager ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row[Manager].'">'.$row[Manager].'</option>';  
      }  
      return $output;  
 }  
 function fill_Artist($connect)  
 {  
      $output = '';  
      $sql = "SELECT Fullname from employee where PosCode = '4' and Manager != NULL order by Fullname ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           //$output .= '<div class="col-md-3">';  
           //$output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["Fullname"].'';  
           //$output .=     '</div>';  
           //$output .=     '</div>';  
		   $output .= '<option value="'.$row[0].'">'.$row[0].'</option>';
      }  
      return $output;  
 }
 
 if(isset($_POST['out'])){
	$EasternTimeStamp =mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));
	$udate = date('Y-m-d H:i:s',$EasternTimeStamp );
	$update = "update logbook set `Time-out` = '$udate' where Ref like '%$auto%' ";
	$result = mysqli_query($connect, $update);
	session_destroy();	
	header("Location:login.php");
	}


if (isset($_POST['search']) && $_POST['show_artist'] == 28) {
	$manager = $_POST['manager'];
	$to = $_POST['to'];
	$from = $_POST['from'];
	
	header("Location:http:report.php?from=".$from."&to=".$to."&manager=".$manager);
}
	if (isset($_POST['search']) && ($_POST['manager'] != 28) && $_POST['show_artist'] != 28){
		
	 
	$artist = $_POST['show_artist'];
	$to = $_POST['to'];
	$from = $_POST['from'];
	
	$show_artist = $_POST['show_artist'];
	
	header("Location:http:report_all.php?from=".$from."&to=".$to."&artist=".$artist);
}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>

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
<meta charset="utf-8">
<title>BEL USA - Manila QA Form</title>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<form name ="date-picker" method="POST" action = "">


<body>
<table width="50%" border="0">
<ul>
        <li><a href="qa.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=1>Home</a></li>
       
        <li>
            <a href="#"tabindex=-1>Report &#9662;</a>
            <ul class="dropdown">
				<li><a href="dater_all.php?id=<?php echo $id;?>&x=<?php echo $auto;?>">Date</a></li>
                
                
            </ul>
			 <li><a href="newpw.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=-1>Change password</a></li>
			 <li><p align="right"><input type = "submit" name = "out" value = "Log-out" tabindex=-1/> </p></li>
			</ul>
  <tbody>
    <tr>
      <th height="100" colspan="4" scope="col"><img  class = "center fit" src="1-01.jpg" > </th>
    </tr>
	<tr><th width="30%" scope="row"><div class="container"> Team </th><td><select name="manager" id="manager"> 
                          <option value="28">---Select Team---</option>  
                          <?php echo fill_Manager($connect); ?>  
                     </select>  
                     </td> 
					 </tr>
					 <tr>
					 
					 <th width="30%" scope="row">Artist</th>
					 <p id="demo"></p>
                     <td >
					 <div class="row" id="show_artist" name = "show_artist" > </td>  			 
					   <?php echo fill_Artist($connect); ?>

                     </div> 
					 
                  
           </div>  
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
      <td><input type = "submit" name ="search" value = "Generate"  onclick="myFunction()"/></td>
    </tr>
	<tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-02.jpg" > </th>
    </tr>
  </tbody>

</table>

<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/


 $(document).ready(function(){  
      $('#manager').change(function(){  
           var manager_id = $(this).val();  
           $.ajax({  
                url:"test2.php",  
                method:"POST",  
                data:{manager_id:manager_id},
				dataType:"text",
                success:function(data){  
                     $('#show_artist').html(data);  
                }  
           });  
      });  
 });  
 
  
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
