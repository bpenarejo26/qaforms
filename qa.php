<!doctype html>
<html>
<head>

<title>BEL USA - Manila QA Form</title>
<style>

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


.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}       
html, body {
    height: 100%;
}
html {
    display: table;
    margin-top: 0.01em;
	margin-right:10%;
	margin-left:10%;
}
p {
 
 font-size: 70%;
 font-family: Arial;
}
body {
    display: table-cell;
    vertical-align: middle;
	
} 
 {
  padding: 0;
  margin: 0;
}
.fit {
  max-width: 100%;
  max-height: 100%;
}
.center {
  display: block;
  margin-top: 0.01em;
}
</style>
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
$auto = $_GET['x'];
if($id == NULL) { header("Location:http:login.php"); }
$sql = "SELECT fullname as name1 FROM employee where poscode = '2'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$sql = "SELECT fullname as name2 FROM employee where poscode = '3'";
$result2 = mysqli_query($connect, $sql);
$sql = "SELECT Fullname, Manager from employee where EmpID = '$id';";
$result3 = mysqli_query($connect, $sql);
$row3 = mysqli_fetch_array($result3);
$sql = "SELECT fullname as name3, DMName FROM employee where poscode = '4' Order by fullname ASC";
$result4 = mysqli_query($connect, $sql);	
//echo $id;

if(isset($_POST['out'])){
	$EasternTimeStamp =mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));
	$udate = date('Y-m-d H:i:s',$EasternTimeStamp );
	$update = "update logbook set `Time-out` = '$udate' where Ref like '%$auto%' ";
	$result = mysqli_query($connect, $update);
	session_destroy();	
	header("Location:login.php");
	}
	
?>

