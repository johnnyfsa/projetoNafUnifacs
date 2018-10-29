<?php
include('connect.php');
$day=$_POST['day'];
$hour=$_POST['hour'];
$serv=$_POST['serv'];
session_start();
$email=$_SESSION['email'];

$sql2 = "SELECT id FROM user WHERE email='$email'";
$rslt = $connection->query($sql2);
$row = $rslt->fetch_assoc();
$userID = $row["id"];

$sql3 = "SELECT services.service_id FROM `booking` INNER JOIN `services` ON booking.service_id=services.service_id WHERE booking.book_date = '$day' AND services.description='$serv' AND booking.book_hour='$hour'";
$rslt = $connection->query($sql3);
$row = $rslt->fetch_assoc();
$serviceID = $row["service_id"];

echo $serviceID."<br>".$userID;

 ?>
