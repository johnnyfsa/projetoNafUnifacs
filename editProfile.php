<?php
include('connect.php');
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM `user` WHERE id='$id'";
$rslt = $connection->query($query);
//$fetch, $fname, $lname, $email, $prof, $bday, $gender;
if (mysqli_num_rows($rslt)>0)
{
  $fetch = $rslt->fetch_assoc();
  $fname = $fetch["fname"];
  $lname = $fetch["lname"];
  $email = $fetch["email"];
  $prof = $fetch["profession"];
  $bday = $fetch["birthday"];
  $gender = $fetch["gender"];

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
  </head>
  <body>
    <div class="outerTable">
      <div class="innerTable">
        <form class="form1" action="updateProfile.php" method="post">
          First name:<br>
          <input type="text" name="fname" value="<?php echo $fname; ?>" ><br>
          Last name:<br>
          <input type="text" name="lname" value="<?php echo $lname ?>" ><br>
          E-mail:<br>
          <input type="email" name="email" value="<?php echo $email ?>" ><br>
          Profession:<br>
          <input type="text" name="profession" value="<?php echo $prof; ?>"><br>
          Birthday:<br>
          <input type="date" name="birthday" value="<?php echo $bday ?>"><br>
          Gender:<br>
          <?php
          if ($gender=='male')
          {
            echo "<input type=\"radio\" name=\"gender\" value=\"male\" checked>Male<br>";
            echo "<input type=\"radio\" name=\"gender\" value=\"female\">Female<br>";
          }
          else
          {
            echo "<input type=\"radio\" name=\"gender\" value=\"male\">Male<br>";
            echo "<input type=\"radio\" name=\"gender\" value=\"female\" checked>Female<br>";
          }
           ?>

          <input type="submit"  value="submit">
        </form>
        <a href="painel.php">Go Back</a>
      </div>

    </div>
  </body>
</html>
