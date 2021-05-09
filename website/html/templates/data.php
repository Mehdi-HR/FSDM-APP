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


function getStudentByCode($code){
	global $etudiants;
	foreach ($etudiants as $etudiant) {
			if ($code == $etudiant['code_etudiant']) {
				return $etudiant;
			}
		}	
}


//fetch professors
$sql = 'SELECT * FROM professeurs;';
$result = mysqli_query($conn,$sql);
//Definition du tableau d'etudiants
$professeurs = [];
while($professeur = mysqli_fetch_assoc($result)){
	$professeurs[] = $professeur;
}

//Definition des constantes et fonctions


function getProfByCode($code){
	global $professeurs;
	foreach ($professeurs as $professeur) {
			if ($code == $professeur['code_prof']) {
				return $professeur;
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
 

//fetch units
$sql = 'SELECT * FROM modules;';
$result = mysqli_query($conn,$sql);
//Definition du tableau d'etudiants
$modules = [];
while($module = mysqli_fetch_assoc($result)){
	$modules[] = $module;
}

//Definition des constantes et fonctions


function getUnitById($id){
	global $modules;
	foreach ($modules as $module) {
			if ($id == $module['id_module']) {
				return $module;
			}
		}	
}

function getUnitsOfCourse($filiere){
	global $modules;
	$modulesDeLaFiliere = [];
	foreach($modules as $module){
		if ($module['id_filiere'] == $filiere) {
			$modulesDeLaFiliere[] = $module; 
		}
	}
	return $modulesDeLaFiliere;
}


//fetch semesters
$sql = 'SELECT * FROM semestres;';
$result = mysqli_query($conn,$sql);
//Definition du tableau des semestres
$semestres = [];
while($semestre = mysqli_fetch_assoc($result)){
	$semestres[] = $semestre;
}


function getUnitsOfSemester($id_semestre){
	global $modules;
	$modulesDuSemestre = [];
	foreach($modules as $module){
		if ($module['id_semestre'] == $id_semestre) {
			$modulesDuSemestre[] = $module; 
		}
	}
	return $modulesDuSemestre;
}
 
function yearToUniYear($year){
		$first_year = $year;
		$second_year = $first_year + 1;
		$uni_year = $first_year.'-'.$second_year;
		return $uni_year;
}

function etatDuSemestreActuellement($code_etudiant,$id_semestre){
	$annee_universitaire = yearToUniYear(date('Y'));
	$sql = "SELECT LOWER * FROM etudiant_semestre WHERE code_etudiant = $code_etudiant AND id_ semestre = $id_semestre AND annee_universitaire = $annee_universitaire;";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		printf("error: %s\n", mysqli_error($conn));
		return NULL;
	}
	$row = mysqli_fetch_assoc($result);
	return $row['etat'];		
}

function getListByYear($etudiants,$annee){

	$etudiants_annee = [];
	foreach ( $etudiants as $etudiant ) {
		if ( $etudiant["date_inscription"] == $annee ){
			$etudiants_annee[] = $etudiant;	
		}	
	}
	return $etudiants_annee;

}

function getActualUniYear(){
	$year = date('Y');
	$month = date('n');
	if($month >= 7 AND $month <= 12)
		return yearToUniYear($year);
	else 
		return yearToUniYear($year-1);	 
}

function getNextUniYear($uni_year){
	$first_year = substr($uni_year,5);
	$second_year = $first_year+1;
	return $first_year.'-'.$second_year;
}

//Fetch UNI YEARS 

$sql = "SELECT * FROM annees_universitaires;";
$result = mysqli_query($conn,$sql);
//Definition du tableau d'etudiants
$annees_universitaires = [];
while($annee_universitaire = mysqli_fetch_assoc($result)){
	$annees_universitaires[] = $annee_universitaire['id'];
}


function getUnitsOfSemesterByMajor($id,$filiere){
    global $modules;
        $modulesDuSemestreParFiliere = [];
        foreach($modules as $module){
            if ($module['id_semestre'] == $id && $module['id_filiere'] == $filiere) {
                $modulesDuSemestreParFiliere[] = $module; 
            }
        }
        return $modulesDuSemestreParFiliere;    
}


mysqli_close($conn);



?>