<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ecole');

	// initialize variables
	$nom = "";
	$prenom = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];

		mysqli_query($db, "INSERT INTO eleves (nom, prenom) VALUES ('$nom', '$prenom')"); 
		$_SESSION['message'] = "prenom saved"; 
		header('location: index.php');
	}
	
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
	
		mysqli_query($db, "UPDATE eleves SET nom='$nom', prenom='$prenom' WHERE id=$id");
		$_SESSION['message'] = "prenom updated!"; 
		header('location: index.php');
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM eleves WHERE id=$id");
		$_SESSION['message'] = "prenom deleted!"; 
		header('location: index.php');
	}
  
   
    ?>

