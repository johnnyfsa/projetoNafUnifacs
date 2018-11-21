<?php
session_start();
$id = $_SESSION['id'];
$prof;
include('connect.php');
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['birthday']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $bday = $_POST['birthday'];
  if (isset($_POST['profession']))
  {
    $prof = $_POST['profession'];
  }
  else
  {
    $prof ="";
  }
  $gender = $_POST['gender'];
  $query = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`email`='$email',`gender`='$gender',`profession`='$prof',`birthday`='$bday' WHERE id = $id";
  if ($connection->query($query)===true)
  {
    echo "entrada atualizada com sucesso";
    header("location:index.php");
  }
  else
  {
    echo "erro: Existe mais de de uma entrada cadastrada com esse e-mail";
  }
}
 ?>
