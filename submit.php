<?php
include('connect.php');


echo $_POST['fname'] ."\n";
echo $_POST['lname'] ."\n";
echo $_POST['email'] ."\n";
echo $_POST['inputPassword'] ."\n";

if (isset($_POST['email']) && isset($_POST['inputPassword']) && isset($_POST['fname']))
{
  $fname =  preg_replace('/[^[:alpha:]_]/', '',$_POST['fname']);
  $lname = preg_replace('/[^[:alpha:]_]/', '',$_POST['lname']);
  $email = $_POST['email'];
  $confirm = $_POST['confirm'];
  $profession = preg_replace('/[^[:alpha:]_]/', '',$_POST['profession']);
  $birthday = preg_replace('/[^[:alpha:]_]/', '',$_POST['birthday']);
  $gender = $_POST['gender'];
  $psswd = preg_replace('/[^[:alpha:]_]/', '',$_POST['inputPassword']);


  $query = "SELECT* FROM user WHERE email = '$email'";
  $rslt = $connection->query($query);

  if (mysqli_num_rows($rslt)>0)
  {
    echo "esse usuário já existe";

  }
  else if ($email===$confirm)
  {
    $sql ="INSERT INTO `user` (`fname`, `lname`,`email`,`profession`,`birthday`,`gender`,`psswd`) VALUES ('$fname','$lname','$email','$profession','$birthday','$gender', '$psswd')";
    if($connection->query($sql)===TRUE)
    {
      echo "Nova entrada criada com sucesso";
      header("location:login.html");
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
