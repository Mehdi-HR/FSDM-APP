<?php 

require('data.php');
set_time_limit(2400);
foreach ($filieres as $filiere) {
	$students= getListeParFiliere($filiere['id_filiere']);
	$units= getUnitsOfCourse($filiere['id_filiere']);
	foreach ($students as $student) {
		$code_etudiant = $student['code_etudiant'];
		foreach ($units as $unit) {
			$id_module = $unit['id_module'];
			$sql = "INSERT INTO etudiant_module(code_etudiant,id_module) 
					VALUES ('$code_etudiant','$id_module')";
			mysqli_query($conn,$sql);		 
		}
	}
}

 ?>

