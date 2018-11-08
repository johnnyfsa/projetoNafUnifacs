<?php
include('connect.php');
$lenght = $_POST['lenght'];
$bookIDs = array();
//preenche o array de linhas que serão deletadas
for ($i=0; $i <$lenght ; $i++)
{
  if (isset($_POST["id$i"]))
  {
    $bookIDs[$i] = $_POST["id$i"];
  }
}
//formula as querys que serão deletadas no banco de dados
for ($i=0; $i <$lenght ; $i++)
{
  if (isset($bookIDs[$i]))
  {
    $query = "DELETE FROM `booking` WHERE book_id = $bookIDs[$i]";
    if ($connection->query($query)===true)
    {
      header("location:painel.php");
    }
  }

}

 ?>
