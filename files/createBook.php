<head> 
	<?php include "checkSession.php"; ?>
</head>
<body>
<?php
include 'dbConnect.php';
		if(isset($_POST['submit'])) {


			if(!$dbConnect) {
				die("CreatedBook failed: " . mysqli_connect_error());
			}
			$newTitle = $_POST['title'];
			$newAuthor = $_POST['author'];
			//we have now stored the new book information in some variables
			$sql = "INSERT INTO book (`Title`, `Author`) VALUES ('$newTitle', '$newAuthor')";

			if (mysqli_query($dbConnect, $sql)) {
 				echo "New book added successfully";
			} else {
 				 echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
			}
		}
?>
	<form method="post" action="">
		<label for="title">Title:</label><br>
		<input type="text" name="title" required><br><br>
		<label for="author">Author:</label><br>
		<input type="text" name="author" required><br><br>
		<input type="submit" name="submit">
	<button>
	<a href="index.php">Back</a>
</button>
	</form>
</body>