<?php 
//connexion
require('config.php');

//fetch students
$sql = 'SELECT * FROM etudiants;';
$result = mysqli_query($conn,$sql);
//Definition du tableau d'etudiants
$etudiants = [];
while($etudiant = mysqli_fetch_assoc($result)){
	$etudiants[] = $etudiant;
}

//Definition des constantes et fonctions

define('MOY_REUSSITE', 10); #Q2

function getStudentByCode($code){
	global $etudiants;
	foreach ($etudiants as $etudiant) {
			if ($code == $etudiant['code_etudiant']) {
				return $etudiant;
			}
		}	
}




//Q6

//Liste de tous les etudiants par filiere
function getListeParFiliere($filiere){ 
	global $etudiants;
	$etudiants_filiere = [];
	foreach ( $etudiants as $etudiant ) {
		if ( $etudiant["id_filiere"] == $filiere ){
			$etudiants_filiere[] = $etudiant;	
		}	
	}
	return $etudiants_filiere;
}




//Filieres

//fetch courses
$sql = 'SELECT * FROM filieres;';
$result = mysqli_query($conn,$sql);
//Definition du tableau des filieres
$filieres = [];
while($filiere = mysqli_fetch_assoc($result)){
	$filieres[] = $filiere;
}
 
?>