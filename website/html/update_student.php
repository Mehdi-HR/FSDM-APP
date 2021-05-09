<?php
require('templates/config.php');
require('templates/data.php');
if(isset($_POST['envoyer'])){

$id= $_POST['code'];

//UPDATE ETUDIANT
	$sql = "UPDATE etudiants SET nom='$_POST[nom]' ,prenom='$_POST[prenom]',  cin='$_POST[cin]', email='$_POST[email]', cne='$_POST[cne]',  id_filiere='$_POST[id_filiere]' 
    WHERE code_etudiant ='$id' ;";
 $result = mysqli_query($conn, $sql);
 if ( false===$result ) {
   printf("error: %s\n", mysqli_error($conn));
 }
 else {
   echo '       done.';
 }
 //UPDATE UTILISATEURS
 $sql2 = "UPDATE utilisateurs SET nom='$_POST[nom]' ,prenom='$_POST[prenom]',  cin='$_POST[cin]', email='$_POST[email]'
 WHERE code ='$id' ;";
 $result2 = mysqli_query($conn, $sql2);
if ( false===$result2 ) {
    printf("error: %s\n", mysqli_error($conn));
  }
  else {
    echo '      Utilisateurs done.';
  }
//UPDATE ETUDIANT_MODULE
$sql3= "SELECT id_module FROM modules WHERE id_filiere='$_POST[id_filiere]'";
$result3 = mysqli_query($conn, $sql3);
$modules= [];
while($module=mysqli_fetch_assoc($result3)){
$modules[]=$module;

}
echo json_encode($modules);


//Etudiant Module
// $sql5="DELETE  FROM etudiant_module WHERE code_etudiant='$id'";
// $result5=mysqli_query($conn,$sql5);
// if ( false===$result5 ) {
//       printf("error SQL5 : %s\n", mysqli_error($conn));
//     }
//     else {
//       echo '      Utilisateurs done.';
     
//       // header("refresh:2;url=student_details.php?codeE=$id");
//     }


//     foreach($modules as $module){

//       $sql4 = "INSERT INTO etudiant_module (code_etudiant,id_module,etat)
//       VALUES ('$id', '$module[id_module]','Non inscrit')";
      
//       $result4 = mysqli_query($conn, $sql4);
      
//       if ( false===$result4 ) {
//         printf("error: %s\n", mysqli_error($conn));
//       }
//       else {
//         echo '      Utilisateurs done.';
       
       
//       }

//     }


$year=getActualUniYear();

for ($i=1; $i <=6; $i++) { 
  $s= 'S' .$i;
   if(isset($_POST[$s])){
$sql6="UPDATE etudiant_semestre SET etat='Inscrit', annee_universitaire='$year' WHERE code_etudiant='$id' AND id_semestre='$i'";
$result6 = mysqli_query($conn, $sql6);

//LES MODULES DU SEMESTRE
$sql10="SELECT * FROM modules WHERE id_filiere='$_POST[id_filiere]'";
$result = mysqli_query($conn,$sql10);

$modules = [];
while($module = mysqli_fetch_assoc($result)){
	$modules[] = $module;
}



$units = getUnitsOfSemester($i);

foreach ($units as $unit){
  $id_module = $unit['id_module'];
  $sql7 = "UPDATE etudiant_module SET etat = 'Inscrit', annee_universitaire='$year' 
                                WHERE id_module = '$id_module' AND code_etudiant = '$id'; ";
  $result = mysqli_query($conn,$sql7);
  if($result == false){
    printf("error: %s\n", mysqli_error($conn));
  }	
  else{
    header("refresh:2;url=student_details.php?codeE=$id");
  }			 
}

      

  }
  
  
  
  
  
  //else{
//     $sql6="UPDATE etudiant_semestre SET etat='Non Inscrit',  annee_universitaire='en cours' 
//                                             WHERE code_etudiant='$id' AND id_semestre='$i'";
// $result6 = mysqli_query($conn, $sql6);
// $sql10="SELECT * FROM modules WHERE id_filiere='$_POST[id_filiere]'";
// $result = mysqli_query($conn,$sql10);

// $modules = [];
// while($module = mysqli_fetch_assoc($result)){
// 	$modules[] = $module;
// }



// $units = getUnitsOfSemestery($i);

// foreach ($units as $unit){
//   $id_module = $unit['id_module'];
//   $sql7 = "UPDATE etudiant_module SET etat = 'NON INSCRIT',  annee_universitaire='en cours' WHERE id_module = '$id_module' AND code_etudiant = '$id'; ";
//   $result = mysqli_query($conn,$sql7);
//   if($result == false){
//     printf("error: %s\n", mysqli_error($conn));
//   }	else{
//     header("refresh:2;url=student_details.php?codeE=$id");
//   }
// }
// }
  }
}





?>