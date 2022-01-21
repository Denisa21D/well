<?php
session_start();

$con=mysqli_connect("localhost","root","","wellness");
$_SESSION['mess']="";
if (isset($_POST['signin'])) {
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$password=md5($password);
	$q1="select * from Customer where C_email='$email' and C_password='$password'";
	$exe_q1=mysqli_query($con,$q1);

	if (mysqli_num_rows($exe_q1)==1) {
		 // output data of each row
   
       
    
		
		$r= mysqli_fetch_assoc($exe_q1);
		$_SESSION['username']=$email;
		$_SESSION['mess']="";
		
		header("location:Profile.php");
	}
	else{
		$_SESSION['username']="Null";
		$_SESSION['mess']="You are not logged in. Please enter valid email and password!";
		header("location:login_id.php");
	}
}

?>

<!doctype html>
<html>
<head>
<title>LogIn</title>
<style >
	<?php include 'login_id.css';    ?>
</style>


</head>

<body >

	<div id="logo">
			<a href="index.php" id="logoLink"><img src="images/new2.png" width="80" height="30" alt="iLand" /></a>
		</div>

<div class="loginBox">
<a href="index.php"><img src="images/new.png" width="80" height="30" class="user"></a>
<h2>Customer Login</h2>
<form method="post" action="login_id.php">
<p>Email</p>
<input type="text" name="email" placeholder="Email address" id="email" autofocus>
<p>Password</p>
<input type="Password" name="password" placeholder="Password">
<center><a Style="color:#12C05B" href="forgot.html">Forget Password?</a></center><br>

<input type="submit" name="signin" value="LOGIN" /><span>"<?php echo $_SESSION['mess'] ?>"</span>
<center><p>Don't have an account?<a  Style="color:#12C05B" href="sign_up.php">Signup here</a></p></center>


</form>
</div>
</body>
</html>