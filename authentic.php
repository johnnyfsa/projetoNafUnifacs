 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <script type="text/javascript">
       function loginsuccess()
       {
        setTimeout("window.location='index.php'",2000);
       }
       function loginfail()
       {
        setTimeout("window.location='login.html'",5000);
       }
     </script>
   </head>
   <body>
     <?php
     include('connect.php');
     $email=$_POST['inputEmail'];
     $psswd = preg_replace('/[^[:alpha:]_]/', '',$_POST['inputPassword']);
    $sql = "SELECT * FROM user WHERE email = '$email' and psswd = '$psswd'";
    $rslt= $connection->query($sql);
    $fetch = $rslt->fetch_assoc();
    $row = mysqli_num_rows($rslt);
    if ($row >0)
    {
      session_start();
      $_SESSION['id']=$fetch["id"];
      //echo "loging realizado";
      echo "<script>loginsuccess()</script>";
    }
    else
    {
      echo "usuário inválido";
      echo "<script>loginfail()</script>";
    }
    ?>
   </body>
 </html>
