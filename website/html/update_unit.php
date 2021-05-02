<?php
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


        $sql2 = "UPDATE modules SET   code_prof='$_POST[code_prof]'  WHERE id_module ='$id' ;";
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