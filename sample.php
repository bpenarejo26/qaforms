<?php
$conn = mysql_connect("localhost","itsupport","Fic5#w0F");
mysql_select_db("branders",$conn);
$_SERVER["REQUEST_METHOD"] == "POST";
$d1 = $_GET['d1'];
$d2 = $_GET['d2'];
//echo $d1;
//echo $d2;
$filename = "BEL_USA_QA_Form.csv";
$fp = fopen('php://output', 'w');


 //echo $row2['name'];
/*$query = "select "TransNo", "ORNo", "Source", "Brand", "Assoc", "Fullname", "EvalDate", "Accuracy", "CustIns", "OveRep", "TexSiz", "PosNeg", "Size", "Loca", "Colo", "ArtOrd", "AdjArt", "MocUp", "ArtSiz", "TemLay", "OrdDet", "ImpSiz", "ArtBox", "MocBox", "UplFil", "BacSli", "Und", "UplPro" from"qualitycheck" \n"
    . "INNER join employee \n"
    . "on qualitycheck.Checker = employee.EmpID";
$result2 = mysqli_query ($conn, $query); 
while ($row = mysql_fetch_row($result2)) {*/
$header = array("Id", "ORNo", "Assoc", "Manager", "Checker", "EvalDate", "Accuracy", "CustIns", "OveRep", "TexSiz", "PosNeg", "Size", "Loca", "Colo", "ArtOrd", "AdjArt", "MocUp", "ArtSiz", "TemLay", "OrdDet", "ImpSiz", "ArtBox", "MocBox", "UplFil", "BacSli", "Und", "SVG", "UplPro", "AddNote", "EID", "EDate");
$Data = count($header);

for($x = 0; $x < $Data; $x++) {
    echo $Data[$x];
  
	
}	
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

$num_column = count($header);		
$query = "SELECT `TransNo`, `ORNo`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`, `CustIns`, `OveRep`, `TexSiz`, `PosNeg`, `Size`, `Loca`, `Colo`, `ArtOrd`, `AdjArt`, `MocUp`, `ArtSiz`, `TemLay`, `OrdDet`, `ImpSiz`, `ArtBox`, `MocBox`, `UplFil`, `BacSli`, `Und`, `SVG`, `UplPro`, `AddNote`,  `TransID`, `EDate`FROM `qualitycheck` WHERE EvalDate BETWEEN '$d1' and '$d2'";
$result = mysql_query($query);
while($row = mysql_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>
