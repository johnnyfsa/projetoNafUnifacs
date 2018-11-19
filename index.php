<?php
include('connect.php');

 session_start();
if (!isset($_SESSION["id"]))
{
  header("location:loginPage.html");
  exit;
}

$id = $_SESSION['id'];
$sql = "SELECT booking.book_date AS data, booking.book_hour AS hour , services.description AS service, booking.service_id, booking.book_id FROM booking INNER JOIN user ON booking.user_id = user.id INNER JOIN services ON booking.service_id=services.service_id  WHERE user.id ='$id' ";
$rslt =  $connection->query($sql);
  ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NAF - Página Inicial</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <style media="screen">
      .navbar
      {
        background-color:#57B288;
      }

    </style>
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand static-top navbar-dark">
         <a href="index.php" class="navbar-brand mr-1"> <img src="img/naf_logo.png" class="navbar-brand mr-1" style="width:70%;"></img> </a>

        <div class="col-sm-9 col-md-8 col-lg-9">
        </div>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Configurações da Conta
              <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">Alterar Dados Cadastrais</a>
              <a class="dropdown-item" href="#">Alterar Senha</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
            </div>
          </li>
        </ul>

      </nav>


    <div id="wrapper">


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Serviços Marcados</a>
            </li>
          </ol>
          <div class="col-sm-9 col-md-8 col-lg-12">
            <a href="selectService.php" class="btn btn-block" style="background-color:darkblue; color:white;"> Agendar Novo Serviço </a>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <form  action="deleteRow.php" method="post" id="deleteRow">
                    <tr>
                    <th class="text-center">Data</th>
                    <th class="text-center">Horário</th>
                    <th class="text-center">Serviço</th>
                    <th clas="text-center"> Seleciona </th>
                    <?php
                    $lenght=0;
                    if (mysqli_num_rows($rslt) > 0)
                    {
                      while($row = $rslt->fetch_assoc())
                      {
                        echo "<tr class=\"tableRow\"><td class=\"tableData\">" .$row["data"]."</td><td class=\"tableData\">" .$row["hour"]. "</td><td class=\"tableData\">" .$row["service"]."</td><td class=\"tableData\">"."<input type =\"checkbox\" name=\"id$lenght\" value=\"".$row["book_id"]."\">"."</td></tr>";
                        $lenght++;
                      }
                      echo "</table>";
                    }
                    else
                    {
                      echo "0 results";
                    }
                    $connection->close();
                     ?>
                  </tr>
                  <input type="hidden" name="lenght" value="<?php echo $lenght ?>">
                  </form>
                  </tbody>
                </table>
                <button class="btn btn-danger" type="submit" form="deleteRow" > Apagar Linhas Selecionadas</button>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © João Gabriel 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
