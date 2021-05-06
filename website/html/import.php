<?php

//POUR IMPORTER LES NOTES A LA BASE DE DONNEES

echo $_POST['id_module'];


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
    
    'note'  => $column[3]
  ];
  //echo json_encode($insert_data);

  
  $sql="UPDATE etudiant_module SET note= '$insert_data[note]' WHERE code_etudiant= '$insert_data[code_etudiant]' AND id_module='$_POST[id_module]' ";

  $sql2="UPDATE etudiant_module SET etat = 'Valide' WHERE code_etudiant= '$insert_data[code_etudiant]' AND id_module='$_POST[id_module]'";
  $sql3="UPDATE etudiant_module SET etat = 'Reinscrit' WHERE code_etudiant= '$insert_data[code_etudiant]' AND id_module='$_POST[id_module]'";

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

  }
  echo 'Success.';
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