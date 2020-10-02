<head>
	<?php include "dbConnect.php" ?>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
	<?php
	if($_SESSION['isAdmin'] != 1) {
	header("Location: loggedIn.php");
}
		if(isset($_POST['yes'])) {
			$sql1 = "DROP TABLE student";
			$sql2 = "DROP TABLE book";
			$result = mysqli_query($dbConnect, $sql1, $sql2);
			header("Location: loggedIn.php");
		} else if (isset($_POST['no'])) {
			header("Location: loggedIn.php");
		}
	?>
<h2>
Are you sure you want to reset all students and books from HCØL library?
</h2>
<form action="" method="POST">
	<input type="submit" name="yes" value="Yes" class="small_button">
	<input type="submit" name="no" value="No" class="small_button">
</form>
</body>