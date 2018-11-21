<?php
session_start();
include('connect.php');
$finalDate = $_POST['date'];
$service = $_POST['service'];


$sql ="SELECT times.time FROM times JOIN booking WHERE booking.book_date='$finalDate' AND booking.service_id='$service' AND times.time!=booking.book_hour";
$sql2 ="SELECT * FROM times";
$rslt=$connection->query($sql);
$rslt2=$connection->query($sql2);

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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <title>Selecione o horário disponível para o Agendamento</title>
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
          <a href="datePicker.php"> > Selecionar Data</a>
          <a href="#"> > Selecionar Horário</a>
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
          <form action="process.php" method="post" id="timeSelect">
            <div class="form-group">
              <div class="form-label-group">
                  <input type="hidden" name="data" value="<?php echo $finalDate; ?>">
                  <input type="hidden" name="service" value="<?php echo $service; ?>">
                  <select name="tempo" form="timeSelect" class="form-control">
                    <?php
                    if (mysqli_num_rows($rslt)>0)
                    {
                      while ($row = $rslt->fetch_assoc())
                      {
                        echo "<option value=\"".$row["time"]."\">".$row["time"]."</option>";
                      }
                    }
                    else
                    {
                      while ($row = $rslt2->fetch_assoc())
                      {
                        echo "<option value=\"".$row["time"]."\">".$row["time"]."</option>";
                      }
                    }
                     ?>
                  </select>
              </div>
            </div>
            <button style="color:white;" class="btn btn-primary btn-block" type="submit" form="timeSelect">Prosseguir</button>
          </form>
          <div class="text-center"><br>
            <a style="color:white; background-color:darkblue;" class="btn btn-primary btn-block" href="datePicker.php">Voltar</a>
          </div>
        </div>
      </div>
    </div>



  </body>

</html>
