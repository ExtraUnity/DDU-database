<head></head>
<body>
	<?php 
	include 'dbConnect.php';
		if(isset($_POST['submit'])) {


			if(!$dbConnect) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$newFirstname = $_POST['firstname'];
			$newLastname = $_POST['lastname'];
			$newClass = $_POST['class'];
			$newUsername = $_POST['username'];
			$newPassword = $_POST['password'];
			//we have now stored the new users information in some variables
			$sql = "INSERT INTO student (`Firstname`, `Lastname`, `Class`, `Username`, `Password`) VALUES ('$newFirstname', '$newLastname', '$newClass', '$newUsername', '$newPassword')";

			if (mysqli_query($dbConnect, $sql)) {
 				echo "New record created successfully";
			} else {
 				 echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
			}


		}
	 ?>
	<form method="post" action="">
		<label for="firstname">First Name:</label><br>
		<input type="text" name="firstname" required><br><br>
		<label for="lastname">Last Name:</label><br>
		<input type="text" name="lastname" required><br><br>
		<label for="class">Class:</label><br>
		<input type="text" name="class"><br><br>
		<label for="username">Username:</label><br>
		<input type="text" name="username" required> <br><br>
		<label for="password">Password:</label><br>
		<input type="password" name="password" required> <br><br>
		<input type="submit" name="submit">
	</form>
</body>