<?php 

	require('config.php');
	$professors_json = file_get_contents('../../ressources/professors_json.json');
	$professors_array = json_decode($professors_json,true); 
	foreach ($professors_array as $professor) {
		$code = $professor['code'];
		$nom = $professor['nom'];
		$prenom = $professor['prenom'];
		$cin = $professor['cin'];
		$email = $professor['email'];
		$type = 'P';
		$sql = "INSERT INTO professeurs(code_prof,nom,prenom,cin,email) VALUES ('$code','$nom','$prenom','$cin','$email');";
		if( mysqli_query($conn,$sql) ){
			$password = $cin;
			$hash = hash("sha256",$password,false);
			$sql2 = "INSERT INTO utilisateurs(code,nom,prenom,type,cin,email,hash) VALUES ('$code','$nom','$prenom','$type','$cin','$email','$hash');";
			mysqli_query($conn,$sql2);	
		}

}
 ?>

 