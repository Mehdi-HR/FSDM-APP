<?php 

	require('config.php');
	$units_json = file_get_contents('../../ressources/units_json.json');
	$units_array = json_decode($units_json,true); 
	foreach ($units_array as $unit) {
		$id_module = $unit['id_module'];
		$nom_module = $unit['nom_module'];
		$id_filiere = $unit['id_filiere'];
		$code_prof = $unit['code_prof'];
		$id_semestre = $unit['id_semestre']; 
		$sql = "INSERT INTO modules(id_module,nom_module,id_filiere,code_prof,id_semestre) VALUES  ('$id_module','$nom_module','$id_filiere','$code_prof','$id_semestre');";
		
        mysqli_query($conn,$sql);
}
?>