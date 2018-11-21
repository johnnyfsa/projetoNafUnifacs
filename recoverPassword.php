<?php
include('connect.php');
if (isset($_POST['email']))
{
  $email = $_POST['email'];
  $query = "SELECT * FROM `user` WHERE email = '$email'";
  $rslt = $connection->query($query);

  if (mysqli_num_rows($rslt)>0)
  {
    $fetch = $rslt->fetch_assoc();
    $psswd = $fetch['psswd'];
    $to = $email;
    $subject = "Recover Password";
    $message = "your password is $psswd";
    $from = "me@freakazoid.com";

    if (mail($to,$subject,$message,$from))
    {
        header("location:login.html");
    }
    else
    {
      echo "deu ruim";
    }
  }
}
 ?>
