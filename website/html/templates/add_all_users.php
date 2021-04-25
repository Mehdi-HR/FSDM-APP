<?php 

require("data.php");
require("config.php");

set_time_limit(2400);
foreach ($etudiants as $etudiant) {
$code = $etudiant['code_etudiant'];
$nom = $etudiant['nom'];
$prenom = $etudiant['prenom'];
$cin = $etudiant['cin'];
$email = $etudiant['email'];
$cne = $etudiant['cne'];
$type = 'E';
$password = $cin;
$hash = hash("sha256",$password,false);
$sql = "INSERT INTO utilisateurs(code,nom,prenom,type,cin,email,hash) VALUES ('$code','$nom','$prenom','$type','$cin','$email','$hash');";
mysqli_query($conn,$sql);	
}

foreach ($professeurs as $professeur) {
	$code = $professeur['code_prof'];
	$nom = $professeur['nom'];
	$prenom = $professeur['prenom'];
	$cin = $professeur['cin'];
	$email = $professeur['email'];
	$type = 'P';
	$password = $cin;
	$hash = hash("sha256",$password,false);
	$sql2 = "INSERT INTO utilisateurs(code,nom,prenom,type,cin,email,hash) VALUES ('$code','$nom','$prenom','$type','$cin','$email','$hash');";
	mysqli_query($conn,$sql2);	
}
 ?>