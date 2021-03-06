<?php
require('templates/data.php');
//POUR IMPORTER LES NOTES A LA BASE DE DONNEES



include '../vendor/autoload.php';

require('templates/config.php');

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();
  
  foreach($data as $column)
  {
   $insert_data = [
    'code_etudiant'  => $column[0],
    'etat'  => $column[3],
    'note'  => $column[4]
  ];
  //echo json_encode($insert_data);

  
  $sql="UPDATE etudiant_module SET note= '$insert_data[note]' WHERE code_etudiant= '$insert_data[code_etudiant]' AND id_module='$_POST[id_module]' ";

  $sql2="UPDATE etudiant_module SET etat = 'Valide' WHERE code_etudiant= '$insert_data[code_etudiant]' AND id_module='$_POST[id_module]'";


  $sql3="UPDATE etudiant_module SET etat = 'non valide' WHERE code_etudiant= '$insert_data[code_etudiant]' AND id_module='$_POST[id_module]'";
  
  $next_uni_year = getNextUniYear(getActualUniYear());
  $sql4 = "INSERT INTO etudiant_module(code_etudiant,id_module,annee_universitaire,etat) 
  VALUES ('$insert_data[code_etudiant]','$_POST[id_module]','$next_uni_year','reinscrit');";


$result=mysqli_query($conn,$sql);
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($conn));
}
else {
  if ($insert_data['note'] >= 10) {
    mysqli_query($conn,$sql2);
  }
  else{
    mysqli_query($conn,$sql3);
    mysqli_query($conn,$sql4);
  }
}
 }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>