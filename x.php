<!DOCTYPE html>
<html>
<head>
<title>Disable Radio Button in Form Using jQuery</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="css/style.css"/>
<!-- Include JS File Here -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/disable_radio.js"></script>
</head>
<body>
<div class="container">
<div class="main">
<h2>Disable Radio Button in Form Using jQuery</h2>
<form action="#" method="post" id="form">
<label>Enable / Disable Radio Buttons: </label>
<input type="radio" name="first" value="Enable" id="enable">
<span>Enable</span>
<input type="radio" name="first" value="Disable" id="disable" checked>
<span>Disable</span>
<label>Radio Buttons :</label>
<input type="radio" name="second" class="second" value="Radio 1">
<span class="wrap">Radio 1</span>
<input type="radio" name="second" class="second" value="Radio 2">
<span class="wrap">Radio 2</span>
<input type="radio" name="second" class="second" value="Radio 3">
<span class="wrap">Radio 3</span>
</form>
</div>
</div>
</body>
</html>