<head>
	<?php include "checkSession.php"; ?>
	<?php include "dbConnect.php"; ?>
</head>

<body>
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        foreach ($_POST as $name => $value) {                          
                                $sql = "UPDATE book SET StudentId=NULL WHERE BookId='$name'";
                                $result = mysqli_query($dbConnect,$sql);
                        }
                }
        ?>

	<h1>
	Welcome to your book list.
	</h1>
	<h2>
	See and return books your books. 
	</h2>

	<?php
	$student = $_SESSION['studentId'];
	$sql = "SELECT Title, Author, BookId FROM book WHERE StudentId ='$student'";

	$result = mysqli_query($dbConnect, $sql);
	//echo $result;



	while ($row = mysqli_fetch_array($result)) {
    		echo $row['Title'] . " by " . $row['Author'];
        	echo "<form action='' method='POST'><input type='submit' name='" . $row['BookId'] . "' value='Return Book'></form>";
    	echo "<br>";
}
	?>	
	<button>
		<a href="loggedIn.php">Go back</a>
	</button>
</body>

