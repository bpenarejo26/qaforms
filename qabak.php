<!doctype html>
<html>
<head>
<title>Branders.com PH</title>
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
$sql = "SELECT Name from Brand";
$result3 = mysqli_query($connect, $sql);
$sql = "SELECT fullname, EmpID FROM employee where poscode = '4'";
$result4 = mysqli_query($connect, $sql);	


?>

<img id="the_pic" class = "center fit" src="1.PNG" > 
</head> 
<body>
<form name ="survey" method = "POST" action = "#" ><br>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th width="15%" scope="col" align="left">Order Number</th>
      <th width="15%" scope="col"><input type = "text"  name = "OR" size="25" tabindex=1 ></th>
      <th width="5%" scope="col">&nbsp;</th>
      <th width="15%" scope="col" align="left">Team Manager</th>
      <th width="5%" scope="col">
	  <?php 
		echo "<select name=TM value='TM'tabindex=5 style='float:left' />";

		//echo "<option value=$row[id]>$row[name]</option>";
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<option value=$row[EmpID]>$row[fullname]</option>"; 
														  }
											  } 
		    else {
					echo "0 results";
				 }
					echo "</select>"; 


		?>
</th>
      <td><input type = "submit" name = "next" value = "+"/ tabindex=-1  align="left"></td>
	  <?php if(isset($_POST['next'] )) { $id = "2"; header("Location:http://localhost/branders/register.php?id=".$id); } ?>
    </tr>
    <tr>
      <th scope="row" align="left" align="left">Source</th>
      <td><select name="SO" size="1" tabindex=2 style="float:left;">
		  <option value="1">Require Proof</option>
		  <option value="2">Proof Changes</option>
		</select></td>
      <td>&nbsp;</td>
      <td>Quality Checker</td>
      <td><?php echo "<select name=QC value='QC'tabindex=6>";
				//echo "<option value=$row[id]>$row[name]</option>";
				if (mysqli_num_rows($result2) > 0) {
				// output data of each row
					while($row2 = mysqli_fetch_assoc($result2)) {
					echo "<option value=$row2[EmpID]>$row2[fullname]</option>"; 
																}
													}
				else {
					echo "0 results";
					}
					echo "</select>";
			?></td>
      <td><input type = "submit" name = "next2" value = "+" tabindex=-1/>
			<?php if(isset($_POST['next2'] )) { $id = "3"; header("Location:http://localhost/branders/register.php?id=".$id); } ?></td>
    </tr>
    <tr>
      <th scope="row" align="left" align="left">Brand</th>
      <td><?php echo "<select name=BR value='BR'tabindex=3 >";
			
		if (mysqli_num_rows($result3) > 0 ) {
			
			while($row3 = mysqli_fetch_assoc($result3)) {
			echo "<option value=$row3[ID]>$row3[Name]</option>"; 
														}
											} 
		else {
			echo "0 results";
			}
			echo "</select>";
		?></td>
      <td>&nbsp;</td>
      <td>Date Evaluated</td>
      <td><input type = "datetime-local" name = "DE"  tabindex=7 value = ""/></td>
      <td>&nbsp;</td>
    </tr>
	
    <tr>
      <th scope="row" align="left" align="left">Associate</th>
      <td><?php echo "<select name=AS value='AS'tabindex=4>";
			if (mysqli_num_rows($result4) > 0) {
		
				while($row4 = mysqli_fetch_assoc($result4)) {
					echo "<option value=$row4[EmpID]>$row4[fullname]</option>"; 
														  }
											  } 
		    else {
					echo "0 results";
				 }
					echo "</select>"; ?></td>
      <td><input type = "submit" name = "next3" value = "+" tabindex=-1 />
	  <?php if(isset($_POST['next3'] )) { $id = "4"; header("Location:http://localhost/branders/register.php?id=".$id); } ?>
      <td>Process Accuracy</td>
      <td><span>Accurate</span>
	  <input type="radio" name="first" value="Y" tabindex=8/>
		Inaccurate
		<input type="radio" name="first" value="N" tabindex=1/>
		</td>
	  </td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th colspan="5" scope="col"align="left" bgcolor="#94DC58"><strong>PROCESS ARTWORK</strong></th>
    </tr>
    <tr>
      <th colspan="5" scope="row" align="left" bgcolor="#A2D17B"><strong>1.0 CUSTOMER INSTRUCTIONS</strong></th>
    </tr>
    <tr>
      <th width="5%" scope="row">&nbsp;</th>
      <td width="5%"><table width="100%" border="0">
        <tbody>
          <tr>
            <th width="4%" scope="row" align="left"><p><br>
              1.1</p></th>
          </tr>
        </tbody>
      </table></td>
      <td width="75%"><strong>The adjusted artwork refflects the instructions found on Job Details, Art Work, and Input Notes.</strong></td>
      <td width="4%">&nbsp;</td>
      <td width="11%"><select name="CI">
		<<option value="1"></option><option value="Y">Y</option>
		<option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th colspan="5" scope="row" align="left" bgcolor="#A2D17B"><strong>2.0 ART STANDARDS</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong>2.1</strong></td>
      <td><strong>Overall Representation</strong></td>
      <td>&nbsp;</td>
      <td><select name="OV">
			<<option value="1"></option><option value="Y">Y</option>
			<option value="N">N</option>
		</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The adjusted artwork reflects the insturctions found on Job Details, Art Work, and Input Notes.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>2.2</td>
      <td><strong>Text Sizes</strong></td>
      <td>&nbsp;</td>
      <td><select name="TS">
		<<option value="1"></option><option value="Y">Y</option>
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
      <td>2.3</td>
      <td><strong>Positiove and Negative Details</strong></td>
      <td>&nbsp;</td>
      <td><select name="PN">
	<option value="1"></option><option value="Y">Y</option>
	<option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>All positive details in the artworks are at least thick as 1 pt strokes; as all negative details are as thick as 2 pts stroke</strong>.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th colspan="5" scope="row" align="left" bgcolor="#A2D17B"><strong>3.0 MOCK U</strong>P</th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>3.1</td>
      <td><strong>The size of the artworks is proportional to the dimensions of the artwork.</strong></td>
      <td>&nbsp;</td>
      <td><select name="SI">
	<option value="1"></option><option value="Y">Y</option>
	<option value="N">N</option>
	</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>3.2</td>
      <td><strong>Location</strong></td>
      <td>&nbsp;</td>
      <td><select name="LO">
  <option value="1"></option><option value="Y">Y</option>
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
      <td>3.3</td>
      <td><strong>Color</strong></td>
      <td>&nbsp;</td>
      <td><select name="CD">
  <option value="1"></option><option value="Y">Y</option>
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
      <th colspan="5" scope="row"align="left" bgcolor="#A2D17B"><strong>4.0 </strong><strong>FILM</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>4.1</td>
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
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-1-B Adjusted Artwork</strong></td>
      <td>&nbsp;</td>
      <td><select name="AA">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-1-C Mock Up (optional)</strong></td>
      <td>&nbsp;</td>
      <td><select name="MU">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>4.2</td>
      <td><strong>Film Presentation</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td>4-2-A <strong>Artboard Size</strong></td>
      <td>&nbsp;</td>
      <td><select name="AR">
  <<option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>4-2-B Template/Layout</strong></td>
      <td>&nbsp;</td>
      <td><select name="TL">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th colspan="5" scope="row" align = "left" bgcolor="#A2D17B">5.0<strong> PROOF</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>5.1</td>
      <td><strong>Order Details</strong></td>
      <td>&nbsp;</td>
      <td><select name="OD">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The adjusted artwork refflects the insturctions found on the Job Details,</strong><strong>Art Work, and input Notes.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>5.2</td>
      <td><strong>Imprint Size/s</strong></td>
      <td>&nbsp;</td>
      <td><select name="IS">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>The size of the artwork is smaller or equal to the imprint area of the </strong><strong>item.</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>5.3</td>
      <td><strong>Art Boxes</strong></td>
      <td>&nbsp;</td>
      <td><select name="AB">
  <option value="1"></option><option value="Y">Y</option>
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
      <td>5.4</td>
      <td><strong>The mock up boxes correspond to the artboxes used on the proof.</strong></td>
      <td>&nbsp;</td>
      <td><select name="MB">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th colspan="5" scope="row"bgcolor="#A2D17B" align = "left">6.0 UPLOADS</th>
    </tr>
    <tr>
      <th height="25" scope="row">&nbsp;</th>
      <td>6.1</td>
      <td><strong>Uploaded Film</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>6-1-A Back Slide (if applicable)</strong></td>
      <td>&nbsp;</td>
      <td><select name="BS">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>6-1-B Underlay (if applicable)</strong></td>
      <td>&nbsp;</td>
      <td><select name="UD">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><strong>6-1-C SVG File (if applicable)</strong></td>
      <td>&nbsp;</td>
      <td><select name="SV">
  <option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><strong> 6-2 </strong></td>
      <td><strong>Uploaded PROOF</strong></td>
      <td>&nbsp;</td>
      <td><select name="UP">
  <<option value="1"></option><option value="Y">Y</option>
  <option value="N">N</option>
