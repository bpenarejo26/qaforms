<html>
<head>
<style>
html, body {
    height: 100%;
}


html {
    display: table;
    margin-top: 0.01em;
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
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
	
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT fullname, EmpID FROM employee where poscode = '2'";
$result = mysqli_query($connect, $sql);
$sql = "SELECT fullname, EmpID FROM employee where poscode = '3'";
$result2 = mysqli_query($connect, $sql);
	
	
if(isset($_POST['submit']) &&  (!empty($_POST['OR'])) &&  (!empty($_POST['DE'])) ) {

$OR = $_POST['OR'];
$SO = $_POST['SO'];
$BR = $_POST['BR'];
$AS = $_POST['AS'];
$TM = $_POST['TM'];
$QC = $_POST['QC'];
$DE = $_POST['DE'];
$R1 = $_POST['R1'];
$CI = $_POST['CI'];
$OV = $_POST['OV'];
$TS = $_POST['TS'];
$PN = $_POST['PN'];
$SI = $_POST['SI'];
$LO = $_POST['LO'];
$CD = $_POST['CD'];
$AO = $_POST['AO'];
$AA = $_POST['AA'];
$MU = $_POST['MU'];
$AR = $_POST['AR'];
$TL = $_POST['TL'];
$OD = $_POST['OD'];
$IS = $_POST['IS'];
$AB = $_POST['AB'];
$MB = $_POST['MB'];
$UF = $_POST['UF'];
$BS = $_POST['BS'];
$UD = $_POST['UD'];
$UP = $_POST['UP'];

$sql = "INSERT INTO `qualitycheck` (`TransNo`, `ORNo`, `Source`, `Brand`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`,
 `CustIns`, `OveRep`, `TexSiz`, `PosNeg`, `Size`, `Loca`, `Colo`, `ArtOrd`, `AdjArt`, `MocUp`, `ArtSiz`, `TemLay`, `OrdDet`, `ImpSiz`,
 `ArtBox`, `MocBox`, `UplFil`, `BacSli`, `Und`, `UplPro`) VALUES 
 (NULL, '$OR', '$SO', '$BR', '$AS', '$TM', '$QC', '$DE', '1', '$CI', '$OV', '$TS', '$PN', '$SI', '$LO', '$CD',
 '$AO', '$AA', '$MU', '$AR', '$TL', '$OD', '$IS', '$AB', '$MB', '$UF', '$BS', '$UD', '$UP')";


if ($connect->query($sql) === TRUE) {
	
    echo "<script type='text/javascript'>alert('Submitted successfully!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
}
?>
<img id="the_pic" class = "center fit" src="1.PNG" > 
</head> 
<body>
<form name ="survey" method = "post" ><br>
<table width="50%" border="0">
<tr>
<td><font size="3">Order Number </font></td>
<td>&nbsp;<input type = "text" name = "OR"/></td>
<td>&nbsp;Team Manager</td>
<td>&nbsp;
<?php 
echo "<select name=TM value='TM'></option>";

//echo "<option value=$row[id]>$row[name]</option>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<option value=$row[EmpID]>$row[fullname]</option>"; 
    }
} else {
    echo "0 results";
}
 echo "</select>"; 

 ?>

 <td>
<input type = "submit" name = "next" value = "+"/>

<?php if(isset($_POST['next'] )) { $id = "2"; header("Location:http://localhost/branders/register.php?id=".$id); } ?>

</td>

</td>
</tr>
<tr>
<td>&nbsp;Source</td>
<td>&nbsp;<select name="SO">
  <option value="1">Require Proof</option>
  <option value="2">Proof Changes</option>
</select>
</td>
<td>&nbsp;Quality Checker</td>
<td>&nbsp;
 
<?php 
 echo "<select name=QC value='QC'></option>";

//echo "<option value=$row[id]>$row[name]</option>";
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
		echo "<option value=$row2[EmpID]>$row2[fullname]</option>"; 
    }
} else {
    echo "0 results";
}
 echo "</select>";
 ?>
 <td>
<input type = "submit" name = "next2" value = "+"/>
<?php if(isset($_POST['next2'] )) { $id = "3"; header("Location:http://localhost/branders/register.php?id=".$id); } ?></td>
</td>
</tr>
<tr>
<td>&nbsp;Brand</td>
<td>&nbsp;<select name="BR">
  <option value="1">Discount Mugs</option>
  <option value="2">Branders</option>
  <option value="3">Bel Promo</option>
</select></td>
<td>&nbsp;Date Evaluated</td>
<td>&nbsp;<input type = "date" name = "DE"/></td>
</tr>
<tr>
<td>&nbsp;Associate</td>
<td>&nbsp;<select name="AS">
  <option value="1">Associate 1</option>
  <option value="2">Associate 2</option>
  <option value="3">Associate 3</option>
</select></td>
<td>&nbsp;Process Accuracy</td>
<td>&nbsp;<input type = "radio" name = "R1"/>Accurate<input type = "radio" name = "R2"/>Inaccurate</td>
</tr>
<tr>

</tr>
</tbody>
</table>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Branders.com PH</title>
</head>

<body>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th colspan="9" scope="col"align="left" bgcolor="#94DC58"><p><strong>PROCESS ARTWORK</strong></p></th>
    </tr>
    <tr>
      <th colspan="4" style="font-size: 16px"  scope="row" align="left" bgcolor="#A2D17B"><p><strong>1.0 CUSTOMER'S INTRUCTIONS </strong></p></th>
      <td width="2%"><p>&nbsp;</p></td>
      <td colspan="4"bgcolor="#A2D17B"><p><strong >4.0 </strong><strong>FILM</strong></p></td>
    </tr>
    <tr>
      <th width="3%" style="font-size: 16px"  scope="row" align="left"><p>&nbsp;</p></th>
      <th width="4%"  style="font-size: 16px"  scope="row" align="left"><p>1.1</p></th>
      <td width="32%" style="font-size: 16px"><p><strong>The adjusted artwork refflects the instructions found on Job Details, Art Work, and Input Notes.</strong></p></td>
      <td width="6%" style="font-size: 16px"><p>
	  <select name="CI">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
