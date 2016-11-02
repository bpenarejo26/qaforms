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


$id = $_GET['id'];
$sql = "SELECT TransNo, ORNo, Source, Brand, Assoc, Manager, Checker,
 EvalDate, Accuracy, CustIns, OveRep, TexSiz, PosNeg, Size, Loca, Colo,
 ArtOrd, AdjArt, MocUp, ArtSiz, TemLay, OrdDet, ImpSiz, ArtBox, MocBox,
 BacSli, Und, UplPro, AddNote FROM qualitycheck WHERE TransNo = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

//echo $row['AddNote'];
if(isset($_POST['update'])) {

$OR = $_POST['OR'];
$SO = $_POST['SO'];
$BR = $_POST['BR'];
$AS = $_POST['AS'];
$TM = $_POST['TM'];
$QC = $_POST['QC'];
$AC = $_POST['AC'];
$DE = $_POST['DE'];
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
$AD = $_POST['AD'];
$date = date('Y-m-d H:i:s');

$sql = "UPDATE qualitycheck SET Source = '$SO', Brand = '$BR', Assoc = '$AS',
 Manager = '$TM', Checker = '$QC', Accuracy = '$AC', CustIns = '$CI', OveRep = '$OV', TexSiz = '$TS',
 PosNeg = '$PN', Size = '$SI', Loca = '$LO', Colo = '$CD', ArtOrd = '$AO', MocUp = '$MU', ArtSiz = '$AR',
 TemLay = '$TL', OrdDet = '$OD', ImpSiz = '$IS', ArtBox = '$AB', MocBox = '$MB', UplFil = '$UF', BacSli = '$BS', 
 Und = '$UD', UplPro = '$UP', AddNote = '$AD', EDate = '$date' WHERE qualitycheck.TransNo = '$id'";
$result2 = mysqli_query($connect, $sql);
 echo "<script type='text/javascript'>alert('$row[ORNo]  is successfully update!')</script>";
}
?>
<img id="the_pic" class = "center fit" src="1.PNG" > 
</head> 
<body>
<form name ="survey" method = "post" ><br>
<table width="75%" border="0">
<tr>
<td><font size="3">Order Number </font></td>
<td>&nbsp;<input type = "text" name = "OR" value = "<?php echo $row['ORNo'];?>" readonly></td>
<td>&nbsp;Team Manager</td>
<td>&nbsp;
<?php 
$sql5 = "SELECT TransNo, EmpID, Fullname FROM qualitycheck INNER JOIN employee on Manager = EmpID WHERE TransNo = '$id'";
$result5 = mysqli_query($connect, $sql5);

$sql15 = "SELECT fullname, EmpID FROM employee where poscode = '2'";
$result15 = mysqli_query($connect, $sql15);


//echo "<option value=$row[id]>$row[name]</option>";


//echo $row15['EmpID'];
echo '<select name=TM >';

//echo "<option value=$row[id]>$row[name]</option>";
if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)) {;
		echo "<option value=$row5[EmpID]>$row5[Fullname]</option>"; 
   
} 
}
 else {
    echo "0 results";
}
if (mysqli_num_rows($result15) > 0)  {
    // output data of each row
    while($row15 = mysqli_fetch_assoc($result15)) {
		echo "<option value=$row15[EmpID]>$row15[fullname]</option>"; 
    }
	}
 echo "</select>"; 
 ?>
<td>
<p id="now"></p>

<script>
document.getElementById("now").innerHTML = Date();
</script>

</td>
<td>
<input type = "submit" name = "back" value = "Home"/>

<?php if(isset($_POST['back'] )) { $id = "2"; header("Location:http://10.16.1.102:8085/qaforms/qa.php"); } ?>

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
$sql4 = "SELECT TransNo, EmpID, Fullname FROM qualitycheck INNER JOIN employee on Checker = EmpID WHERE TransNo = '$id'";
$result4 = mysqli_query($connect, $sql4);

$sql14 = "SELECT fullname, EmpID FROM employee where poscode = '3'";
$result14 = mysqli_query($connect, $sql14);

 echo "<select name=QC value='QC'></option>";

//echo "<option value=$row[id]>$row[name]</option>";
if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result4)) {
		echo "<option value=$row4[EmpID]>$row4[Fullname]</option>"; 
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result14) > 0)  {
    // output data of each row
    while($row14 = mysqli_fetch_assoc($result14)) {
		echo "<option value=$row14[EmpID]>$row14[fullname]</option>"; 
    }
	}

 echo "</select>";
 ?>

</tr>
<tr>
<td>&nbsp;Brand</td>
<td>&nbsp;<?php 
$sql13 = "SELECT ID, Name from Brand";
$result13 = mysqli_query($connect, $sql13);
$sql3 = "SELECT ID, Name FROM brand INNER JOIN qualitycheck ON ID = brand WHERE TransNo = '$id'";
$result3 = mysqli_query($connect, $sql3);
 echo "<select name=BR value='BR'></option>";
