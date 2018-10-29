<?php
include('connect.php');
$day = $_POST['date'];
$ym = $_POST['ym'];
$finalDate = $ym."-".$day;
$service = $_POST['service'];

echo $service."<br>".$finalDate."<br>";

$sql ="SELECT times.time FROM times JOIN booking WHERE booking.book_date='$finalDate' AND booking.service_id='$service' AND times.time!=booking.book_hour";
$sql2 ="SELECT * FROM times";
$rslt=$connection->query($sql);
$rslt2=$connection->query($sql2);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Select Aviable Times</title>
   </head>
   <body>
     <div class="container">
       <form class="form1" action="process.php" method="post" id="forma">
         <input type="hidden" name="data" value="<?php echo $finalDate; ?>">
         <input type="hidden" name="service" value="<?php echo $service; ?>">
       </form>
       <select name="tempo" form="forma">
         <?php
         if (mysqli_num_rows($rslt)>0)
         {
           while ($row = $rslt->fetch_assoc())
           {
             echo "<option value=\"".$row["time"]."\">".$row["time"]."</option>";
           }
         }
         else
         {
           while ($row = $rslt2->fetch_assoc())
           {
             echo "<option value=\"".$row["time"]."\">".$row["time"]."</option>";
           }
         }
          ?>
       </select>
       <input type="submit" name="envia" value="Submit" form="forma">
     </div>
   </body>
 </html>
