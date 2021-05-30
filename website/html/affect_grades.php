<?php
 session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
if(isset($_GET['id_module'])){
    $module=$_GET['id_module'];
  }
  ?>

<!DOCTYPE html>
<html>
   <head>
     <title>Gerer les notes du module <?=$module?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <?php 

include("templates/header.php");  ?>
   <body>

<hr>
     <div class="container">
      <br />

      
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">Gerer les notes du module <?=$module?></div>
          <div class="panel-body">
          <div class="table-responsive">
           <span id="message"></span>

              
              <form method="post" id="import_excel_form" action enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td width="20%" align="right">Select Excel File</td>
                   <td width="20%" ><input type="hidden" name="id_module" value="<?=$module?>"/></td> 
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <td width="20%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Importer les notes a la base de donnees" /></td>
                  
                  </tr>
                </table>
              </form>
           <br />
              
          </div>
          </div>
        </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
  <a href ="javascript:history.go(-1)"><strong>Revenir a la page precedente </strong></a>
</html>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"import.php",
      method:"POST",
      data:new FormData(this),
      
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>

<?php 
}else {
 header("Location: index.php");
}
?>