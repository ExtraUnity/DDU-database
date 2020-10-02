<head>
	<?php include "dbConnect.php"; 
	include "checkSession.php"?>
</head>
<body>
	<?php
		if(isset($_POST['yes'])) {
			$sql1 = "DROP TABLE student, book";
			$result = mysqli_query($dbConnect, $sql1);
			header("Location: loggedIn.php");
		} else if (isset($_POST['no'])) {
			header("Location: loggedIn.php");
		}
	?>
<h2>
Are you sure you want to reset all students and books from HCØL library?
</h2>
<form action="" method="POST">
	<input type="submit" name="yes" value="Yes">
	<input type="submit" name="no" value="No">
</form>
</body>