
 <?php
 include('connect.php');

  session_start();
 if (!isset($_SESSION["email"])|| !isset($_SESSION["psswd"]))
 {
   header("location:loginPage.html");
   exit;
 }
 else
 {
  echo "logged in successfully";
 }
$email = $_SESSION['email'];
 $sql = "SELECT booking.book_date AS data, booking.book_hour AS hour , services.description AS service, booking.service_id FROM booking INNER JOIN user ON booking.user_id = user.id INNER JOIN services ON booking.service_id=services.service_id  WHERE user.email ='$email' ";
 $rslt =  $connection->query($sql);
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Painel</title>
    <style>

      .tableRow
      {
        cursor: pointer;
      }
      .tableRow:hover
      {
      background-color: blue;
      }
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
        <a href="#">Edit Profile</a><br>
        <a href="#">Alter Password</a><br>
        <a href="logout.php"> Leave </a><br>
      </div>
      <div class="divTableCell">
        <table class="table1" id = "table">
          <tr>
            <th>Date</th>
            <th>book_hour</th>
            <th>Service</th>
            <?php
            if (mysqli_num_rows($rslt) > 0)
            {
              while($row = $rslt->fetch_assoc())
              {
                echo "<tr class=\"tableRow\"><td class=\"tableData\">" .$row["data"]."</td><td class=\"tableData\">" .$row["hour"]. "</td><td class=\"tableData\">" .$row["service"]."</td></tr>";
                //echo $row["data"];
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
        </table>
        <button onclick="eraseRow()" > Delete Selected Row</button>
      </div>
    </div>
  </div>
</div>
<script>
  var table = document.getElementById("table");
  var rIndex;
  var day, hour, serv;

  for (var i = 1; i < table.rows.length; i++)
  {
    table.rows[i].onclick= function()
    {

      if (this.style.background=="blue")
      {
        this.style.background="inherit";
        rIndex=null;
        console.log(rIndex);
      }
      else
      {
        rIndex= this.rowIndex;
        day=this.cells[0].innerHTML;
        hour=this.cells[1].innerHTML;
        serv=this.cells[2].innerHTML;
        console.log(rIndex,day, hour, serv);
        this.style.background="blue";
      }
    }
  }
  function eraseRow()
  {
    if(rIndex!=null)
    {
      table.deleteRow(rIndex);
      rIndex = null;
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.open("POST","deleteBook.php?day="+day,true);
      xmlhttp.open("POST","deleteBook.php?hour="+hour,true);
      xmlhttp.open("POST","deleteBook.php?serv="+serv,true);
      xmlhttp.send();
    }

  }

</script>
  </body>
</html>
