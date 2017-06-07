<?php
$newrecord="";
if(isset($_POST['submitted'])) {


	include('connect-mysql.php');
	$venue = $_POST['venue'];
	$duration = $_POST['duration'];
	$strength = $_POST['strength'];
	$description = $_POST['description'];

	if($venue != 'venue' && $duration != 0 && $strength != 0 && $description != null  ){
	$sqlinsert = "INSERT INTO venues (venue_name,duration,strength,description) VALUES ('$venue','$duration','$strength','$description')";
	if (!mysqli_query($dbcon, $sqlinsert)){
    die('error inserting new record');
    } // end of nested if statement
    echo "record inserted";
    header("location:venue-creation.php");
    exit;
}
	else {
		echo "all fields required";
}



}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Venue Creation</title>
	<style type="text/css">
	<?php
     $css = file_get_contents('C:\xampp\htdocs\venue-creation.css');
     echo $css;
     ?>
    </style>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
</head>
<body>
<div class="header">
Venue Creation
</div>
<div class="main">
<div class="formdiv">
<form action="venue-creation.php" method="post">
<input type="hidden" name="submitted" value="true"/>
<fieldset class="fieldset">
	<legend id="head">Add A New Venue</legend>
	Venue:<br>
	<input type="text" name="venue" value="venue" onfocus="if (this.value=='venue') this.value='';"><br><br>
	Duration:<br>
	<input type="number" name="duration" value="duration" onfocus="if (this.value=='duration') this.value='';"><br><br>
	No. Of Players:<br>
	<input type="number" name="strength" value="strength" onfocus="if (this.value=='strength') this.value='';"><br><br>
	Description:<br>
    <input type="text" name="description" value="description" onfocus="if (this.value=='description') this.value='';"><br><br>
	<button class="button" type="submit" value="add new venue">ADD</button>
</fieldset>
</form>
</div>
</div>
<div class="footer"></div>
</body>
</html>
