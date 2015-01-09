<html>
<head><title>New User Registration</title></head>
<body>
	<style>
	#styleTable
	{
		margin-left: 30px;
	}

	</style>
	<center><h3>Please fill in the form below!</h3></center>

	<form method="POST" action="register.php" >
		Username: <input type="text" id="styleTable" name="newusr" placeholder="Enter Username here"><br/> <br/>
		Password: <input type="password" id="styleTable" name="newPwd" placeholder="Enter Password here"><br/> <br/>
		Full Name: <input type="text" id="styleTable" name="newfullname" placeholder="Enter Full Name here"/><br/> <br/>
		E-mail: <input type="email" id="styleTable" name="newEmail" placeholder="Enter Email address here"><br/> <br/>

		<input type="submit" name="newSubmit" value="Register Me!"/>
	</form>
	<br/><br/>

	<?php
	if(isset($_POST['regBtn']))
	{
		echo "Welcome new user!";
	}
	?>
</body>
</html>
