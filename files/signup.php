<head>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
	<?php 
	include 'dbConnect.php';
		if(isset($_POST['submit'])) {


			if(!$dbConnect) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$newFirstName = $_POST['firstName'];
			$newLastName = $_POST['lastName'];
			$newClass = $_POST['class'];
			$newUsername = $_POST['username'];
			$newPassword = $_POST['password'];
			//we have now stored the new users information in some variables

                        $newFirstName =  mysqli_real_escape_string($dbConnect, $newFirstName);
                        $newLastName =  mysqli_real_escape_string($dbConnect, $newLastName);
                        $newClass =  mysqli_real_escape_string($dbConnect, $newClass);
                        $newUsername = mysqli_real_escape_string($dbConnect, $newUsername);
                        $newPassword =  mysqli_real_escape_string($dbConnect, $newPassword);
			// TODO: make the remaining 4. 
 

			$newPassword = sha1($newPassword);
			//The password has been hashed
			$sql = "INSERT INTO student (`FirstName`, `LastName`, `Class`, `Username`, `Password`) VALUES ('$newFirstName', '$newLastName', '$newClass', '$newUsername', '$newPassword')";

			header("Location: index.php");
		}
	 ?>
	<form method="post" action="" id="form">
		<label for="firstName">First Name:</label><br>
		<input type="text" name="firstName" required><br><br>
		<label for="lastName">Last Name:</label><br>
		<input type="text" name="lastName" required><br><br>
		<label for="class">Class:</label><br>
		<input type="text" name="class"><br><br>
		<label for="username">Username:</label><br>
		<input type="text" name="username" required> <br><br>
		<label for="password">Password:</label><br>
		<input type="password" name="password" required> <br><br>
		<div class="form_buttons">
		<input type="submit" name="submit" class="link">
	<a href="index.php" class="link">Back</a>
	</div>
	</form>
</body>
