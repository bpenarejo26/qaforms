<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("branders",$conn);
$_SERVER["REQUEST_METHOD"] == "POST";
$d1 = $_GET['d1'];
$d2 = $_GET['d2'];
$manager = $_GET['manager'];

$filename = "BEL_USA_QA_Formv2.csv";
$fp = fopen('php://output', 'w');

$header =array("TransNo", "Order_Number", "Imprint_Method", "Associate", "Checker", "Team", "Date", "Accuracy", "R1", "R2", "R3", "R4", "R5", "R6", "R7", "I1", "I2", "I3", "I4", "A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8", "P1", "P2", "P3", "P4", "P5", "P6", "P7", "U1", "U2", "U3", "U4", "U5", "PO1", "PO2", "Notes");
$Data = count($header);

for($x = 0; $x < $Data; $x++) {
    echo $Data[$x];
  
	
}	
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

$num_column = count($header);		
//$query = "SELECT `TransNo`, `ORNo`, `Assoc`, `Manager`, `Checker`, `EvalDate`, `Accuracy`, `CustIns`, `OveRep`, `TexSiz`, `PosNeg`, `Size`, `Loca`, `Colo`, `ArtOrd`, `AdjArt`, `MocUp`, `ArtSiz`, `TemLay`, `OrdDet`, `ImpSiz`, `ArtBox`, `MocBox`, `UplFil`, `BacSli`, `Und`, `SVG`, `UplPro`, `AddNote`,  `TransID`, `EDate`FROM `qualitycheck` WHERE EvalDate BETWEEN '$d1' and '$d2'";
$sql = "SELECT `TransNo`, `Order_Number`, `Imprint_Method`, `Associate`, `Checker`, `Team`, `Date`, `Accuracy`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `I1`, `I2`, `I3`, `I4`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `F1`, `F2`, `F3`, `F4`, `F5`, `F6`, `F7`, `F8`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `U1`, `U2`, `U3`, `U4`, `U5`, `PO1`, `PO2`, `Notes` FROM `qc` WHERE Date BETWEEN '$d1' and '$d2' and Team = '$manager'";

$result = mysql_query($sql);
while($row = mysql_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>
