<head> 
	<?php include "checkSession.php"; ?>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
<?php
include 'dbConnect.php';
if($_SESSION['isAdmin'] != 1) {
	header("Location: loggedIn.php");
}
		if(isset($_POST['submit'])) {


			if(!$dbConnect) {
				die("CreatedBook failed: " . mysqli_connect_error());
			}
			$newTitle = $_POST['title'];
			$newAuthor = $_POST['author'];

			$newTitle = mysqli_real_escape_string($dbConnect, $newTitle);
			$newAuthor =  mysqli_real_escape_string($dbConnect, $newAuthor);
			// removes injections for the user inputs.

			//we have now stored the new book information in some variables
			$sql = "INSERT INTO book (`Title`, `Author`) VALUES ('$newTitle', '$newAuthor')";

			if (mysqli_query($dbConnect, $sql)) {
 				echo "New book added successfully";
			} else {
 				 echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
			}
		}
?>
	<form method="post" action="" id="form">
		<label for="title">Title:</label><br>
		<input type="text" name="title" required><br><br>
		<label for="author">Author:</label><br>
		<input type="text" name="author" required><br><br>
		<div class="form_buttons">
		<input type="submit" name="submit" class="link">
		<a href="loggedIn.php" class="link">Back</a>
		</div>
		</form>
</body>