</p></td>
      <td><p>&nbsp;</p></td>
      <td width="4%"><p>&nbsp;</p></td>
      <td width="3%"><p><strong>4.1</strong></p></td>
      <td width="31%"><p><strong>Content</strong></p></td>
      <td width="15%">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="3"  scope="row" align="left" bgcolor="#A2D17B"><p><strong>2.0 ART STANDARDS</strong></p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong> 4-1-A Art Copy/Order Details</strong></p></td>
      <td><p><strong><select name="AO">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>2.1</strong></p></th>
      <th  scope="row" align="left"><p><strong>Overall Representation</strong></p></th>
      <th  scope="row" align="left"><p>
	  <select name="OV">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
	  
	  </p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>4.1B Adjusted Artwork</strong></p></td>
      <td><p><strong><select name="AA">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>The adjusted artwork reflects the insturctions found on Job Details, Art Work, and Input Notes.</strong></p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td>&nbsp;</td>
      <td><p><strong>4.1C Mock Up (optional)</strong></p></td>
      <td><p><strong><select name="MU">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>2.2 </strong></p></th>
      <td><p><strong>Text Sizes</strong></p></td>
      <td><p><select name="TS">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>4.2</strong></p></td>
      <td><p><strong> Film Presentation</strong></p></td>
      <td><p>&nbsp;</p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p><strong>Text sizes are at least the minimum font size required for the imprint method or item category.</strong></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>4-2-A Artboard Size</strong></p></td>
      <td><p><strong><select name="AR">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>2.3</strong></p></th>
      <td><p><strong>Positiove and Negative Details</strong></p></td>
      <td><p><select name="PN">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>4-2-B Template/Layout</strong></p></td>
      <td><p><strong><select name="TL">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p><strong>All positive details in the artworks are at least thick as 1 pt strokes; as all negative details are as thick as 2 pts stroke.</strong></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td colspan="4" bgcolor="#A2D17B"><p><strong>5.0 PROOF</strong></p></td>
    </tr>
    <tr>
      <th colspan="3"  scope="row" align="left" bgcolor="#A2D17B"><p><strong>3.0 MOCK U</strong>P</p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>5-1</strong></p></td>
      <td><p><strong> Order Details</strong></p></td>
      <td><p><strong><select name="OD">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>3.1 </strong></p></th>
      <td><p><strong>Size</strong></p></td>
      <td><p><select name="SI">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>The adjusted artwork refflects the insturctions found on the Job Details,</strong><strong>Art Work, and input Notes.</strong></p></td>
      <td><p>&nbsp;</p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p><strong>The size of the artworks is proportional to the dimensions of the artwork.</strong></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>5-2</strong></p></td>
      <td><p><strong>Imprint Size/s</strong></p></td>
      <td><p><strong><select name="IS">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>3.2 </strong></p></th>
      <td><p><strong>Location</strong></p></td>
      <td><p><select name="LO">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>The size of the artwork is smaller or equal to the imprint area of the </strong><strong>item.</strong></p></td>
      <td><p>&nbsp;</p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>The artwork is located on the items with reference to the sample images on the website.</strong></p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>5-3</strong></p></td>
      <td><p><strong> Art Boxes </strong></p></td>
      <td><p><strong><select name="AB">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>3.3</strong></p></th>
      <td><p><strong>Color</strong></p></td>
      <td><p><select name="CD">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>The artboxes used correspond to the correct imprint locations.</strong></p></td>
      <td><p>&nbsp;</p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p><strong>Color/s are properly represented in accordance to client's choices</strong></p></td>
      <td><p></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>5.4</strong></p></td>
      <td><p><strong>The mock up boxes correspond to the artboxes used on the proof.</strong></p></td>
      <td><p><strong><select name="MB">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td colspan="4"bgcolor="#A2D17B"><p><strong>6.0 </strong><strong>UPLOADS</strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>6-1</strong></p></td>
      <td><p><strong>Upload Film</strong></p></td>
      <td><p><strong><select name="UF">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th height="25"  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>6-1-A Back Slide (if applicable)</strong></p></td>
      <td><p><strong><select name="BS">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>6-1-B Underlay ?(if applicable)</strong></p></td>
      <td><p><strong><select name="UD">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>7.0</strong></p></th>
      <td><p><strong>ADDITIONAL NOTES</strong></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;<strong>6-2</strong</p></td>
      <td><p><strong>Uploaded PROOF</strong></p></td>
      <td><p><strong><select name="UP">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left">&nbsp;</th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td colspan="7" rowspan="3"><p>&nbsp;</p>        <p>&nbsp;</p>        <p>&nbsp;</p>        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <th  scope="row" align="left">&nbsp;</th>
      <th  scope="row" align="left">&nbsp;</th>
    </tr>
    <tr>
      <th  scope="row" align="left">&nbsp;</th>
      <th  scope="row" align="left">&nbsp;</th>
    </tr>
    <tr>
      <th  scope="row" align="left">&nbsp;</th>
      <th  scope="row" align="left">&nbsp;</th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;<input type = "submit" name = "submit" value = "Save"  onclick="return confirm('Are you sure you want to save')"/> </td></td>
      <td>&nbsp; 
  </tbody>
</table><br>
<a href="http://localhost/branders/report.php">Click here to view report</a></td>
<img id="the_pic" class="center fit" src="2.PNG" >  
</form>
</body>
</html>
