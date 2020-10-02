<head>
	<?php include "checkSession.php"; ?>
	<?php include "dbConnect.php"; ?>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
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

	<h1 id="title">
	Welcome to your book list.
	</h1>
	<h2 id="title">
	See and return books your books. 
	</h2>
<div id="bookList" style="padding-top: 10px;">
	<?php
	$student = $_SESSION['studentId'];
	$sql = "SELECT Title, Author, BookId FROM book WHERE StudentId ='$student'";

	$result = mysqli_query($dbConnect, $sql);
	//echo $result;



	while ($row = mysqli_fetch_array($result)) {
    		echo $row['Title'] . " by " . $row['Author'];
        	echo "<form action='' method='POST' style='display: inline;'><input type='submit' name='" . $row['BookId'] . "' value='Return Book' class='small_button'></form>";
    	echo "<br><br>";
}
	?>	
	</div>
	<br>
	<div style="margin-left: 45%; ">
		<a href="loggedIn.php" class="link">Go back</a>
	</div>

</body>

