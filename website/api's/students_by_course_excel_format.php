<?php	

if(isset($_GET["codeE"])){
	$codeE = $_GET["codeE"];
}

require('../html/templates/data.php');

$etudiant = getStudentByCode($codeE);

//Calcul
$listeEtudiantsFiliere = getListeParFiliere($etudiant['id_filiere']);
$nbEtudiantsFiliere = count($listeEtudiantsFiliere);

$filiere = $etudiant['id_filiere'];
header("Content-type: 	application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=liste_etudiants_'.$filiere.'.xls');

?>


	    <table border="table" cellspacing="1px" cellpadding="5px">
			<thead>
				<tr>
					<th>Code</th> 
					<th>Nom</th>
					<th>Prenom</th>
					<th>CIN</th>
					<th>Email</th>
					<th>CNE</th>
					<th>Filiere</th>

				</tr>
			</thead>
			<tbody>
				<?php
				for ($i=0; $i < $nbEtudiantsFiliere ; $i++) {
					$codeE = $listeEtudiantsFiliere[$i]['code_etudiant']; 
				 	echo "
					
					 	<tr>
						 	<td>$codeE</td>
					 		<td>{$listeEtudiantsFiliere[$i]['nom']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['prenom']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['cin']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['email']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['cne']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['id_filiere']}</td>
					 	</tr>";
					 }?>																				
			</tbody>
		</table>
