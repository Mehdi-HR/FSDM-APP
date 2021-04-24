<?php 

//Afficher Date en langue choisie
	function afficherDate($lang){
		
		//recuperer date	
		$date = getdate();
		$jour_de_la_semaine = $date["wday"];
		$jour_du_mois = $date["mday"];
		$mois = $date["mon"];
		$annee = $date["year"];
		
		//declarer langues
		$fr = [
			"jour" => array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"),
			"mois" => array("","Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre")
			];
		
		$es = [
			"jour" => array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"),
			"mois" => array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
			];
		
		$an = [
			"jour" => array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"),
			"mois" => array("","January","February","March","April","May","June","July","August","September","October","November","December")
			];

		//choisir langue d'affichage 	
		$lang = strtoupper($lang);
		$ln;	
		switch ($lang) {
				case 'FR':
					$ln = $fr;		
					break;
				case 'ES':
					$ln = $es;		
					break;				
				default:
					$ln = $an;
					break;
			}	

		//affichage	
		echo "{$ln["jour"][$jour_de_la_semaine]} $jour_du_mois {$ln["mois"][$mois]} $annee";
	}

//	afficherDate("fr");



 ?>


<div class="date"> <h4 style="color: #fff; margin: 0px; text-align: right; padding-right: 5%; padding-top: 5px; padding-bottom: 5px; background-color: #E31215"> <?php afficherDate("fr"); ?> </h4> </div>