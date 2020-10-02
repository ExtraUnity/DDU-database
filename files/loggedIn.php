<head>
	<?php include "checkSession.php"; ?>
	<?php include "dbConnect.php"; ?>
</head>
<body>
        <?php
        	//echo "this";
        	if(isset($_POST['listAllBooks'])){
        	echo "Hi";
         	$sql = "SELECT * FROM book";

         	$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

                	while ($row = mysqli_fetch_array($result)) {
                        	$title = mysqli_real_escape_string($dbConnect, $row['Title']);
                        	$author = mysqli_real_escape_string($dbConnect, $row['Author']);

                        	echo $title . " by " . $author;
                        	if($row['StudentId'] != NULL){
                                	echo "Udlånt";
                        	}
                        	echo "<br>";

                	}
                }
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach ($_POST as $name => $value) {
				$student = $_SESSION['studentId'];
				$sql = "UPDATE book SET StudentId='$student' WHERE BookId='$name' AND StudentId IS NULL";

				$result = mysqli_query($dbConnect,$sql);
			}
		}
	?>
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
			$title = mysqli_real_escape_string($dbConnect, $title);


	 		$sql = "SELECT * FROM book WHERE Title='$title' AND StudentId IS NULL";

			$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

			while ($row = mysqli_fetch_array($result)) {
    echo $row['Title'] . " by " . $row['Author'];
   	echo "<form action='' method='POST'><input type='submit' name='" . $row['BookId'] . "' value='Loan Book'></form>";
    echo "<br>";
}
	 	} else if(isset($_POST['searchAuthor']) && $_POST['searchAuthor'] != NULL) {

			$author = $_POST['searchAuthor'];
			$author = mysqli_real_escape_string($dbConnect, $author);

	 		$sql = "SELECT * FROM book WHERE Author='$author' AND StudentId IS NULL";

			$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

			while ($row = mysqli_fetch_array($result)) {
    echo $row['Title'] . " by " . $row['Author']; 
       	echo "<form action='' method='POST'><input type='submit' name='" . $row['BookId'] . "' value='Loan Book'></form>";
    echo "<br>";
	 	}
	 }
	?>	

        <form action="" method="POST">
                <input type="submit" name="listAllBooks" value = "List all books">
        </form>

	 <button>
	 	<a href="logout.php">Logout</a> 
	 </button>
	 <button>
		<a href="userBooks.php">Your Books</a>
	</button>

	 <?php 
	 	
	 		if($_SESSION['isAdmin'] == 1) {
	 			echo "<button> <a href='createBook.php'>Add new Book</a></button>";
	 			echo "<button> <a href='reset.php'>Reset library</a></button>";
	 		}
	 	
	  ?>

</body>
