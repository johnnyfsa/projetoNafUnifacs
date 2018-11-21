<?php
session_start();
include 'connect.php';
$sql1="SELECT * FROM services";
$rslt1=$connection->query($sql1);
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Escolha seu serviço.</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
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
        <a href="#"> > Selecionar Serviço</a>
      </li>
    </ol>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Selecionar Serviço</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Selecionar Serviço</h4>
            <p>Selecione o Serviço Desejado, ou insira o nome do serviço</p>
          </div>
          <form action="datePicker.php" method="post" id="serviceForm">
            <div class="form-group">
              <div class="form-label-group">
                <input class="form-control" id="selectService" type="text" name="selectedService" list="services" autocomplete="off" required="required" autofocus="autofocus"/>
                <datalist class="serviceList" id="services">
                  <?php
                    if (mysqli_num_rows($rslt1)>0)
                    {
                      while ($row=$rslt1->fetch_assoc())
                      {
                        echo "<option id=\"opt".$row["service_id"]. "\"value=\"".$row["service_id"]."\">".$row["description"]."</option>";

                      }
                    }
                   ?>
                </datalist>
                <label for="selectService">Selecione Um Serviço</label>
              </div>
            </div>
            <button style="color:white;" class="btn btn-primary btn-block" type="submit" form="serviceForm">Prosseguir</button>
          </form>
          <div class="text-center"><br>
            <a style="color:white; background-color:darkblue;" class="btn btn-primary btn-block" href="index.php">Voltar</a>
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
