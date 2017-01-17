<?php
include("connection.php");
include("function.php");
ob_start();
session_start();
$inactive = 3600;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 
//echo time();
$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
	
{  session_destroy(); header("Location:login.php?timeout="."Your_idle_for_almost_1_hour");  }

$_SESSION['timeout']=time();

if($_SERVER["REQUEST_METHOD"] == "POST")	
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
//select username from DM admin panel
$query_assoc = "SELECT DMName from employee where PosCode = '4'";
$result_assoc = mysqli_query($connect, $query_assoc);
$row_assoc = mysqli_fetch_array($result_assoc);	

//select imprint method 1/14/17
$query_method = "SELECT * FROM imprintmethod";
$result_method = mysqli_query($connect, $query_method);
$row_method = mysqli_fetch_array($result_method);
?>



<!doctype html>
<html>
<style>

html {
    display: table;
    margin-top: 0.01em;
	margin-right:10%;
	margin-left:10%;
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
<head>
<meta charset="utf-8">
<title>Belmanila QC Form</title>
<form name ="survey" method = "POST" action = "#" >
<ul>
        <li><a href="#"tabindex=-1>Home</a></li>
       
        
           <li> <a href="dater_all.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=-1>Report </a></li>
            
			 <li><a href="newpw.php?id=<?php echo $id;?>&x=<?php echo $auto;?>"tabindex=-1>Change password</a></li>
			 <li><p align="right"><input type = "submit" name = "out" value = "Log-out" tabindex=-1/> </p></li>
			</ul>
			
<table>
</tbody>
 <tr>
      <td><strong>Order #:</strong></td>
      <td ><input type="text" name="Order" value = "<?php if(isset($_POST['submit']) && (!empty($_POST['Order']))){ echo $_POST['Order'];}?>"/></td>
      <td>&nbsp;</td>
      <td><strong>Imprint Method:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php echo "<select name = 'Method' >";
	  if (mysqli_num_rows($result_method) > 0) {
			while($row_method = mysqli_fetch_assoc($result_method)) {
			echo "<option value='".$row_method[Method]."'>$row_method[Method]</option>"; 
														  }
											  } 
		    else {
			echo "0 results";}
			?>
      <td >&nbsp;</td>
      <td ><?php $EasternTimeStamp =mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));
	$udate = date('Y-m-d H:i:s',$EasternTimeStamp ); echo $udate;?></td>
   
	</tr>
    <tr>
      <td><strong>Associate:</strong></td>
      <td colspan="2"><?php echo "<select name = 'Assoc' >";
	  if (mysqli_num_rows($result_assoc) > 0) {
			while($row_assoc = mysqli_fetch_assoc($result_assoc)) {
			echo "<option value='".$row_assoc[DMName]."'>$row_assoc[DMName]</option>"; 
														  }
											  } 
		    else {
			echo "0 results";}
			?>
			
	  </td>
    
      <td><strong>Quality Checker :&nbsp; &nbsp;
        <input type="text" name="Checker"/> </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	</tbody>
	</table>
</head>

