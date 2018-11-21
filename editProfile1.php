<?php
include('connect.php');
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM `user` WHERE id='$id'";
$rslt = $connection->query($query);
//$fetch, $fname, $lname, $email, $prof, $bday, $gender;
if (mysqli_num_rows($rslt)>0)
{
  $fetch = $rslt->fetch_assoc();
  $fname = $fetch["fname"];
  $lname = $fetch["lname"];
  $email = $fetch["email"];
  $prof = $fetch["profession"];
  $bday = $fetch["birthday"];
  $gender = $fetch["gender"];

}
 ?>
 <!DOCTYPE html>
 <html lang="en">

   <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>SB Admin - Register</title>

     <!-- Bootstrap core CSS-->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template-->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

     <!-- Custom styles for this template-->
     <link href="css/sb-admin.css" rel="stylesheet">
     <style media="screen">
       .card-header, .btn
       {
         background-color: #57B288;
         border-color: #276549;
       }
       .btn:hover
       {
         background-color: #276549;
       }
     .form-control:focus
     {
       border-color: #5cb85c;
       box-shadow: none;
       -webkit-box-shadow: none;
     }
     </style>
   </head>

   <body>
     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
       <li class="breadcrumb-item">
         <a href="index.php">Serviços Marcados</a>
         <a href="#"> > Editar Dados Cadastrais</a>
       </li>
     </ol>
     <div class="container">
       <div class="card card-register mx-auto mt-5">
         <div class="card-header">Registrar uma Conta</div>
         <div class="card-body">
           <form action="updateProfile.php" method="post" id="mandar">
             <div class="form-group">
               <div class="form-row">
                 <div class="col-md-6">
                   <div class="form-label-group">
                     <input type="text" id="firstName" value="<?php echo $fname; ?>" name="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                     <label for="firstName">Nome</label>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-label-group">
                     <input type="text" id="lastName" value="<?php echo $lname; ?>" name="lname" class="form-control" placeholder="Last name" required="required">
                     <label for="lastName">Sobrenome</label>
                   </div>
                 </div>
               </div>
             </div>
             <div class="form-group">
               <div class="form-label-group">
                 <input type="email" id="inputEmail" value="<?php echo $email ?>" name="email" class="form-control" placeholder="Email address" required="required">
                 <label for="inputEmail">Endereço Email</label>
               </div>
             </div>

             <div class="form-group">
               <div class="form-row">
                 <div class="col-md-6">
                   <div class="form-label-group">
                     <input type="text" id="profession" value="<?php echo $prof ?>" name="profession" class="form-control" placeholder="Profession">
                     <label for="profession">Profissão</label>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-label-group">
                     Gênero <br>
                     <?php
                     if ($gender=='male')
                     {
                       echo "<input type=\"radio\" name=\"gender\" value=\"male\" checked>Masculino<br>";
                       echo "<input type=\"radio\" name=\"gender\" value=\"female\">Feminino<br>";
                     }
                     else
                     {
                       echo "<input type=\"radio\" name=\"gender\" value=\"male\">Masculino<br>";
                       echo "<input type=\"radio\" name=\"gender\" value=\"female\" checked>Feminino<br>";
                     }
                      ?>
                   </div>
                 </div>
               </div>
             </div>
             <div class="form-group">
               <div class="form-row">
                 <div class="col-md-6">
                   <div class="form-label-group">
                     <input type="date" id="birthday" value="<?php echo $bday ?>" name="birthday" class="form-control" placeholder="Data de Nascimento">
                     <label for="birthday">Data de Nascimento</label>
                   </div>
                 </div>
               </div>
             </div>
             <button class="btn btn-primary btn-block" type="submit" form="mandar"> Atualizar </button>
           </form>
           <div class="text-center">
             <a class="d-block small mt-3" href="index.php">Voltar</a>
           </div>
         </div>
       </div>
     </div>

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   </body>

 </html>
