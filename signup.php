<!DOCTYPE html>
<html>
<head>
	<style>
	.error {color: #FF0000;}
	</style>
	<title>Sign Up</title>
</head>
<body>
	<?php
	
	$firstnameErr = $secondnameErr = $emailErr = $dobErr = $favcolErr = $genderErr = $deptErr = $passErr = "";
	$firstname = $secondname = $email = $dob = $favcol = $gender = $dept = $pass = "";

	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $pass);
	$specialChars = preg_match('@[^\w]@', $pass);

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if (empty($_POST["firstname"])) 
		{
			$firstnameErr = "First name is required";
		}else{
			echo $firstname = test_input($_POST["firstname"]);
			if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) 
			{
				$firstnameErr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["secondname"])) 
		{
			$secondnameErr = "Second name is required";
		}else{
			echo $secondname = test_input($_POST["secondname"]);
			if (!preg_match("/^[a-zA-Z ]*$/", $secondname)) 
			{
				$secondnameErr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["email"])) 
		{
			$emailErr = "E-Mail is required";
		}else{
			echo $email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				$emailErr = "Invalid Email format";
			}
		}

		if (empty($_POST["dob"])) 
		{
			$dobErr = "Date of Birth is required";
		}else{
			echo $dob = test_input($_POST["dob"]);
			//add code to enter only date is current year.
		}

		if (empty($_POST["favcol"])) 
		{
			$favcolErr = "Favorite color is required";
		}else{
			echo $favcol = test_input($_POST["favcol"]);
		}

		if (empty($_POST["gender"])) 
		{
			$genderErr = "Please check a gender";
		}else{
			echo $gender = test_input($_POST["gender"]);
		}

		if (empty($_POST["dept"])) 
		{
			$deptErr = "You must select a Department";
		}else{
			echo $dept = test_input($_POST["dept"]);
		}

		if (empty($_POST["pass"])) 
		{
			$passErr = "Password is required"; 
		}else{
			$pass = test_input($_POST["pass"]);
			if (!$uppercase || $lowercase || $numbers || $specialChars || strlen($pass) <= 15) 
			{
				$passErr = "Password should be at least 15 characters in length and should include at least one upper case letter, one number, and one special character";
			}

			 $strip= str_replace("#", "", $favcol); //removing # from our rgb colours

			 header("Location: details.php?firstname=$firstname&secondname=$secondname&email=$email&dob=$dob&favcol=$strip&gender=$gender&dept=$dept");
	}
}
	function test_input($data) 
	{
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	} 
	?>
<fieldset>
	<legend>User Sign Up</legend>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="firstname">
			First Name <br>
			<input type="text" name="firstname" value="<?php echo $firstname; ?>"><span class="error">*<?php echo $firstnameErr; ?></span><br><br>
		</label>
		<label for="secondname">
			Second Name <br>
			<input type="text" name="secondname" value="<?php echo $secondname; ?>"><span class="error">*<?php echo $secondnameErr; ?></span><br><br>
		</label>
		<label for="email">
			E-Mail<br>
			<input type="text" name="email" value="<?php echo $email; ?>"><span class="error">*<?php echo $emailErr; ?></span><br><br>
		</label>
		<label for="dob">
			Date of Birth
			<input type="date" name="dob"><br><br>
		</label>
		<label for="favcol"><br>
			Favorite Color
			<input type="color" name="favcol"><br><br>
		</label>
		<label for="gender">
			Gender<br>
			<input type="checkbox" name="gender" onclick="onlyOne(this)" <?php if(isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
			<input type="checkbox" name="gender" onclick="onlyOne(this)" <?php if(isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
			<input type="checkbox" name="gender" onclick="onlyOne(this)" <?php if(isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other(Please specify here)<span class="error">* <?php echo $genderErr; ?></span><br><br>
		</label>
		<label for="dept">
			Department
			<select id="dept" name="dept">
				<option value="IT">IT</option>
				<option value="HR">HR</option>
				<option value="STUFF">STUFF</option>
			</select>
		</label><br><br>
		<label for="pass">
			Password<span title=" A strong password should have at least 15 characters, uppercase and lowercase letters, and numbers such as(`!?$%^&*() _ -+={ [ ]} : ; @ ' ' ~ # | \ < , > . ? /) etc ">[hint]</span><br>
			<input type="password" name="pass"><br><br>
		</label>
		<label for="submit">
			<input type="submit" name="submit" value="Sign-Up">
		</label>
	</form>
</fieldset>
<script type="text/javascript">	
	function onlyOne(checkbox) 
	{
    var checkboxes = document.getElementsByName('gender');
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
     });
    }
</script>
</body>
</html>