<body>
<table width="100%" border="0">
   <tbody>
    <tr>
		<td colspan="7"align="left" bgcolor="#1375bc"><font color="white"><strong>ROTATION</strong></font></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="4%" align="left" bgcolor="#C9E2F6" ><strong>1.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>ROTATION</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="8%">1.1</td>
      <td colspan="2">Back Office</td>
      <td width="8%"><select name="BO">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td width="14%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1.2</td>
      <td colspan="2">Production Manager Verification</td>
      <td><select name="PMV">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1.3</td>
      <td colspan="2">Order Modification Required</td>
      <td><select name="OMR">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1.4</td>
      <td colspan="2">Art Issues</td>
      <td><select name="AI">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1.5</td>
      <td colspan="2">Sales Issues</td>
      <td><select name="SI">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1.6</td>
      <td colspan="2">Greek Letters</td>
      <td><select name="GL">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1.7</td>
      <td colspan="2">No Artwork</td>
      <td><select name="NA">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7"align="left" bgcolor="#1375bc"><font color="white"><strong>ARTWORK</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6"><strong>2.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>INSTRUCTIONS NOT FOLLOWED</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>2.1</td>
      <td colspan="2">Original Artwork</td>
      <td><select name="OA">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>2.2</td>
      <td colspan="2">View Lab/Layout</td>
      <td><select name="VLL">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>2.3</td>
      <td colspan="2">Notes / Special Comments</td>
      <td><select name="NSC">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>2.4</td>
      <td colspan="2">Imprint Method</td>
      <td><select name="IM">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6" ><strong>3.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>ADJUSTED ARTWORK</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.1</td>
      <td colspan="2">Complete Artwork Details</td>
      <td><select name="CAD">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.2</td>
      <td colspan="2">Spelling</td>
      <td><select name="S">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.3</td>
      <td colspan="2">Font/Similar Font</td>
      <td><select name="FSF">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.4</td>
      <td colspan="2">Imprint Color/s</td>
      <td><select name="IC">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.5</td>
      <td colspan="2">Artwork Size</td>
      <td><select name="AS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.6</td>
      <td colspan="2">Artwork Resolution/Vector</td>
      <td><select name="ARV">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.7</td>
      <td colspan="2">Minimun Text Size</td>
      <td><select name="MTS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.8</td>
      <td colspan="2">Negative/Positive Strokes</td>
      <td><select name="NPS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>3.9</td>
      <td colspan="2">Symbols: Registration Marks, Copyright, Trademark, Servicemark</td>
      <td><select name="SRCTS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7"align="left" bgcolor="#1375bc"><font color="white"><strong>FILM &amp; PROOF</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6"><strong>4.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>FILM SET-UP</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.1</td>
      <td colspan="2">Thin Lines w/ Black Strokes</td>
      <td><select name="TLBS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.2</td>
      <td colspan="2">Thick Lines w/ White Stroke</td>
      <td><select name="TLWS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.3</td>
      <td colspan="2">Artwork Color</td>
      <td><select name="AC">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.4</td>
      <td colspan="2">Artwork centered on template</td>
      <td><select name="ACT">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><p>4.5</p></td>
      <td colspan="2">Artboard Size</td>
      <td><select name="ASS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.6</td>
      <td colspan="2">Registration Marks</td>
      <td><select name="RM">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.7</td>
      <td colspan="2">Job Details/Artcopy</td>
      <td><select name="JDA">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>4.8</td>
      <td colspan="2">Correct Template</td>
      <td><select name="CT">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6"><strong>5.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>PROOF SET-UP</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.1</td>
      <td colspan="2">Item Number/Color</td>
      <td><select name="INC">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.2</td>
      <td colspan="2"><p>Imprint Location</p></td>
      <td><select name="IL">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.3</td>
      <td colspan="2">Logo Scaling</td>
      <td><select name="LS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.4</td>
      <td colspan="2">Customer Notes</td>
      <td><select name="CN">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.5</td>
      <td colspan="2">Mock-up Boxes</td>
      <td><select name="MUB">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.6</td>
      <td colspan="2">Art Boxes</td>
      <td><select name="AB">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>5.7</td>
      <td colspan="2">Imprint Size</td>
      <td><select name="IS">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7"align="left" bgcolor="#1375bc"><font color="white"><strong>PROCESS</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6"><strong>6.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>UPLOADS</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>6.1</td>
      <td colspan="2">Wrong Proof/Film Uploaded</td>
      <td><select name="WPU">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>6.2</td>
      <td colspan="2">Unnecessary/Double Upload</td>
      <td><select name="UDU">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>6.3</td>
      <td colspan="2">Missing Proof/Film</td>
      <td><select name="MPF">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>6.4</td>
      <td colspan="2">Missing Underlay</td>
      <td><select name="MU">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>6.5</td>
      <td colspan="2">Missing .svg file</td>
      <td><select name="MSF">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6"><strong>7.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>PROCEDURE</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>7.1</td>
      <td colspan="2">Order rotated to correct bin</td>
      <td><select name="ORTCB">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>7.2</td>
      <td colspan="2">Print method updated after imprint color change</td>
      <td><select name="PMU">
   		<option value="Y"></option>
		<option value="N">N</option>
	</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#C9E2F6"><strong>8.0</strong></td>
      <td colspan="5" align="left" bgcolor="#C9E2F6"><strong>NOTES</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="4" rowspan="3"><textarea rows="7" cols="100" name = "Notes"></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type = "submit" name="submit" value = "Save"/></td>
    </tr>
  </tbody>
