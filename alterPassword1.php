<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

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

    <div class="container">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Serviços Marcados</a>
          <a href="#"> > Alterar Senha</a>
        </li>
      </ol>
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Alterar Senha</div>
        <div class="card-body">
          <form action="updatePassword.php" method="post" >
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputCurrentPassword" name="current" class="form-control" placeholder="Current Password" required="required" autofocus="autofocus">
                <label for="inputCurrentPassword">Senha Atual</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputNewPassword" name="new" class="form-control" placeholder="Password" required="required">
                <label for="inputNewPassword">Nova Senha</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit"> Alterar Senha </button>
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
