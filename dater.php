<!doctype html>
<html>
<head>
<style>
       
.fit {
  max-width: 100%;
  max-height: 100%;
}
.center {
  display: block;
  margin-top: 0.01em;
}
table {
	font-size: 14px;
	line-height: 24px;
	margin: 0.01em auto;
	text-align: left;
}

</style>
<form name ="date-picker" method="POST" action = "report.php"/>
<meta charset="utf-8">
<title>BEL USA - Manila QA Form</title>
</head>

<body>
<table width="30%" border="0">
  <tbody>
    <tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-01.jpg" > </th>
    </tr>
    <tr>
      <th width="30%" scope="row">Date From</th>
      <td width="70%"><input type = "date" name = "from" /> </td>
    </tr>
    <tr>
      <th scope="row">Date To</th>
      <td><input type = "date" name = "to" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th> 
      <td><input type = "submit" name ="search" value = "Generate"/></td>
    </tr>
	<tr>
      <th height="100" colspan="2" scope="col"><img  class = "center fit" src="1-02.jpg" > </th>
    </tr>
  </tbody>
</table>

</form>
</body>
</html>
