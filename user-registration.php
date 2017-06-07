<?php
$newrec='';
if (isset($_POST['submitted']) && isset($_POST['terms'])) {
    include('connect-mysql.php');
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $emailid=$_POST['emailid'];
    $empid=$_POST['empid'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $password=md5($_POST['password']);
    if($_POST['isadmin']=='on')
        {$isadmin=1;
        }
    else {
        $isadmin=0;
    }
    $sqlinsert="INSERT INTO employees (fname,lname,emp_id,dob,phone,email_id,password,is_admin) VALUES ('$fname','$lname','$empid','$dob','$phone','$emailid','$password','$isadmin')";

if(!mysqli_query($dbcon, $sqlinsert)){
    die('error');
}
$newrec = "request sumbitted";

}
?>
<DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>registration</title>
<link rel="stylesheet" type="text/css" href="user-registration.css" />
</head>
<body>

<div class="header">
    <div class="logo" style="float: left;">
    GAME BOOKING SYSTEM
    </div>
    
        <div class="login" style="float: right;">
        <ul>
        <form action="">
        <li>
        Employee id/E-mail id<br>
        <input type="text" name="name"></li> 
        <li>Password<br>
        <input type="password" name="password"/></li>
        <li><input type="submit" name="signup"></li>
        </form>
        <a href="">Forgot Password</a>
        </ul>
        </div>
        
</div>



<div class="signup">
<form method="post" action="user-registration.php">
<input type="hidden" name="submitted" value="true">
<br>
First Name<br>
<input type="text" name="fname"><br>
Last Name<br>
<input type="text" name="lname"><br>
E-mail<br>
<input type="email" name="emailid"><br>
Date of birth<br>
<input type="date" name="dob"><br>
Employee id<br>
<input type="number" name="empid"><br>
Mobile<br>
<input type="number" name="phone"><br>
Password<br>
<input type="password" name="password"><br>
Retype-Password<br>
<input type="password" name="password"><br><br>
<input type="checkbox" name="terms" /><br>
Admin<br><br>
<input type="checkbox" name="isadmin" /><br>
I agree to the <a href="#" ><font color="#000000">terms &amp; conditions</font></a><br><br>                  
<button type="submit"  value="submit" name="submit">Register</button>
<?php
echo "$newrec";
?>
</form>
</div>

<div class="footer">
</div>
</body>
</html>
                  
