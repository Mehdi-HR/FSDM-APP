<?php
if(isset($_POST['envoyer'])){

$id= $_POST['code'];
echo $id;
require('templates/config.php');
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

foreach($modules as $module){

  $sql4="UPDATE etudinat_module SET id_module='$module[id_module]' WHERE code_etudiant='$id' ";
  $result3 = mysqli_query($conn, $sql3);
  if ( false===$result2 ) {
    printf("error: %s\n", mysqli_error($conn));
  }
  else {
    echo '      Utilisateurs done.';
    header("refresh:2;url=student_details.php?codeE=$id");
  }

}



}

?>