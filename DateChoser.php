<?php
session_start();
//set timezone
date_default_timezone_set('America/Bahia');
//get prev and next months
$service = $_POST['selectedService'];
if (isset($_GET['ym']))
{
  $ym = $_GET['ym'];
}
else
{
  //this month
  $ym = date('Y-m');
}
//check format
$timeStamp = strtotime($ym,"-01");
if ($timeStamp === false)
{
  $timeStamp = time();
}
//today
$today = date('Y-m-d',time());

//for h3 title
$html_title = date('Y-m', $timeStamp);
//links for prev and next months ..... mktime(hour, minute, second, month, day, year)
$prev = date('Y-m',mktime(0,0,0, date('m',$timeStamp)-1,1, date('Y',$timeStamp)));
$next = date('Y-m',mktime(0,0,0, date('m',$timeStamp)+1,1, date('Y',$timeStamp)));

//number of days in the month
$day_count = date('t', $timeStamp);

//days of the week 0:domingo 1:segunda 2:terca ... etc.
$str = date('w',mktime(0,0,0, date('m',$timeStamp),1, date('Y',$timeStamp)));

//create calendar
$weeks = array();
$week = '';

//add empty cell
$week .= str_repeat('<td></td>', $str);

for($day=1; $day <= $day_count;$day++, $str++)
{
  $date = $ym.'-'.$day;
  if ($today==$date)
  {
    $week .= '<td class="today">' ."<input type=\"submit\" name=\"date\" value=".$day.">";
  }
  else
  {
    $week .= '<td>'."<input type=\"submit\" name=\"date\" value=".$day.">";
  }
  $week .='</td>';
  //end of the week of end of the month
  if ($str % 7 == 6 ||$day == $day_count)
  {
    if ($day == $day_count)
    {
      //add empty cell
      $week .= str_repeat('<td></td>', 6-($str % 7));
    }
    $weeks[]='<tr>'.$week. '</tr>';
    //prepare for new week
    $week = '';
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Date Chooser</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      .container
      {
        font-family: 'Oswald', sans-serif;
        margin-top: 80px;
      }
      th
      {
        height: 30px;
        text-align: center;
        font-weight: 700;
      }
      td
      {
        height: 80px;
      }
      .today
      {
        background: lightblue;
      }
      th:nth-of-type(7)
      {
        color: red;
      }
      td:nth-of-type(7)
      {
        background-color: red;
      }
      th:nth-of-type(1)
      {
        color: orange;
      }
      td:nth-of-type(1)
      {
        background-color: orange;
      }
      input[type=submit]
      {
        padding:5px 15px;
        background:#ccc;
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px;
      }
      .options
      {
        text-align: center;
        background-color: gray;
      }
      .Back
      {
        color:white;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h3> <a href="?ym=<?php echo $prev; ?>"> &lt; </a> <?php echo $html_title ?> <a href="?ym=<?php echo $next; ?>"> &gt; </a> </h3>
      <br>
      <table class="table table-bordered">
        <tr>
          <th>D</th>
          <th>S</th>
          <th>T</th>
          <th>Q</th>
          <th>Q</th>
          <th>S</th>
          <th>S</th>
        </tr>
        <form class="" action="SelectTime.php" method="post">
          <input type="hidden" name="ym" value= "<?php  echo $html_title; ?>">
          <input type="hidden" name="service" value= "<?php  echo $service; ?>">
          <?php
          foreach ($weeks as $week)
          {
            echo $week;
          }
           ?>
        </form>
      </table>
    </div>
    <div class="options">
        <a class="Back" href="selectService1.php"> Go Back</a>
    </div>
  </body>
</html>
