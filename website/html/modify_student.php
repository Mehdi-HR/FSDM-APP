<?php
require('templates/data.php');

if (isset($_GET['codeE'])) {
	$codeE = $_GET['codeE'];
    $etudiant= getStudentByCode($codeE);
}
 Function select_filiere($e){
	GLOBAL $etudiant;
	if($etudiant['id_filiere']==$e){
	echo "selected" ;
}}

Function selectedMajor($e){
	GLOBAL $etudiant;
	if($etudiant['id_filiere']==$e){
	echo "false" ;
	
}
else{
	echo "true";
}
 }
 require('templates/config.php');
///echo $codeE;
 $sql="SELECT id_semestre, annee_universitaire,etat FROM etudiant_semestre WHERE code_etudiant='$_GET[codeE]'";
 $result= mysqli_query($conn,$sql);
 if($result===false){
	 echo mysqli_error($conn);
 }
 else {
	 $table=[];
	 while($t=mysqli_fetch_assoc($result))
	 {
			$table[]=$t;
	 }
	
$etat=array_column($table,'etat');

//print_r($etat ) ;

$id_semestre=array_column($table,'id_semestre');

$annee_universitaire=array_column($table,'annee_universitaire');
$combine=array_combine($id_semestre,$etat);
//echo $combine['1'];
Function checkSemester($c){
	global $combine;
	if(strtolower($combine[$c])!='non inscrit'){
		echo "checked";
	}

}
Function readOnly($c){
	global $combine;
	if(strtolower($combine[$c])!='non inscrit'){
		echo "disabled";
	}

}



}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Etudiant</title>
</head>
<body>
<header id="mainHeader"> 
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Modifier etudiant</h1>
	</div>
</header>
<!--   -->
<section>

	<div class="form">
	<form class="myForm" action="update_student.php" id="form" method="POST">
			
			<!--code-->
			<label>Modifier l'etudiant&nbsp&nbsp: <?=$etudiant['code_etudiant']?></label>
			<input type="hidden" id="code" name="code" value ="<?=$etudiant['code_etudiant']?>" ><br>
            <br>
			

			<!--nom-->
			<label>Entrer le nom &nbsp &nbsp &nbsp:</label>
			<input type="text" id="nom"name="nom" placeholder="Entrer le nom ici" value = "<?=$etudiant['nom']?>" required><br>
			<br>
			<!--prenom-->
			<label>Entrer le prenom:</label>
			<input type="text" id="prenom" name="prenom" placeholder="Entrer le prenom ici" value = "<?=$etudiant['prenom']?>" required><br>
			<br>

			<!--cin-->	
			<label>Entrer le cin  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cin" name="cin" placeholder="Entrer le cin ici" value = "<?=$etudiant['cin']?>" required> <br>
            <br>

			<!--email-->
			<label>Entrer l'email  &nbsp &nbsp :</label>
			<input type="text" id="email" name="email" placeholder="Entrer l'email' ici" value = "<?=$etudiant['email']?>" required> <br><br>
			

			<!--cne-->
			<label>Entrer le cne  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cne" name="cne" placeholder="Entrer le cne ici" value = "<?=$etudiant['cne']?>" required> <br><br>
					

			<!--id_filiere-->
		 <label>Entrer la filiere  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="filiere" name="id_filiere" placeholder="Entrer la filiere" value = "<?=$etudiant['id_filiere']?>" readonly> <br>
		
		<!--id_filiere-->
			<!-- <label>Choisir une filiere:</label> -->
							
				<!-- <select >
			<option <?php select_filiere("SMI")?>  onchange="return <?php selectedMajor('SMI')?>"  >SMI</option>
				<option <?php select_filiere("SMA")?> onchange="return <?php selectedMajor('SMA')?>" >SMA</option>
				<option <?php select_filiere("SVI")?> onchange="return <?php selectedMajor('SVI')?> ">SVI</option>
				<option <?php select_filiere("STU")?> onchange="return <?php selectedMajor('STU')?> " >STU</option>
				<option <?php select_filiere("SMP")?> onchange="return <?php selectedMajor('SMP')?>" >SMP</option>
				<option <?php select_filiere("SMC")?> onchange="return <?php selectedMajor('SMC')?>" >SMC</option>	</select>
			<br><br> --> 
			
			<label>Semestre 1</label><input type="checkbox" name="S1" id="1"<?=checkSemester('1')?>  <?=readOnly('1')?> ><label > &nbsp &nbsp</label>
			<label>Semestre 2</label><input type="checkbox" name="S2" id="2" <?=checkSemester('2')?>   <?=readOnly('2')?>><label > &nbsp &nbsp</label>
			<label>Semestre 3</label><input type="checkbox" name="S3" id="3"  <?=checkSemester('3')?>   <?=readOnly('3')?>><label > &nbsp &nbsp</label><br>
			<label>Semestre 4</label><input type="checkbox" name="S4" id="4"  <?=checkSemester('4')?> <?=readOnly('4')?>><label > &nbsp &nbsp</label>
			<label>Semestre 5</label><input type="checkbox" name="S5" id="5"  <?=checkSemester('5')?>  <?=readOnly('5')?>><label > &nbsp &nbsp</label>
			<label>Semestre 6</label><input type="checkbox" name="S6" id="6"  <?=checkSemester('6')?>  <?=readOnly('6')?>><br><br>

			<input type="submit" id="submit" name="envoyer" value="Envoyer">	
			<input type="reset" name="annuler" value="Annuler">	
		</form>
    
	</div>
</section>
<?php 	

require('templates/nav.php');

 ?>

<?php 	

require('templates/footer.php');

 ?>





</body>
</html>