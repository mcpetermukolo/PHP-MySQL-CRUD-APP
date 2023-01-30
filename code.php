<?php 
	session_start();

	define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS' ,'');
    define('DB_NAME', 'bkcrud');
    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
   if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }


	// initialize variables
	$Title = "";
	$Author = "";
	$Subject = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$Title = $_POST['Title'];
		$Author = $_POST['Author'];
		$Subject = $_POST['Subject'];

		mysqli_query($db, "INSERT INTO crud (Title, Author, Subject) VALUES ('$Title', '$Author','$Subject')"); 
		$_SESSION['message'] = "Book saved"; 
		header('location: index.php');
	}
	if (isset($_POST['update'])) {
	    $id = $_POST['id'];	
	    $Title = $_POST['Title'];
	    $Author = $_POST['Author'];
	    $Subject = $_POST['Subject'];
    
	    mysqli_query($db, "update crud  set Title='$Title', Author='$Author', Subject='$Subject' where id=$id");
	    $_SESSION['message'] = "Book updated!"; 
	    header('location: index.php');
   }
   if (isset($_GET['delete'])) {
	   $id = $_GET['delete'];
	   mysqli_query($db, "DELETE FROM crud WHERE id=$id");
	   $_SESSION['message'] = "Book deleted!"; 
	   header('location: index.php');
   }
	?>