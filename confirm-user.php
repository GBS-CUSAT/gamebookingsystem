<html>
<head>
<title>Pending Users</title>
<style type="text/css">
<?php
$css = file_get_contents('C:\xampp\htdocs\confirm-user.css');
echo $css;
?>
</style>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
</head>
<body>
<div class="header">
PENDING USERS
</div>
<div class="main">
Requests
<?php
$i=0;
$is_admin=0;
$empid=0;
include('connect-mysql.php');
$sqlget = "SELECT * FROM employees WHERE is_active=0";
$sqldata = mysqli_query($dbcon, $sqlget) or die('error displaying data');
echo "<table>";
echo "<tr><th>EMPLOYEE ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>DOB</th><th>PHONE NUMBER</th><th>EMAIL-ID</th><th>ADMIN</th><th>ACCEPT</th></tr>";
while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
echo "<tr><td>";
$empid = $row['emp_id'];
echo $empid;
echo "</td><td>";
echo $row['fname'];
echo "</td><td>";
echo $row['lname'];
echo "</td><td>";
echo $row['dob'];
echo "</td><td>";
echo $row['phone'];
echo "</td><td>";
echo $row['email_id'];
echo "</td><td>";
$is_admin=$row['is_admin'];
if($is_admin==0)
{echo 'NO';
}else
{echo 'YES';
}
echo "</td><td>";
echo "<form action=\"confirm-user.php\" method=\"POST\">";
echo "<input type = \"hidden\" name=\"submitted\" value=\"true\">";
echo "</input>";
echo "<input type=\"checkbox\" name=\"submitc[]\" method=\"POST\" value=\"$empid\" >";
echo "</td></tr>";
}//end of while statement
echo "</table>";
echo "<br>";
echo "<input type=\"submit\" value=\"accept selected\">";
?>
<?php
if(isset($_POST['submitc'])) {
$name=$_POST['submitc'];
foreach ($name as $key) {
$sqlinstert="UPDATE employees SET is_active=1 where emp_id=$key";
if(!mysqli_query($dbcon,$sqlinstert)){
die('error');
}
}
}
?>
</div>
<div class="footer"></div>
</body>
</html>