<img  class = "center fit" src="1-01.jpg" > 
</head> 
<body>
<form name ="survey" method = "POST" action = "#" >
<ul>
        <li><a href="#"tabindex=-1>Home</a></li>
       
        <li>
            <a href="#"tabindex=-1>Report &#9662;</a>
            <ul class="dropdown">
				<li><a href="dater_all.php?id=<?php echo $id;?>&x=<?php echo $auto;?>">Date</a></li>
                
                
            </ul>
			 <li><a href="newpw.php?id=<?php echo $id;?>"tabindex=-1>Change password</a></li>
			 <li><p align="right"><input type = "submit" name = "out" value = "Log-out" tabindex=-1/> </p></li>
			</ul>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th width="15%" scope="col" align="left">Order Number</th>
      <th width="2%" scope="col"><input type = "text"  name = "OR" size="25" value = "<?php if((isset($_POST['submit'])) && (!empty($_POST['OR']))){ echo $_POST['OR'];}?>"tabindex=1></th>
      <th width="2%" scope="col">&nbsp;</th>
      <th width="15%" scope="col" align="left">Team Manager</th>
    
	  <td><input type = "text" style="border:none" name = "TM" value ="<?php echo $row3['Manager'];?>" readonly tabindex=-1/td>
    <td>Date/Time</td>
	  <?php $EasternTimeStamp =mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));$date = date('Y-m-d H:i:s',$EasternTimeStamp );?>
      <td><input type = "text" style="border:none" size = "32" name = "DE"  tabindex=-1 value = "<?php echo $date;?>" readonly  /></td>	
	</tr>
    <tr>
       <th scope="row" align="left" align="left">Associate</th>
      <td><?php echo "<select name=AS value='AS'tabindex=2>";
	   if(isset($_POST['submit']) && (!empty($_POST['AS']))) { echo "<option value='".$_POST['AS']."'>".$_POST['AS']."</option>";}
			if (mysqli_num_rows($result4) > 0) {
		
				while($row4 = mysqli_fetch_assoc($result4)) {
					echo "<option value='".$row4[name3]."'>$row4[DMName]</option>"; 
														  }
											  } 
		    else {
					echo "0 results";
				 }
					echo "</select>"; ?></td>
      <td><input type = "submit" name = "next3" value = "+" tabindex=-1 />
	  <?php if(isset($_POST['next3'] )) { $id = "4"; header("Location:register.php?id=".$id); } ?></td>
      <td><strong>Quality Checker</strong></td>
      <td><input type = "text" name = "QC" style="border:none" value ="<?php echo $row3['Fullname'];?>" readonly tabindex=-1/td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th colspan="5" scope="col"align="left" bgcolor="#1375bc"><font color="white"><strong>PROCESS ARTWORK</strong></th>
    </tr>
    <tr>
      <th colspan="5" scope="row" align="left" bgcolor="#1375bc"><font color="white"><strong>1.0 CUSTOMER INSTRUCTIONS</strong></th>
    </tr>
    <tr>
      <th width="5%" scope="row">&nbsp;</th>
      <td width="5%"><table width="100%" border="0">
        <tbody>
          <tr>
            <th width="4%" scope="row" align="left">
              <strong>1.1</strong></th>
          </tr>
        </tbody>
      </table></td>
      <td width="75%"><strong>The adjusted artwork reflects the instructions found on Job Details, Art Work, and Input Notes.</strong></td>
      <td width="4%">&nbsp;</td>
      <td width="11%"><select name="CI">
	  <?php if((isset($_POST['submit'])) && ($_POST['CI'] != 1)) { echo "<option value='".$_POST['CI']."'>".$_POST['CI']."</option>";}?>
		<option value="1"></option>
		<option value="Y">Y</option>
		<option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th colspan="5" scope="row" align="left" bgcolor="#1375bc"><font color="white"><strong>2.0 ART STANDARDS</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>2.1</strong></td>
      <td><strong>Overall Representation</strong></td>
      <td>&nbsp;</td>
      <td><select name="OV">
	  <?php if((isset($_POST['submit'])) && ($_POST['OV'] != 1)) { echo "<option value='".$_POST['OV']."'>".$_POST['OV']."</option>";}?>
			<option value="1"></option>
			<option value="Y">Y</option>
			<option value="N">N</option>
		</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The adjusted artwork does not have unnecessary revisions deviating from the original artwork.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>2.2</strong></td>
      <td><strong>Text Sizes</strong></td>
      <td>&nbsp;</td>
      <td><select name="TS">
	  <?php if((isset($_POST['submit'])) && ($_POST['TS'] != 1)) { echo "<option value='".$_POST['TS']."'>".$_POST['TS']."</option>";}?>
		<option value="1"></option>
		<option value="Y">Y</option>
		<option value="N">N</option>
		 
		</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>Text sizes are at least the minimum font size required for the imprint method or item category.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>2.3</strong></td>
      <td><strong>Positive and Negative Details</strong></td>
      <td>&nbsp;</td>
      <td><select name="PN">
	  <?php if((isset($_POST['submit'])) && ($_POST['PN'] != 1)) { echo "<option value='".$_POST['PN']."'>".$_POST['PN']."</option>";}?>
	<option value="1"></option>
	<option value="Y">Y</option>
	<option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>All positive details in the artwork are at least thick as 1 pt stroke; as all negative details are as thick as 2 pts stroke</strong>.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th colspan="5" scope="row" align="left" bgcolor="#1375bc"><font color="white"><strong>3.0 MOCK U</strong>P</th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>3.1</strong></td>
      <td><strong>The size of the artwork is proportional to the dimensions of the artwork.</strong></td>
      <td>&nbsp;</td>
      <td><select name="SI">
	  <?php if((isset($_POST['submit'])) && ($_POST['SI'] != 1)) { echo "<option value='".$_POST['SI']."'>".$_POST['SI']."</option>";}?>
	<option value="1"></option>
	<option value="Y">Y</option>
	<option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>3.2</strong></td>
      <td><strong>Location</strong></td>
      <td>&nbsp;</td>
      <td><select name="LO">
	  <?php if((isset($_POST['submit'])) && ($_POST['LO'] != 1)) { echo "<option value='".$_POST['LO']."'>".$_POST['LO']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The artwork is located on the items with reference to the sample images on the website.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>3.3</strong></td>
      <td><strong>Color</strong></td>
      <td>&nbsp;</td>
      <td><select name="CD">
	  <?php if((isset($_POST['submit'])) && ($_POST['CD'] != 1)) { echo "<option value='".$_POST['CD']."'>".$_POST['CD']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>Color/s are properly represented in accordance to client's choices</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th colspan="5" scope="row"align="left" bgcolor="#1375bc"><font color="white"><strong>4.0 </strong><strong>FILM</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>4.1</strong></td>
      <td><strong>Content</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-1-A Art Copy/Order Details</strong></td>
      <td>&nbsp;</td>
      <td><select name="AO">
	  <?php if((isset($_POST['submit'])) && ($_POST['AO'] != 1)) { echo "<option value='".$_POST['AO']."'>".$_POST['AO']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
  </select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-1-B Adjusted Artwork</strong></td>
      <td>&nbsp;</td>
      <td><select name="AA">
	  <?php if((isset($_POST['submit'])) && ($_POST['AA'] != 1)) { echo "<option value='".$_POST['AA']."'>".$_POST['AA']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-1-C Mock Up (optional)</strong></td>
      <td>&nbsp;</td>
      <td><select name="MU">
	  <?php if((isset($_POST['submit'])) && ($_POST['MU'] != 1)) { echo "<option value='".$_POST['MU']."'>".$_POST['MU']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>4.2</strong></td>
      <td><strong>Film Presentation</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-2-A </strong><strong>Artboard Size</strong></td>
      <td>&nbsp;</td>
      <td><select name="AR">
	  <?php if((isset($_POST['submit'])) && ($_POST['AR'] != 1)) { echo "<option value='".$_POST['AR']."'>".$_POST['AR']."</option>";}?>
  <<option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-2-B Template/Layout</strong></td>
      <td>&nbsp;</td>
      <td><select name="TL">
	  <?php if((isset($_POST['submit'])) && ($_POST['TL'] != 1)) { echo "<option value='".$_POST['TL']."'>".$_POST['TL']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
    <tr>
      <th colspan="5" scope="row" align = "left" bgcolor="#1375bc"><font color="white">5.0<strong> PROOF</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>5.1</strong></td>
      <td><strong>Order Details</strong></td>
      <td>&nbsp;</td>
      <td><select name="OD">
	  <?php if((isset($_POST['submit'])) && ($_POST['OD'] != 1)) { echo "<option value='".$_POST['OD']."'>".$_POST['OD']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>Order details correspond to the information found on the Admin website.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>5.2</strong></td>
      <td><strong>Imprint Size/s</strong></td>
      <td>&nbsp;</td>
      <td><select name="IS">
	  <?php if((isset($_POST['submit'])) && ($_POST['IS'] != 1)) { echo "<option value='".$_POST['IS']."'>".$_POST['IS']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The size of the artwork is smaller or equal to the imprint area of the item.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>5.3</strong></td>
      <td><strong>Art Boxes</strong></td>
      <td>&nbsp;</td>
      <td><select name="AB">
<?php if((isset($_POST['submit'])) && ($_POST['AB'] != 1)) { echo "<option value='".$_POST['AB']."'>".$_POST['AB']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The artboxes used correspond to the correct imprint locations.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>5.4</strong></td>
      <td><strong>Mock Up Boxes</strong></td>
      <td>&nbsp;</td>
      <td><select name="MB">
	  <?php if((isset($_POST['submit'])) && ($_POST['MB'] != 1)) { echo "<option value='".$_POST['MB']."'>".$_POST['MB']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
<tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The mock up boxes correspond to the artboxes used on the proof</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </tr>
    <tr>
      <th colspan="5" scope="row"bgcolor="#1375bc" align = "left"><font color="white">6.0 UPLOADS</th>
    </tr>
    <tr>
      <th height="25" scope="row">&nbsp;</th>
      <td><strong>6.1</strong></td>
      <td><strong>Uploaded Film</strong></td>
      <td>&nbsp;</td>
      <td>
	  <select name="UF">
	   <?php if((isset($_POST['submit'])) && ($_POST['UF'] != 1)) { echo "<option value='".$_POST['UF']."'>".$_POST['UF']."</option>";}?>
		<option value="1"></option>
		<option value="Y">Y</option>
		<option value="N">N</option>
		<option value="N/A">N/A</option>
		</select>
</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>6-1-A Back Side (if applicable)</strong></td>
      <td>&nbsp;</td>
      <td><select name="BS">
	   <?php if((isset($_POST['submit'])) && ($_POST['BS'] != 1)) { echo "<option value='".$_POST['BS']."'>".$_POST['BS']."</option>";}?>
  <option value="1"></option>
   <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>6-1-B Underlay (if applicable)</strong></td>
      <td>&nbsp;</td>
      <td><select name="UD">
	   <?php if((isset($_POST['submit'])) && ($_POST['UD'] != 1)) { echo "<option value='".$_POST['UD']."'>".$_POST['UD']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>6-1-C SVG File (if applicable)</strong></td>
      <td>&nbsp;</td>
      <td><select name="SV">
	   <?php if((isset($_POST['submit'])) && ($_POST['SV'] != 1)) { echo "<option value='".$_POST['SV']."'>".$_POST['SV']."</option>";}?>
	<option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong> 6.2 </strong></td>
      <td><strong>Uploaded Proof</strong></td>
      <td>&nbsp;</td>
      <td><select name="UP">
	   <?php if((isset($_POST['submit'])) && ($_POST['UP'] != 1)) { echo "<option value='".$_POST['UP']."'>".$_POST['UP']."</option>";}?>
  <option value="1"></option>
  <option value="Y">Y</option>
  <option value="N">N</option>
  <option value="N/A">N/A</option>
</select></td>
    </tr>
	<tr>
    <th colspan="5" scope="row" bgcolor="#1375bc" align = "left"><strong><font color="white">7.0 </strong><strong>ADDITIONAL NOTES</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><textarea rows="7" cols="100" name = "AD"><?php if(isset($_POST['submit']) && (!empty($_POST['AD'])))  { echo $_POST['AD'];}?> </textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><input type = "submit" name = "submit" value = "Save"  /></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<?php $id2 = $_GET['id'];?>

<p>

<img id="the_pic" class="center fit" src="1-02.jpg" > </p>

<?php 
if(isset($_POST['submit']))
	{
$EasternTimeStamp =mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));
$date = date('Y-m-d H:i:s',$EasternTimeStamp );
$OR = $_POST['OR'];
$AS = $_POST['AS'];
$TM = $_POST['TM'];
$QC = $_POST['QC'];
$DE = $date;
$CI = $_POST['CI']; // 1.1
$OV = $_POST['OV']; // 2.1
$TS = $_POST['TS']; // 2.2	
$PN = $_POST['PN']; // 2.3	
$SI = $_POST['SI']; // 3.1	
$LO = $_POST['LO']; // 3.2
$CD = $_POST['CD']; // 3.3
$AO = $_POST['AO']; // 4-1-A
$AA = $_POST['AA']; // 4-1-B
$MU = $_POST['MU']; // 4-1-C
$AR = $_POST['AR']; // 4-2-A
$TL = $_POST['TL']; // 4-2-B
$OD = $_POST['OD']; // 5.1
$IS = $_POST['IS']; // 5.2
$AB = $_POST['AB']; // 5.3
$MB = $_POST['MB']; // 5.4
$UF = $_POST['UF']; // 6.1
$BS = $_POST['BS']; // 6-1-A
$UD = $_POST['UD']; // 6-1-B
$UP = $_POST['UP']; // 6-1-C
$AD = $_POST['AD']; // 7.0
$SV = $_POST['SV'];
$EID = $_GET['id'];
if (($_POST['CI'] == "N") || ($_POST['OV'] == "N") || ($_POST['TS'] == "N") || ($_POST['PN'] == "N") || ($_POST['SI'] == "N") || ($_POST['LO'] == "N") || ($_POST['CD'] == "N")
|| ($_POST['AO'] == "N") || ($_POST['AA'] == "N") || ($_POST['MU'] == "N")  || ($_POST['AR'] == "N") || ($_POST['TL'] == "N") || ($_POST['OD'] == "N")
|| ($_POST['IS'] == "N") || ($_POST['AB'] == "N") || ($_POST['MB'] == "N") || ($_POST['UF'] == "N") || ($_POST['BS'] == "N") || ($_POST['UD'] == "N") || ($_POST['SV'] == "N") || ($_POST['UP'] == "N"))
{ $R1 = "Inaccurate";
	} else {
		$R1 = "Accurate";
	}
if (!empty($OR) && ($CI != 1) && ($OV != 1) && ($TS != 1) && ($PN != 1) && ($SI != 1) && ($LO != 1) && ($CD != 1) && ($AO != 1) && ($AA != 1) && ($TL != 1)
	&& ($MU != 1) && ($AR != 1)&& ($TL != 1)&& ($OD != 1)&& ($IS != 1)&& ($AB != 1) && ($MB != 1) && ($BS != 1)&& ($UD != 1)&& ($UP != 1) && ($SV != 1) && ($UF != 1))
	{  echo "<script type='text/javascript'>alert('".$OR." : Sucessfully saved!')</script>"; 
//insert to database
$sql = "INSERT INTO `qualitycheck` (`TransNo`, `ORNo`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`, `CustIns`, `OveRep`, `TexSiz`,
 `PosNeg`, `Size`, `Loca`, `Colo`, `ArtOrd`, `AdjArt`, `MocUp`, `ArtSiz`, `TemLay`, `OrdDet`, `ImpSiz`, `ArtBox`, `MocBox`, `UplFil`, `BacSli`, `Und`, 
 `UplPro`, `AddNote`, `SVG`, `TransID` ) VALUES
(NULL, '$OR', '$AS', '$TM', '$QC', '$DE', '$R1', '$CI', '$OV', '$TS', '$PN', '$SI', '$LO', '$CD',
 '$AO', '$AA', '$MU','$AR', '$TL', '$OD' ,'$IS', '$AB' , '$MB','$UF', '$BS', '$UD', '$UP', '$AD', '$SV','$EID')";
 
$query  = mysqli_query($connect,$sql);
echo("<meta http-equiv='refresh' content='1'>"); 
 
 } else { 
echo "<script type='text/javascript'>alert('Error : Please fill-up all required field!')</script>";
}
	}
?>
</form>
</body>
</html>
