<?php
session_start();
$con=mysqli_connect("localhost","root","","wellness");
$firstName=$lastName=$email=$mobileNum=$password=$repassword="";
$firstErr=$lastErr=$emailErr=$mobileErr=$passwordErr=$repasswordErr="";
$error=false;
$_SESSION["mess"];
// Check connection
// Check connection
if (!$con) {
	$_SESSION['mess']="Connection failed" . mysqli_connect_error();
	header("location:index.php");
    die("Connection failed: " . mysqli_connect_error());
	
}
echo "Connected successfully";


if(isset($_POST['signup'])){
  
	/* for first name validation  */
   if(empty($_POST['first'])){
    $error=true;
      $firstErr="First name is required!";
   }
   elseif (strlen($_POST['first'])<3) {
     $error=true;
       	$firstErr="First name length must be three char!";
       }    
       else if (!preg_match("/^[a-z A-Z]*$/", $_POST['first'])) {
         $error=true;
       	$firstErr="First name must be alphabatic!";
       }
       else{
       	$firstName=dataCleaner($_POST['first']);
       }

             /* for last name validation  */
         if(empty($_POST['last'])){
           $error=true;
      $lastErr="Last name is required!";
   }
   elseif (strlen($_POST['last'])<3) {
     $error=true;
       	$lastErr="Last name length must be three char!";
       }    
       else if (!preg_match("/^[a-z A-Z 0-9 ,_]*$/", $_POST['last'])) {
         $error=true;
       	$lastErr="Last name must be alphabatic!";
       }
       else{
        
       	$lastName=dataCleaner($_POST['last']);
       }

       /* for email validation  */
       if(empty($_POST['email'])){
         $error=true;
       	$emailErr="Email is required!";
       }
       else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
         $error=true;
       	$emailErr="Invalid email format!";
       }
       else{
         
       	$email=dataCleaner($_POST['email']);
       }

       /* for mobile number validation  */
        if(empty($_POST['number'])){
          
          $mobileNum="";
        }
        else if (strlen($_POST['number'])<12) {
           $error=true;
        	$mobileErr="Invalid number size!".strlen($_POST['number']);
        }
        else if (!preg_match("/^[+0-9]*$/", $_POST['number'])) {
           $error=true;
        	$mobileErr="Invalid number format!";
        }
        else{
    
        	$mobileNum=dataCleaner($_POST['number']);
        }

        /* for password validation  */
          if (empty($_POST['pass'])) {
             $error=true;
          	$passwordErr="Password is required!";
          }
          else if (strlen($_POST['pass'])<8 || strlen($_POST['pass'])>12) {
             $error=true;
          	$passwordErr="Password must be 8-12 characters!";
          }
          else if (!preg_match("/^[a-zA-Z0-9!@#$%^&*(){}]*$/", $_POST['pass'])) {
             $error=true;
          	$passwordErr="Password must be alphabatic, numeric and special chars!";
          }
          else {
        
           $password=dataCleaner($_POST['pass']);
          }

          /* for Repassword validation  */
             if (empty($_POST['repass'])) {
               $error=true;
          	$repasswordErr="Repassword is required!";
          }
          else if (strlen($_POST['repass'])<8 || strlen($_POST['repass'])>12) {
             $error=true;
          	$repasswordErr="Repassword must be 8-12 characters!";
          }
          else if (!preg_match("/^[a-zA-Z0-9!@#$%^&*(){}]*$/", $_POST['repass'])) {
             $error=true;
          	$repasswordErr="Repassword must be alphabatic, numeric and special chars!";
          }
          else if($_POST['repass'] != $_POST['pass']){
             $error=true;
            $repasswordErr="Password are not matched!";
          }
          else {
          
           $repassword=dataCleaner($_POST['repass']);
          }

          
            if(!$error){ 
  $password=md5($password);

  
  $link = mysqli_connect("localhost", "root", "", "wellness");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "insert into Customer (C_name,C_Address,C_email,C_phone,C_password) VALUES (?, ?, ?, ?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $mobileNum, $password);
    
   
    mysqli_stmt_execute($stmt);
   
    
    $_SESSION['mess'] = "Records inserted successfully.";
} else{
    $_SESSION['mess'] = "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}
 
// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);
  
  
  
  $_SESSION['username']=$firstName;
  $_SESSION['mess']="Now You are successfully registered.";
  header("location:login_id.php");
  
  
  
}
else{
  $_SESSION['username']=null;
  $_SESSION['mess']="insert into Customer(C_name,C_Address,C_email,C_phone,C_password) values('$firstName','$lastName','$email','$mobileNum','$password')";
  //header("location:index.php");
}
                  

}


function dataCleaner($var){
$var=trim($var);
$var=stripslashes($var);
$var=htmlspecialchars($var);
return $var;
}

?>

<!doctype html>
<html>
<head>
<title>Signup</title>
<link rel="stylesheet" href="signup.css">
<style >
	<?php include 'signup.css';    ?>
</style>
</head>

<body onload="document.getElementById('First').focus();">

<div id="logo_div">
  &nbsp &nbsp	<a href="index.php"><img src="images/new2.png" width="80" height="30" alt="iLand"   /></a>
</div>
<div class="SignupBox">
<a href="index.php"><img src="images/logo2.jpg" class="user"></a>
<h2>REGISTER</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<input type="text" id="First" name="first" placeholder="First Name..." value="<?php echo $firstName;?>">
<span id="e1" style ="color:red"><?php  echo $firstErr; ?> </span>

<input type="text" id="email" name="email"  placeholder="Email address..." value="<?php echo $email;?>">
<span id="e3" style ="color:red"><?php echo $emailErr; ?></span>

<input type="text" id="number" name="number" placeholder="Mobile Number..." value="<?php echo $mobileNum;?>">
<span id="e4" style ="color:red"><?php echo $mobileErr; ?></span>


<input type="text" id="Last" name="last"  placeholder="Address..." value="<?php echo $lastName;?>">
<span id="e2" style ="color:red"><?php echo $lastErr; ?></span>

<input type="password" id="Pass" name="pass"  placeholder="Password..." value="<?php echo $password;?>">
<span id="e5" style ="color:red"><?php echo $passwordErr; ?></span>

<input type="password" id="Passc" name="repass"  placeholder="Retype Password..." value="<?php echo $repassword;?>">
<span id="e6" style ="color:red"><?php echo $repasswordErr; ?></span>


<input type="submit" name="signup"  value="REGISTER"><span style="color:White">"<?php echo $_SESSION["mess"]?>"</span>
<center><p>You have an account?<a  Style="color:#12C05B" href="login_id.php">Login</a></style></p></center>


</form>
</div>
</body>
</html>