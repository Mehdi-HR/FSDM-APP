<?php
function yearToUniYear($year){
  $first_year = $year;
  $second_year = $first_year + 1;
  $uni_year = $first_year.'-'.$second_year;
  return $uni_year;
}
function getActualUniYear(){
	$year = date('Y');
	$month = date('n');
	if($month >= 7 AND $month <= 12)
		return yearToUniYear($year);
	else 
		return yearToUniYear($year-1);	 
}
$year=getActualUniYear();
if(isset($_POST['envoyer'])){

    $id= $_POST['id_module'];
    echo $id ;
    require('templates/config.php');
    $sql="SELECT code_prof FROM professeurs WHERE code_prof='$_POST[code_prof]';";
     $result = mysqli_query($conn, $sql);
     if ( false===$result ) {
       printf("error: %s\n", mysqli_error($conn));
     }
     else if(mysqli_num_rows($result)===1){
        $module = mysqli_fetch_assoc($result);
        echo '   Professor does exist.'."\n";
    print_r($module); 


        $sql2 = "INSERT INTO professeur_module (code_prof,id_module,annee_universitaire) VALUES ('$_POST[code_prof]','$id','$year')";
        $result2 = mysqli_query($conn, $sql2);
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($conn));
          }
          else {
            echo "Unit UPDATED \n";
            header("refresh:3, url=unit_details.php?id_module=$id");
          }
    }
    else{
        echo "Professeur Doesn't EXIST";
    }
    }
?>