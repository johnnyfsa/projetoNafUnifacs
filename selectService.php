<?php
include 'connect.php';
$sql1="SELECT * FROM services";
$rslt1=$connection->query($sql1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Select Service</title>
  </head>
  <body>
    <div class="painel">
      <h3>Select Service</h3>
      <div class="slection">
        <form class="form1" action="DateChoser.php" method="post" id="serviceForm">
          <input type="text" name="selectedService" list="services" required/>
          <datalist class="serviceList" id="services">
            <?php
              if (mysqli_num_rows($rslt1)>0)
              {
                while ($row=$rslt1->fetch_assoc())
                {
                  echo "<option value=\"".$row["service_id"]."\">".$row["description"]."</option>";
                }
              }
             ?>
          </datalist>
        </form>
      </div>
      <div class="options">
        <a href="painel.php"> Go Back</a>
        <input type="submit" name="submit" value="Next" form="serviceForm">

      </div>
    </div>
  </body>
</html>
