<head>
	<?php include "dbConnect.php" ?>
</head>
<body>
	<?php
		if(isset($_POST['yes'])) {
			$sql = "DROP TABLE student";
			$result = mysqli_query($dbConnect, $sql);
			header("Location: loggedIn.php");
		}
	?>
<h2>
Are you sure you want to reset HCØL library?
</h2>
<form action="" method="POST">
	<input type="submit" name="yes" value="Yes">
</form>
	<a href="loggedIn.php">No</a>
</button>
</button>
</body>