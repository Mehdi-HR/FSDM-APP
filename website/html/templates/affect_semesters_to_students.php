<?php 

require('data.php');
set_time_limit(2400);
require('config.php');
foreach ($etudiants as $etudiant) {
	$code_etudiant = $etudiant['code_etudiant'];
	foreach ($semestres as $semestre) {
		$id_semestre = $semestre['id_semestre'];
		$sql = "INSERT INTO etudiant_semestre(code_etudiant,id_semestre,etat) 
				VALUES ('$code_etudiant','$id_semestre','non inscris')";
		$result = mysqli_query($conn,$sql) ;		 
		if($result == false){
						    printf("error: %s\n", mysqli_error($conn));
		}
	}
}

?>