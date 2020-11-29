<!DOCTYPE HTML>
<html>
<head>

	<link rel="stylesheet" href="signup.css">
	<link rel="stylesheet" href="Home_Page.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.error{
color: red;
}
</style>
</head>
<body>

<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "nursery_db";

	$con =mysqli_connect($server, $user, $password, $db);
	
	if($con){
	?>
		<script>
			alert("connection successful");
		</script>
	<?php
	}
		
	else{
	?>
		<script>
			alert("connection failed");
		</script>
	<?php
	}
?>

<?php

$nameErr = $surnameErr = $emailErr = $passwordErr = $cpasswordErr = "";

if(isset($_POST['submit']))
	{
		$name = mysqli_real_escape_string($con,$_POST['Name']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
		
		//to save the password in a hash value in a table
		$pass = password_hash($password, PASSWORD_BCRYPT);
		$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
		
		//to check wheather email already exisits or not
		$emailquery = " select * from signup where username = '$email' ";
		$query = mysqli_query($con, $emailquery);
		
		$emailcount = mysqli_num_rows($query);
		
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
		{	
			$nameErr = "Only letters and white space allowed";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$emailErr = "Invalid email format";
		}
		else if (!preg_match("/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/",$password)) 
		{
			$passwordErr = "password should be 8 to 20 charecterslong along with at least 1 special charecter and capital letter";
		}
		else
		{
			if($emailcount > 0)
			{	
				$emailErr= "email already exsists";
			}
			else
			{
				if($password !== $cpassword)
				{
					$cpasswordErr = "passwords are not matching ";
				}
				else
				{
					$insertquery = "insert into signup (`name`,`username`,`password`) values('$name','$email','$pass')";
					$iquery = mysqli_query($con, $insertquery);
					if($iquery)
					{
					?>
						<script>
							alert("signup successful");
						</script>
					<?php
					}
								
					else
					{
					?>
						<script>
							alert("signup failed");
						</script>
					<?php	
										
					}	
			
				}	
		
			}
		}
	}
?>

<div class="bgwrap">
		
		<nav class="navbar">
				<img class="logo" src="nursery_logo.jpg" />
		<ul>
			<li><a id="ddnav" href="Home_Page.html">Home</a></li>
			<li><a id="ddnav">Categories</a>
				<div class="sublist1">
					<ul class="subul">
						<li class="subli"><a id="ddnav" href="fruit.html">Fruit Plant</a></li>
						<li class="subli"><a id="ddnav" href="flower1.html">Flower Plant</a></li>
						<li class="subli"><a id="ddnav" href="medicine.html">Medicine Plant</a></li>
					</ul>
				</div>
			</li>
			<li><a id="ddnav" href="Accessories.html">Accessories</a></li>
			<li class="active"><a id="ddnav" href="signup.html">Sign up</a></li>
			<li><a id="ddnav" href="login.html">Login</a></li>
			<li><a id="ddnav" href="contactus.html">contact us</a></li>
			<li><a id="ddnav" href=""><i class="fa fa-facebook"></i> </a></li>
			<li><a id="ddnav" href=""><i class="fa fa-twitter"></i> </a></li>
			<li><a id="ddnav" href=""><i class="fa fa-whatsapp"></i> </a></li>
		</ul>
		</nav>
</div>


<div class="log">

<form name="management" method="post" >

		<center><h2>Sign Up</h2></center><br>

		Name &nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			<input type="text" name="Name" id="txtName" required /><span class="error">* <br> <?php echo $nameErr;?></span><br><br>

		Email &nbsp :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			<input type="text" name="email" id="txtemail" required /> <span class="error">* <br> <?php echo $emailErr;?></span> <br><br>

		Password&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			<input type="password" name="password" id="txtpassword" required /> <span class="error">* <br> <?php echo $passwordErr;?> <span class="error"> <?php echo @$cpasswordErr;?></span></span><br><br>

		Confirm password&nbsp:&nbsp&nbsp 
			<input type="password" name="cpassword" id="txtcpassword" required /> <span class="error">* <br> <?php echo $cpasswordErr;?></span> <br><br>
				
		<center><p class = "OR">OR</p></center>
		<center><p>Already have an account ? <a href = "login.html">Login</a></p></center><br>
				
		<input type="submit" name="submit" value="Submit" />
		<input type="reset" name="cancel" value="Cancel"/><br>

</form>

</div>

<br><br><br><br>
	<div class="foot">
		<footer>
			<p><br><b>Greenwood Nursery copyright&nbsp &#169;2020,&nbsp All Rights Reserved.
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Designed By &nbsp&nbsp&nbsp | &nbsp&nbsp&nbsp Vaishnavi Nagothanekar</b><br><br></p>
		</footer>
		</div>
	
</body>
</html>