</table>

</body>
</form>
</html>
<?php
if(isset($_POST['submit'])) {
$OR = $_POST['Order'];
$AS = $_POST['Assoc'];
$IM = $_POST['Method'];
$QC = $_POST['Checker'];	
	//Rotation
$r1 = $_POST['BO'];
$r2 = $_POST['PMV'];
$r3 = $_POST['OMR'];
$r4 = $_POST['AS'];
$r5 = $_POST['SI'];
$r6 = $_POST['GL'];
$r7 = $_POST['NA'];
	//Artwork
$i1 = $_POST['OA'];
$i2 = $_POST['VLL'];
$i3 = $_POST['NSC'];
$i4 = $_POST['IM'];
	//3.0
$a1 = $_POST['CAD'];
$a2 = $_POST['S'];
$a3 = $_POST['FSF'];
$a4 = $_POST['IC'];
$a5 = $_POST['AS'];
$a6 = $_POST['ARV'];
$a7 = $_POST['MTS'];
$a8 = $_POST['NPS'];
$a9 = $_POST['SRCTS'];
	//Film set-up
$f1 = $_POST['TLBS'];
$f2 = $_POST['TLWS'];
$f3 = $_POST['AC'];
$f4 = $_POST['ACT'];
$f5 = $_POST['ASS'];
$f6 = $_POST['RM'];
$f7 = $_POST['JDA'];
$f8 = $_POST['CT'];
	//5.0
$p1 = $_POST['INC'];
$p2 = $_POST['IL'];
$p3 = $_POST['LS'];
$p4 = $_POST['CN'];
$p5 = $_POST['MUB'];
$p6 = $_POST['AB'];
$p7 = $_POST['IS'];
	//Process
$u1 = $_POST['WPU'];
$u2 = $_POST['UDU'];
$u3 = $_POST['MPF'];
$u4 = $_POST['MU'];
$u5 = $_POST['MSF'];
	//Procedure
$po1 = $_POST['ORTCB'];
$po2 = $_POST['PMU'];
$notes = $_POST['Notes'];
if(!empty($_POST['Order'])) {
if(($r1 == "Y") && ($r2 == "Y")&& ($r3 == "Y") && ($r4 == "Y")&& ($r5 == "Y")&& ($r6 == "Y")&& ($r7 == "Y")
&& ($i1 == "Y")&& ($i2 == "Y")&& ($i3 == "Y")&& ($i4 == "Y")
&& ($a1 == "Y")&& ($a2 == "Y")&& ($a3 == "Y")&& ($a4 == "Y")&& ($a5 == "Y")&& ($a6 == "Y")&& ($a7 == "Y")&& ($a8 == "Y")&& ($a9 == "Y")
&& ($f1 == "Y")&& ($f2 == "Y")&& ($f3 == "Y")&& ($f4 == "Y")&& ($f5 == "Y")&& ($f6 == "Y")&& ($f7 == "Y")&& ($f8 == "Y")
&& ($p1 == "Y")&& ($p2 == "Y")&& ($p3 == "Y")&& ($p4 == "Y")&& ($p5 == "Y")&& ($p6 == "Y")&& ($p7 == "Y")
&& ($u1 == "Y")&& ($u2 == "Y")&& ($u3 == "Y")&& ($u4 == "Y")&& ($u5 == "Y")
&& ($po1 == "Y")&& ($po2 == "Y"))
	{

$Acc = "YES";
}
else 
{
	$Acc = "NO";
}
$insert = "INSERT INTO  qc VALUES(NULL, '$OR', '$AS', '$IM', '$QC', '$udate', '$Acc', '$r1', '$r2', '$r3', '$r4', '$r5', '$r6', '$r7', '$i1', '$i2', '$i3', '$i4', '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$f1', '$f2', '$f3', '$f4', '$f5', '$f6', '$f7', '$f8', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$u1', '$u2', '$u3', '$u4', '$u5', '$po1', '$po2', '$notes')";
$insert_query = mysqli_query($connect, $insert);
echo("<meta http-equiv='refresh' content='1'>"); 
echo "<script type='text/javascript'>alert('".$OR." : Sucessfully saved!')</script>"; 

}
else { 
echo "<script type='text/javascript'>alert('Error : Please fill-up all required field!')</script>";

}
}

?>
