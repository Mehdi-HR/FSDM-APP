<?php 

if(isset($_GET['codeP'])){
	$code = $_GET['codeP'];
	require('templates/config.php');
	$sql = "DELETE FROM professeurs WHERE code_prof ='$code' ;";
	$sql2 = "DELETE FROM utilisateurs WHERE code ='$code' ;";		
	(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2)) 
	or die("Unable to delete professor");	
		header('Location: index.php');
	
	mysqli_close($conn);

}

 ?>