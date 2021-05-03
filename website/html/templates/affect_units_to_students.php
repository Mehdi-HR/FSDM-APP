<?php 

require('data.php');
require('config.php');
set_time_limit(2400);
foreach ($filieres as $filiere) {
	$students= getListeParFiliere($filiere['id_filiere']);
	$units= getUnitsOfCourse($filiere['id_filiere']);
	foreach ($students as $student) {
		$code_etudiant = $student['code_etudiant'];
		foreach ($units as $unit) {
			$id_module = $unit['id_module'];
			$sql = "INSERT INTO etudiant_module(code_etudiant,id_module,etat) 
					VALUES ('$code_etudiant','$id_module','non inscris')";
			$result = mysqli_query($conn,$sql);
			if($result == false) 
			    printf("error: %s\n", mysqli_error($conn));
		 
		}
		
	}

}
mysqli_close($conn);
 ?>
