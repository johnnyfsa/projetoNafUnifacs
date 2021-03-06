<?php
session_start();
$service = $_POST['selectedService'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">




    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!--Datepicker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>


    <title>Selecione a Data do Serviço</title>
  </head>
  <body>
    <style media="screen">
      .card-header,.btn
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
        <a href="index.php">Página Inicial</a>
        <a href="selectService1.php"> > Selecionar Serviço</a>
          <a href="#"> > Selecionar Data</a>
      </li>
    </ol>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Selecionar Data do Serviço</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Agendar Data</h4>
            <p>Selecione a data para de agendamento.</p>
          </div>
          <form action="SelectTime1.php" method="post" id="serviceForm">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="date" value="" class="form-control" id="datepick" autocomplete="off" autofocus="autofocus">
                  <input type="hidden" name="service" value= "<?php  echo $service; ?>">
              </div>
            </div>
            <button style="color:white;" class="btn btn-primary btn-block" type="submit" form="serviceForm">Prosseguir</button>
          </form>
          <div class="text-center"><br>
            <a style="color:white; background-color:darkblue;" class="btn btn-primary btn-block" href="selectService1.php">Voltar</a>
          </div>
        </div>
      </div>
    </div>



    <script type="text/javascript">
    $('#datepick').datepicker({
      startDate: "today",
      format: "yyyy-mm-dd",
      autoclose: true,
      daysOfWeekDisabled: "0,6",
      daysOfWeekHighlighted: "1,2,3,4,5"
      });
    </script>


  </body>

</html>
