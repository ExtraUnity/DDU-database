<head></head>
<body>
	<?php 
		include "dbConnect.php";
		session_start();
		if(isset($_SESSION['user'])) {
	header("Location: loggedIn.php");
}
		if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = sha1($password);// converts the password string to new string via SHA1. This is not safe.

		$sql = "SELECT * FROM student WHERE Username='$username' AND Password='$password'";

		$result = mysqli_query($dbConnect,$sql);

		if(mysqli_num_rows($result)>0) {
			$_SESSION['user'] = $username;
			$row = mysqli_fetch_array($result);
			$_SESSION['isAdmin'] = $row['IsAdmin'];
			$_SESSION['studentId'] = $row['StudentId'];
			header("Location: loggedIn.php");
		} else {
			echo "wrong username or password";
		}

		}
	 ?>
	<form action="" method="post">
		<label for="username">Username:</label><br>
		<input type="text" name="username"> <br><br>
		<label for="password">Password:</label><br>
		<input type="password" name="password"> <br><br>
		<input type="submit" name="submit">
		<button>
	<a href="index.php">Back</a>
</button>
	</form>
</body>
