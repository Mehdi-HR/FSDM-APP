<?php 
	require('config.php');
	$students_json = file_get_contents('../../ressources/students_json.json');
	$students_array = json_decode($students_json,true); 
	foreach ($students_array as $student) {
		$code = $student['code'];
		$nom = $student['nom'];
		$prenom = $student['prenom'];
		$cin = $student['cin'];
		$email = $student['email'];
		$cne = $student['cne'];
		$id_filiere = $student['filiere'];

		$type = 'E';
		$sql = "INSERT INTO etudiants(code_etudiant,nom,prenom,cin,email,cne,id_filiere) VALUES ('$code','$nom','$prenom','$cin','$email','$cne','$id_filiere');";
		if( mysqli_query($conn,$sql) ){
			$password = $cin;
			$hash = hash("sha256",$password,false);
			$sql2 = "INSERT INTO utilisateurs(code,nom,prenom,type,cin,email,hash) VALUES ('$code','$nom','$prenom','$type','$cin','$email','$hash');";
			mysqli_query($conn,$sql2);						
		}

}
 ?>