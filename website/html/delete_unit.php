<?php 
 session_start();
 if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 

if(isset($_GET['id_module'])){
	$code = $_GET['id_module'];
	require('templates/config.php');
	$sql = "DELETE FROM modules WHERE id_module ='$code' ;";
	$sql2 ="DELETE FROM etudiant_module WHERE id_module = '$code';";
	$sql3 = "DELETE FROM professeur_module WHERE id_module ='$code' ;";		

	(mysqli_query($conn,$sql3) and mysqli_query($conn,$sql) and mysqli_query($conn,$sql2))  or die("Unable to delete unit");
	header('Location: index.php');
	mysqli_close($conn);

}
}else {
	header("Location: index.php");
   }
 ?>