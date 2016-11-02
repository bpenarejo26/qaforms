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
	
	
if(isset($_POST['submit'])) {

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


$sql = "INSERT INTO `qualitycheck` (`TransNo`, `ORNo`, `Source`, `Brand`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`, `CustIns`, `OveRep`, `TexSiz`, `PosNeg`, `Size`, `Loca`, `Colo`, `Cont`, `FilPre`, `OrdDet`, `ImpSiz`, `MocBox`, `UplFil`, `UplPro`) VALUES 
(NULL, '$OR', '$SO', '$BR', '$AS', '$TM', '$QC', '$DE', '$R1', '$CI', '$OV', '$TS', '$PN', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1')";

if ($connect->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
}
?>

<html>
<head>
<form name ="survey" method = "post" ><br>
ART Quality Checklist Form
<br></br>
<body>
<table style="height: 97px;" width="600">
<tbody>
<tr>
<td>Order Number</td>
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
<td>&nbsp;<input type = "radio" name = "R1"/><input type = "radio" name = "R2"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
PROCESS ARTWORK
<br>

</br>
1.0 CUSTOMER'S INTRUCTIONS 
<br>
1.1 Customer's Instructions 
<select name="CI">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<br>
The adjusted artwork refflects the insturctions found on Job Details, 
<br>
Art Work, and Input Notes.
<br>
<br>
2.0 ART STANDARDS
<br>
2.1 Overall Representation
<select name="OV">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<br>
The adjusted artwork reflects the insturctions found on Job Details,
<br>
Art Work, and Input Notes.
<br>
2.2 Text Sizes
<select name="TS">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<br>
Text sizes are at least the minimum font size required for the imprint
<br>
method or item category.
<br>
2.3 Positiove and Negative Details
<select name="PN">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<br>
All positive details in the artworks are at least thick as 1 pt strokes; as 
<br>
all negative details are as thick as 2 pts stroke.
<br>
<br>
3.0 MOCK UP
<br>
3.1 Size 
<br>
The size of the artworks is proportional to the dimensions of the 
<br>
artwork.
<br>
3.2 Location
<br>
The artwork is located on the items with reference to the sample 
<br>
images on the website.
<br>
3.3 Color
<br>
Color/s are properly represented in accordance to client's choices.
<br><br>
4.1 Content
<br>
4-1-A Art Copy/Order Details
<br>
4-1-B Adjusted Artwork
<br>
4-1-C
<br>
Mock Up (optional)
<br>
4.2 Film Presentation
<br>
4-2-A Artboard Size
<br>
4-2-B 
<br>
Template/Layout
<br><br>
5.0 PROOF
<br>
5-1 Order Details
<br>
The adjusted artwork refflects the insturctions found on the Job Details,
<br>
Art Work, and input Notes.
<br>
5-2 Imprint Size/s
<br>
The size of the artwork is smaller or equal to the imprint area of the 
<br>
item.
<br>
5-3 Art Boxes 
<br>
The artboxes used correspond to the correct imprint locations.
<br>
5-4 
<br>
The mock up boxes correspond to the artboxes used on the proof.
<br><br>
6.0 UPLOADS
<br>
6-1 Upload Film
<br>
6-1-A Back Slide (if applicable)
<br>
6-1-B Underlay ?(if applicable)
<br>
6-2 Uploaded PROOF
<br><br>
<input type = "submit" name = "submit" value = "Save"/>
<br>





<?php
/* 
<input type = "submit" name = "submit2" value = "test"/>
if(isset($_POST['submit2'])) {
$TM = $_POST['TM'];
$QC = $_POST['QC'];

echo $TM;	
echo $QC;
echo "xxxxxxxxx";
	
	
	
}
*/
?>


</form>
</body>
</head>
</html>