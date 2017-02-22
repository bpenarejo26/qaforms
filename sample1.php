<?php
$conn = mysql_connect("localhost","itsupport","Fic5#w0F");
mysql_select_db("branders",$conn);
$_SERVER["REQUEST_METHOD"] == "POST";
$d1 = $_GET['d1'];
$d2 = $_GET['d2'];
$artist = $_GET['artist'];
//echo $d1;
//echo $d2;
$filename = "BEL_USA_QA_Form_v2.csv";
$fp = fopen('php://output', 'w');


<<<<<<< HEAD
$header = array("TransNo", "Order_Number", "Imprint_Method","Item_Category", "Associate", "Checker", "Team", "Date", "Accuracy", "R1", "I1", "I2", "I3", "I4", "A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8", "P1", "P2", "P3", "P4", "P5", "P6", "P7", "U1", "U2", "U3", "U4", "U5", "PO1", "PO2", "Notes");
=======
$header = array("TransNo", "Order_Number", "Imprint_Method", "Associate", "Checker", "Team", "Date", "Accuracy", "R1","I1", "I2", "I3", "I4", "A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8", "P1", "P2", "P3", "P4", "P5", "P6", "P7", "U1", "U2", "U3", "U4", "U5", "PO1", "PO2", "Notes");
>>>>>>> 3c569c1d5331d718b3afe2b91a20b7649173011c
$Data = count($header);

for($x = 0; $x < $Data; $x++) {
    echo $Data[$x];
  
	
}	
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

$num_column = count($header);		
//$query = "SELECT "TransNo", "ORNo", "Assoc", "Manager", "Checker", "EvalDate", "Accuracy", "CustIns", "OveRep", "TexSiz", "PosNeg", "Size", "Loca", "Colo", "ArtOrd", "AdjArt", "MocUp", "ArtSiz", "TemLay", "OrdDet", "ImpSiz", "ArtBox", "MocBox", "UplFil", "BacSli", "Und", "SVG", "UplPro", "AddNote",  "TransID", "EDate"FROM "qualitycheck" WHERE EvalDate BETWEEN '$d1' and '$d2'";
<<<<<<< HEAD
$query = "SELECT `TransNo`, `Order_Number`, `Imprint_Method`, `Item_Category`,`Associate`, `Checker`,`Team`, `Date`, `Accuracy`, `R1`,`I1`, `I2`, `I3`, `I4`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `F1`, `F2`, `F3`, `F4`, `F5`, `F6`, `F7`, `F8`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `U1`, `U2`, `U3`, `U4`, `U5`, `PO1`, `PO2`, `Notes` FROM `qc` WHERE Date BETWEEN '$d1' and '$d2' and Associate = '$artist' ";
=======
$query = "SELECT `TransNo`, `Order_Number`, `Imprint_Method`, `Associate`, `Checker`,`Team`, `Date`, `Accuracy`, `R1`, `I1`, `I2`, `I3`, `I4`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `F1`, `F2`, `F3`, `F4`, `F5`, `F6`, `F7`, `F8`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `U1`, `U2`, `U3`, `U4`, `U5`, `PO1`, `PO2`, `Notes` FROM `qc` WHERE Date BETWEEN '$d1' and '$d2' and Assoc = '$artist' ";
>>>>>>> 3c569c1d5331d718b3afe2b91a20b7649173011c
$result = mysql_query($query);
while($row = mysql_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>
