<?php 

//Definition du tableau d'etudiants

$etudiants = [
	["code" => "E1", "nom" => "Moujtahid", 
	 "prenom" => "Moujidd" ,"filiere" => "SMI" ,"note" => 18
	],
	["code" => "E2", "nom" => "Kaddouri", 
	 "prenom" => "Kaddour" ,"filiere" => "SMA" ,"note" => 15
	],
	["code" => "E3", "nom" => "Omari", 
	 "prenom" => "Omar" ,"filiere" => "SMI" ,"note" => 16
	],
	["code" => "E4", "nom" => "Karimi", 
	 "prenom" => "Karima" ,"filiere" => "SMA" ,"note" => 12
	],
	["code" => "E5", "nom" => "Kaslani", 
	 "prenom" => "Kassoul" ,"filiere" => "SMI" ,"note" => 3
	],
	["code" => "E6", "nom" => "Brahimi", 
	 "prenom" => "Brahim" ,"filiere" => "SMA" ,"note" => 14
	],
	["code" => "E7", "nom" => "Aissaoui", 
	 "prenom" => "Aissa" ,"filiere" => "SMI" ,"note" => 13
	],
	["code" => "E8", "nom" => "Jallouli", 
	 "prenom" => "Jallou" ,"filiere" => "SMA" ,"note" => 7
	]						
];


//Definition des constantes et fonctions

define('MOY_REUSSITE', 10); #Q2

function getStudentByCode($code){
	global $etudiants;
	foreach ($etudiants as $etudiant) {
			if ($code == $etudiant['code']) {
				return $etudiant;
			}
		}	
}

function getListeReussisParFiliere($filiere){ #Q3
	global $etudiants;
	$etudiants_reussis = [];
	foreach ( $etudiants as $etudiant ) {
		if ( $etudiant["filiere"] == $filiere && $etudiant["note"] >= MOY_REUSSITE){
			$etudiants_reussis[] = $etudiant;	
		}	
	}
	return $etudiants_reussis;
}


function getMax($t){ #Q4
	$max = $t[0];
	for ($i=1; $i < count($t) ; $i++){  
		if( $t[$i] > $max)
			$max = $t[i];
	}		 
	return $max;
}

function getMention($note){ #Q5
	$mention = 'Ajourne';
	if ( $note >= 10 ) $mention = 'Passable';
	if ( $note >= 12 ) $mention = 'Assez Bien';
	if ( $note >= 14 ) $mention = 'Bien';
	if ( $note >= 16 ) $mention = 'Tres Bien';
	if ( $note >= 18 ) $mention = 'Excellent';
	return $mention;
}


//Q6

//Liste de tous les etudiants par filiere
function getListeParFiliere($filiere){ 
	global $etudiants;
	$etudiants_filiere = [];
	foreach ( $etudiants as $etudiant ) {
		if ( $etudiant["filiere"] == $filiere ){
			$etudiants_filiere[] = $etudiant;	
		}	
	}
	return $etudiants_filiere;
}


//Notes de la filiere
function getNotesFiliere($filiere){
	$etudiants_filiere = getListeParFiliere($filiere);
	$notes =[];
	for ($i=0; $i < count($etudiants_filiere); $i++){  
		$notes[] = $etudiants_filiere[$i]['note'];
	}
	return $notes;
}


//Meilleur note par filiere
function getMeilleurNoteParFiliere($filiere){
	return getMax(getNotesFiliere($filiere));
}



//Filieres

//Declaration des filieres
$filieres = [
				["CodeFiliere" => "SMI" ,
			     "IntituleFiliere" => "Sciences Mathematiques et Informatique"
			    ],

                ["CodeFiliere" => "SMA" ,
			     "IntituleFiliere" => "Sciences Mathematiques et Application"			    
			    ] 	
			];

 ?>