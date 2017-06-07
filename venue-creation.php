<?php
$newrecord="";
if(isset($_POST['submitted'])) {


	include('connect-mysql.php');
	$venue=$_POST['venue'];
	$max_duration=$_POST['max_duration'];
	$strength=$_POST['strength'];
	$start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];
	$is_active=isset($_POST['is_active']);
	$image_path=$_POST['image_path'];

	if($venue!='venue' && $max_duration!=0 && $strength!=0 && $image_path!='image_path'){
	$sqlinsert = "INSERT INTO vanues (venue,max_duration,strength,start_time,end_time,is_active,image_path) VALUES ('$venue','$max_duration','$strength','$start_time','$end_time','$is_active','$image_path')";
	if (!mysqli_query($dbcon,$sqlinsert)){
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
	<input type="Time" name="max_duration" value="max_duration" onfocus="if (this.value=='duration') this.value='';"><br><br>
	No. Of Players:<br>
	<input type="number" name="strength" value="strength" onfocus="if (this.value=='strength') this.value='';"><br><br>
	Start Time:<br>
	<input type="Time" name="start_time" value="start_time" onfocus="if (this.value=='start_time') this.value='';"><br><br>
	End Time:<br>
	<input type="Time" name="end_time" value="end_time" onfocus="if (this.value=='end_time') this.value='';"><br><br>
	Active:<br>
	<input type="checkbox" name="is_active" value="Is_active" onfocus="if (this.value=='is_active') this.value='';"><br><br>
	Image Path:<br>
	<input type="text" name="image_path" value="image_path" onfocus="if (this.value=='image_path') this.value='';"><br><br>
	
    <button class="button" type="submit" value="add new venue">ADD</button>
</fieldset>
</form>
</div>
</div>
<div class="footer"></div>
</body>
</html>
