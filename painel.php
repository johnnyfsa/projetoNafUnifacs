
 <?php
 include('connect.php');

  session_start();
 if (!isset($_SESSION["id"]))
 {
   header("location:loginPage.html");
   exit;
 }
 else
 {
  echo "logged in successfully";
 }
$id = $_SESSION['id'];
 $sql = "SELECT booking.book_date AS data, booking.book_hour AS hour , services.description AS service, booking.service_id, booking.book_id FROM booking INNER JOIN user ON booking.user_id = user.id INNER JOIN services ON booking.service_id=services.service_id  WHERE user.id ='$id' ";
 $rslt =  $connection->query($sql);
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Set the page to the width of the device and set the zoon level -->
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <title>Painel</title>
    <style>


      .divTable
      {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
      }
      .tableData
      {
        border: 3px solid #000;
      }
      .divTableCell
      {
        display: inline-block;
        border: 3px solid #000;
      }
      .divTableHeadEntry
      {
        display: inline-block;
        border: 3px solid #000;
      }
      .button
      {
        font-size: 16px;
        padding: 15px 25px;
        text-align: center;
        background-color: orange;
      }
    </style>
  </head>
  <body>
<div class="divTable">
  <div class="divTableHead">
    <div class="divTableHeadEntry"> Personal Data</div>
    <div class="divTableHeadEntry"> Bookings </div>
  </div>
  <div class="divTableBody">
    <div class="divTableRow">
      <div class="divTableCell">
        <img src="img/profile-pic.jpg" alt="profile-pic" style="width:100px;height:75px;">
      </div>
      <div class="divTableCell">
        <form  action="selectService.php" method="post">
          <button class="button" type="submit" name="button"> book new entry</button>
        </form>
      </div>
    </div>
    <div class="divTableRow">
      <div class="divTableCell">
        <a href="editProfile.php">Edit Profile</a><br>
        <a href="alterPassword.html">Alter Password</a><br>
        <a href="logout.php"> Leave </a><br>
      </div>
      <div class="divTableCell">
        <table class="table table-bordered table-striped table-hover" id = "table">
          <form  action="deleteRow.php" method="post" id="deleteRow">
          <tr>
            <th class="text-center">Date</th>
            <th class="text-center">book_hour</th>
            <th class="text-center">Service</th>
            <?php
            $lenght=0;
            if (mysqli_num_rows($rslt) > 0)
            {
              while($row = $rslt->fetch_assoc())
              {
                echo "<tr class=\"tableRow\"><td class=\"tableData\">" .$row["data"]."</td><td class=\"tableData\">" .$row["hour"]. "</td><td class=\"tableData\">" .$row["service"]."</td><td class=\"tableData\">"."<input type =\"checkbox\" name=\"id$lenght\" value=\"".$row["book_id"]."\">"."</td></tr>";
                $lenght++;
              }
              echo "</table>";
            }
            else
            {
              echo "0 results";
            }
            $connection->close();
             ?>
          </tr>
          <input type="hidden" name="lenght" value="<?php echo $lenght ?>">
          </form>
        </table>

        <button type="submit" form="deleteRow" > Delete Selected Row</button>
      </div>
    </div>
  </div>
</div>

  </body>
</html>
