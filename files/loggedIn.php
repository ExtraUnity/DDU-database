<head>
	<?php include "checkSession.php"; ?>
	<?php include "dbConnect.php"; ?>
</head>
<body>

	 <h1>You are now logged in! Welcome to the library</h1>

	 <form action="" method="POST">
	 	<label for="searchTitle">Search for a book title:</label><br>
	 	<input type="text" name="searchTitle"><br>
	 	<label for="searchAuthor">Or search for books made by an author</label> <br>
	 	<input type="text" name="searchAuthor">
	 	<input type="submit" name="search">
	 </form>
	 <?php 
	 	if(isset($_POST['searchTitle']) && $_POST['searchTitle'] != NULL) {
	 		$title = $_POST['searchTitle'];

	 		$sql = "SELECT * FROM book WHERE Title='$title'";

			$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

			while ($row = mysqli_fetch_array($result)) {
    echo $row['Title']; 
    echo "<br>";
}
	 	} else if(isset($_POST['searchAuthor']) && $_POST['searchAuthor'] != NULL) {

	 		$author = $_POST['searchAuthor'];

	 		$sql = "SELECT * FROM book WHERE Author='$author'";

			$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

			while ($row = mysqli_fetch_array($result)) {
    echo $row['Title']; 
    echo "<br>";
	 	}
	 }
	  ?>
	 <button>
	 	<a href="logout.php">Logout</a> 
	 </button>

</body>