</select></td>
    </tr>
	<tr>
    <th colspan="5" scope="row" bgcolor="#A2D17B" align = "left"><strong>7.0 </strong><strong>ADDITIONAL NOTES</strong></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><textarea rows="7" cols="100" name = "AD"> </textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><input type = "submit" name = "submit" value = "Save"  onclick="return confirm('Are you sure you want to save')"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p><a align= "center" href="http://localhost/branders/report.php">Click here to view report</a></td>
<img id="the_pic" class="center fit" src="2.PNG" > </p>

<?php 
if(isset($_POST['submit']))
	{
	if (!empty($_POST['first'])) { $R1 = 1;
	} else {
		$R1 = 0;
	}

$OR = $_POST['OR'];
$SO = $_POST['SO'];
$BR = $_POST['BR'];
$AS = $_POST['AS'];
$TM = $_POST['TM'];
$QC = $_POST['QC'];
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
$TL = $_POST['TL'];
$MU = $_POST['MU'];
$AR = $_POST['AR'];
$TL = $_POST['TL'];
$OD = $_POST['OD'];
$IS = $_POST['IS'];
$AB = $_POST['AB'];
$MB = $_POST['MB'];
$BS = $_POST['BS'];
$UD = $_POST['UD'];
$UP = $_POST['UP'];
$AD = $_POST['AD'];
$SV = $_POST['SV'];


if (!empty($OR) && ($CI != 1) && ($OV != 1) && ($TS != 1) && ($PN != 1) && ($SI != 1) && ($LO != 1) && ($CD != 1) && ($AO != 1) && ($AA != 1) && ($TL != 1)
	&& ($MU != 1) && ($AR != 1)&& ($TL != 1)&& ($OD != 1)&& ($IS != 1)&& ($AB != 1) && ($MB != 1) && ($BS != 1)&& ($UD != 1)&& ($UP != 1) && ($SV != 1))
	{  echo "<script type='text/javascript'>alert('Sucessfully saved!')</script>"; 
 $sql = "INSERT INTO `qualitycheck` (`TransNo`, `ORNo`, `Source`, `Brand`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`, `CustIns`, `OveRep`, 
 `TexSiz`, `PosNeg`, `Size`, `Loca`, `Colo`, `ArtOrd`, `AdjArt`, `MocUp`, `ArtSiz`, `TemLay`, `OrdDet`, `ImpSiz`, `ArtBox`, `MocBox`,  `BacSli`,
 `Und`, `UplPro`, `AddNote`, `SVG`) VALUES
(NULL, '$OR', '$SO', '$BR', '$AS', '$TM', '$QC', '$DE', '$R1', '$CI', '$OV', '$TS', '$PN', '$SI', '$LO', '$CD',
 '$AO', '$AA', '$TL','$OD', '$IS', '$MB', '$IS', '$AB' , '$MU','$BS', '$UD', '$UP', '$AD', '$SV')";
$query  = mysqli_query($connect,$sql);


 } else { 
echo "<script type='text/javascript'>alert('Error : Please fill-up all required field!')</script>";
}
	}
?>
</form>
</body>
</html>
