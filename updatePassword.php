<?php
include('connect.php');
session_start();
if (isset($_POST['current']) && isset($_POST['new']))
{
  $current = $_POST['current'];
  $new = $_POST['new'];
  $id = $_SESSION['id'];
  $query = "SELECT `psswd` FROM `user` WHERE id ='$id' ";
  $rslt = $connection->query($query);
  if (mysqli_num_rows($rslt) > 0)
  {
    $fetch = $rslt->fetch_assoc();
    if ($fetch["psswd"]==$current)
    {
      $query = "UPDATE `user` SET `psswd`='$new' WHERE id = '$id'";
      if ($connection->query($query)===true)
      {
        header("location:index.php");
      }
      else
      {
        echo "erro: não foi possível atualizar senha";
      }
    }
  }
}
 ?>
