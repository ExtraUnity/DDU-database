<head></head>
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
			$newPassword = sha1($newPassword);
			$sql = "INSERT INTO student (`FirstName`, `LastName`, `Class`, `Username`, `Password`) VALUES ('$newFirstName', '$newLastName', '$newClass', '$newUsername', '$newPassword')";

			if (mysqli_query($dbConnect, $sql)) {
 				echo "New record created successfully";
			} else {
 				 echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
			}


		}
	 ?>
	<form method="post" action="">
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
		<input type="submit" name="submit">
	 <button>
	<a href="index.php">Back</a>
</button>
	</form>
</body>
