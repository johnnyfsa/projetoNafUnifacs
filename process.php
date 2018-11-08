<?php
include('connect.php');

$service=$_POST['service'];
$data=$_POST['data'];
$time=$_POST['tempo'];

session_start();
$id=$_SESSION['id'];

$sql2 = "SELECT id FROM user WHERE id ='$id' ";
$rslt2 = $connection->query($sql2);
$row = $rslt2->fetch_assoc();
$userID = $row["id"];
$sql="INSERT INTO `booking` (`book_date`, `service_id`, `user_id`,`book_id`,`book_hour`) VALUES ('$data', '$service','$userID',NULL,'$time')";
if($connection->query($sql)===TRUE)
{
  echo "Nova entrada criada com sucesso";
  header("location:painel.php");
}
else
{
  echo "Error:".$sql."<br>".$connection->error;
}
 ?>
