<?php
include('connect.php');

$service=$_POST['service'];
$data=$_POST['data'];
$time=$_POST['tempo'];

session_start();
$id=$_SESSION['id'];

$sql="INSERT INTO `booking` (`book_date`, `service_id`, `user_id`,`book_id`,`book_hour`) VALUES ('$data', '$service','$id',NULL,'$time')";
if($connection->query($sql)===TRUE)
{
  echo "Nova entrada criada com sucesso";
  header("location:index.php");
}
else
{
  echo "Error:".$sql."<br>".$connection->error;
}
 ?>