//echo "<option value=$row[id]>$row[name]</option>";
if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {
		echo "<option value=$row3[ID]>$row3[Name]</option>"; 
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result13) > 0) {
    // output data of each row
    while($row13 = mysqli_fetch_assoc($result13)) {
		echo "<option value=$row13[ID]>$row13[Name]</option>"; 
    }
}


 echo "</select>";
 ?></td>
<td>&nbsp;Date Evaluated</td>
<td>&nbsp;<input type = "date" name = "DE"  value = "<?php echo $row['EvalDate']?>" readonly /></td>
</tr>
<tr>
<td>&nbsp;Associate</td>
<td>&nbsp;<select name="AS">
  <option value="1">Associate 1</option>
  <option value="2">Associate 2</option>
  <option value="3">Associate 3</option>
</select></td>
<td>&nbsp;Process Accuracy</td>
<td>&nbsp;

<input type="radio" name="AC" value="Y" >
<span>Accurate</span>
<input type="radio" name="AC" value="N"  checked>Inaccurate</td>
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
	  <?php echo "<option value=$row[CustIns]>$row[CustIns]</option>"; ?>
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
	  <?php echo "<option value=$row[ArtOrd]>$row[ArtOrd]</option>"; ?>
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
	  <?php echo "<option value=$row[OveRep]>$row[OveRep]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
	  
	  </p></th>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>4-1-B Adjusted Artwork</strong></p></td>
      <td><p><strong><select name="AA">
	  <?php echo "<option value=$row[AdjArt]>$row[AdjArt]</option>"; ?>
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
      <td><p><strong>4-1-C Mock Up (optional)</strong></p></td>
      <td><p><strong><select name="MU">
	  <?php echo "<option value=$row[MocUp]>$row[MocUp]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>2.2 </strong></p></th>
      <td><p><strong>Text Sizes</strong></p></td>
      <td><p><select name="TS">
	  <?php echo "<option value=$row[TexSiz]>$row[TexSiz]</option>"; ?>
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
	  <?php echo "<option value=$row[ArtSiz]>$row[ArtSiz]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>2.3</strong></p></th>
      <td><p><strong>Positiove and Negative Details</strong></p></td>
      <td><p><select name="PN">
	  <?php echo "<option value=$row[PosNeg]>$row[PosNeg]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p>&nbsp;</p></td>
      <td><p><strong>4-2-B Template/Layout</strong></p></td>
      <td><p><strong><select name="TL">
	  <?php echo "<option value=$row[TemLay]>$row[TemLay]</option>"; ?>
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
	  <?php echo "<option value=$row[OrdDet]>$row[OrdDet]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>3.1 </strong></p></th>
      <td><p><strong>Size</strong></p></td>
      <td><p><select name="SI">
	  <?php echo "<option value=$row[Size]>$row[Size]</option>"; ?>
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
	  <?php echo "<option value=$row[ImpSiz]>$row[ImpSiz]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>3.2 </strong></p></th>
      <td><p><strong>Location</strong></p></td>
      <td><p><select name="LO">
	  <?php echo "<option value=$row[Loca]>$row[Loca]</option>"; ?>
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
	  <?php echo "<option value=$row[ArtBox]>$row[ArtBox]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <th  scope="row" align="left"><p><strong>3.3</strong></p></th>
      <td><p><strong>Color</strong></p></td>
      <td><p><select name="CD">
	  <?php echo "<option value=$row[Colo]>$row[Colo]</option>"; ?>
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
	  <?php echo "<option value=$row[MocBox]>$row[MocBox]</option>"; ?>
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
	  <?php echo "<option value=$row[UplFil]>$row[UplFil]</option>"; ?>
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
	  <?php echo "<option value=$row[BacSli]>$row[BacSli]</option>"; ?>
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
	  <?php echo "<option value=$row[Und]>$row[Und]</option>"; ?>
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
	 <?php echo "<option value=$row[UplPro]>$row[UplPro]</option>"; ?>
  <option value="Y">Y</option>
  <option value="N">N</option>
</select></strong></p></td>
    </tr>
    <tr>
      <th  scope="row" align="left">&nbsp;</th>
      <th  scope="row" align="left"><p>&nbsp;</p></th>
      <td colspan="7" rowspan="" ><textarea rows="7" cols="100" name = "AD" /> <?php echo htmlspecialchars($row['AddNote']);?></textarea><p>&nbsp;</p>        <p>&nbsp;</p>        <p>&nbsp;</p>        <p>&nbsp;</p></td>
    </tr>
    <tr>

    </tr>
    <tr>
      
    </tr>
    <tr>
     
     
    </tr>
    <tr>
    
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;<input type = "submit" name = "update" value = "edit"  onclick="return confirm('Are you sure you want to save')"/> </td></td>
      <td>&nbsp; 
  </tbody>
</table><br>

<img id="the_pic" class="center fit" src="2.PNG" >  
</form>
</body>
</html>
