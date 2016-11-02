<?php
include ("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")

?>

<!doctype html>
<html>
<form name = "item" method = "POST">
<fieldset>
<font color="FFFFCC"><th scope="row"><input style="border-radius: 15px;  border:transparent; text-align:center;" type="text" size="30" name="search_box" id="search_box" onkeyup="lookup(this.value);" value="Select Supplier Name..." onclick="this.value='';" onfocus="javascript: if (formfield.defaultValue==formfield.value)formfield.value = ''" onblur="this.value=!this.value?'Search Supplier...':this.value;"  autocomplete='off' /></th> 

<body bgcolor= "2b22e2">


<style type="text/css">
	body {
		font-family: Helvetica;
		font-size: 17px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 30px;
		margin: 10px 0px 0px 0px;
		width: 200px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
	function lookup(ComName) {
		if(ComName.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("jitem.php", {queryString: ""+ComName+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#search_box').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>


<table width="800" border="" cellspacing="0">
  <tbody>
    <tr>
      <th scope="row">PRODUCT</th>
      <td> <b> BRAND NAME</td>
      <td> <b> DESCRIPTION</td>
	  <td> <b> WARRANTY</td>
      <td></td>
    </tr>
    <tr>
	  <td><input style="border-radius: 15px;  border:transparent; text-align:center;" type = "text" name = "prod" /></td>
      <td><input style="border-radius: 15px;  border:transparent; text-align:center;"  type = "text" name = "brand"></td>
      <td><input style="border-radius: 15px;  border:transparent; text-align:center;"  type = "text" name = "desc"></td>
	  <td><input style="border-radius: 15px;  border:transparent; text-align:center;" type = "date" name = "date"></td>
	  <td><input style="border-radius: 15px; cursor:pointer;" type="submit" name="save" value="add"></td>
	  </tr>
<div class="suggestionsBox" id="suggestions" style="display: none;">
<img src="upArrow.png" style="position: relative; top: -12px; left: 35px;" alt="upArrow" />
<div class="suggestionList" id="autoSuggestionsList">
&nbsp;
</div>
</div>
<?php 
if(isset($_POST['save']) && (empty($_POST['prod'])) || (empty($_POST['brand'])) || (empty($_POST['desc'])) || (empty($_POST['date']))) {
echo "Please fill up all required details." ; }
else {
$prod = ($_POST['prod']);
$B_Name = ($_POST['brand']);
$desc = ($_POST['desc']);
$date = ($_POST['date']);
$search_box = ($_POST['search_box']);

$select1st = "SELECT TransNo FROM company Where ComName = '$search_box'" ;
$result1st = mysql_query ($select1st ,$connect);
$row1st = mysql_fetch_array($result1st);
$TempData = $row1st['TransNo'] ;
//echo $TempData;
$insert = "INSERT INTO `itemlist`(`TransNo`, `B_Name`, `Description`, `EncodedBy`, `DateEncoded`, `Warranty`, `Product`,`SupplierID`) VALUES ('','$B_Name','$desc','1','$date','$date','$prod', $TempData)";
$insert_query=mysql_query($insert,$connect);
$selecta = "SELECT * FROM `itemlist`";
$result = mysql_query($selecta , $connect);
$row = mysql_fetch_array($result);

?>
	
	
	<?php do { ?>
	<tr>
	<td align="center"><?php echo $row['Product']; ?></td>
	<td align="center"><?php echo $row['B_Name']; ?></td>
	<td align="center"><?php echo $row['Description']; ?></td>
	<td align="center"><?php echo $row['Warranty']; ?></td>
	<tr>
	<?php } while($row = mysql_fetch_array($result)); ?>
<?php } ?>
	 </tr>
    </tr>
  </tbody>
</table>

</form>
</html>

