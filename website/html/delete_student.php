<?php 

if(isset($_GET['codeE'])){
	$code = $_GET['codeE'];
	require('templates/config.php');
	$sql = "DELETE FROM etudiants WHERE code_etudiant ='$code' ;";
	$sql2 ="DELETE FROM etudiant_module WHERE code_etudiant = '$code';";
	$sql3 = "DELETE FROM utilisateurs WHERE code ='$code' ;";	
	$sql4 ="DELETE FROM etudiant_semestre WHERE code_etudiant = '$code';";

	
	mysqli_query($conn,$sql2) and 
	mysqli_query($conn,$sql3) and 
	mysqli_query($conn,$sql4) and 
	mysqli_query($conn,$sql) or 
	die("Unable to delete student");	
	header('Location: index.php');
	
	mysqli_close($conn);
}

 ?>