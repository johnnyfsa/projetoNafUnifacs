<?php
include('connect.php');



if (isset($_POST['email']) && isset($_POST['psswd']) && isset($_POST['fname']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $confirm = $_POST['confirm'];
  $profession = $_POST['profession'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $psswd = $_POST['psswd'];


  $query = "SELECT* FROM user WHERE email = '$email'";
  $rslt = $connection->query($query);

  if (mysqli_num_rows($rslt)>0)
  {
    echo "esse usuário já existe";

  }
  if ($email===$confirm)
  {
    $sql ="INSERT INTO `user` (`fname`, `lname`,`email`,`profession`,`birthday`,`gender`,`psswd`) VALUES ('$fname','$lname','$email','$profession','$birthday','$gender', '$psswd')";
    if($connection->query($sql)===TRUE)
    {
      echo "Nova entrada criada com sucesso";
      header("location:loginPage.html");
    }
    else
    {
      echo "Error:".$sql."<br>".$connection->error;
    }
  }
  else
  {
    echo "e-mails don't match";
  }
}



$connection->close();
 ?>
