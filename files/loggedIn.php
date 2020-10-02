<head>
	<?php include "checkSession.php"; ?>
	<?php include "dbConnect.php"; ?>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
        <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach ($_POST as $name => $value) {
				$student = $_SESSION['studentId'];
				$sql = "UPDATE book SET StudentId='$student' WHERE BookId='$name' AND StudentId IS NULL";

				$result = mysqli_query($dbConnect,$sql);
			}
		}
	?>
	 <h1 id="title">You are now logged in! Welcome to the library</h1>

	 <form action="" method="POST" id="form">
	 	<label for="searchTitle">Search for a book title:</label><br>
	 	<input type="text" name="searchTitle"><br>
	 	<label for="searchAuthor">Or search for books made by an author</label> <br>
	 	<input type="text" name="searchAuthor"> <br>
	 	<div class="form_buttons">
	 	<input type="submit" name="search" class="link">
	 	</div>
	 </form
>	 	  <div class="center">
	 	<a href="logout.php" class="link">Logout</a> 
		<a href="userBooks.php" class="link">My Books</a>
		        <form action="" method="POST" style="display: inline;">
                <input type="submit" name="listAllBooks" value = "List all books" class="link">
        </form>
		<?php 
	 	
	 		if($_SESSION['isAdmin'] == 1) {
	 			echo "<a href='createBook.php' class='link'>Add new Book</a>";
	 			echo "<a href='reset.php' class='link'>Reset library</a>";
	 		}
	 	
	  ?>
		</div>
		<div id="bookList">
	 <?php 
	 	if(isset($_POST['searchTitle']) && $_POST['searchTitle'] != NULL) {
	 		$title = $_POST['searchTitle'];
			$title = mysqli_real_escape_string($dbConnect, $title);


	 		$sql = "SELECT * FROM book WHERE Title LIKE '%$title%' AND StudentId IS NULL";

			$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

			while ($row = mysqli_fetch_array($result)) {
    echo $row['Title'] . " by " . $row['Author'];
   	echo "<form action='' method='POST'><input type='submit' name='" . $row['BookId'] . "' value='Loan Book' class='small_button'></form>";
    echo "<br>";
}
	 	} else if(isset($_POST['searchAuthor']) && $_POST['searchAuthor'] != NULL) {

			$author = $_POST['searchAuthor'];
			$author = mysqli_real_escape_string($dbConnect, $author);

	 		$sql = "SELECT * FROM book WHERE Author LIKE '%$author%' AND StudentId IS NULL";

			$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

			while ($row = mysqli_fetch_array($result)) {
    echo $row['Title'] . " by " . $row['Author']; 
       	echo "<form action='' method='POST'><input type='submit' name='" . $row['BookId'] . "' value='Loan Book'></form>";
    echo "<br>";
	 	}
	 } else if(isset($_POST['listAllBooks'])) {
     		$sql = "SELECT * FROM book";
    		$result = mysqli_query($dbConnect,$sql) or die(mysqli_error($dbConnect));

            while ($row = mysqli_fetch_array($result)) {
                    $title = mysqli_real_escape_string($dbConnect, $row['Title']);
                    $author = mysqli_real_escape_string($dbConnect, $row['Author']);

                        echo $row['Title'] . " by " . $row['Author']; 

                    if($row['StudentId'] != NULL){
                            echo " - Not available <br>";
                    } else {
						echo "<form action='' method='POST' id='form' style='border: none;'><input type='submit' name='" . $row['BookId'] . "' value='Loan Book' class='small_button'></form>";
					}
    echo "<br>";
            }
    	}

	  ?>
</div>
</body>
