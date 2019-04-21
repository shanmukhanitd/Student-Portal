<?php 
  include_once 'connect.php';
  session_start();
  $username=$_SESSION['username'];
  $sql='SELECT Name,RollNo,RegistrationNo,year from student where username="'.$username.'";';
  $sql1='SELECT * from marks where username="'.$username.'";';
  $result=$con->query($sql);
  $result1=$con->query($sql1);
  $row=mysqli_fetch_assoc($result);
  $row1=mysqli_fetch_assoc($result1);
  $total=0;
  $marks=0.0;
  for($i=1;$i<$row1['semester'];$i++)
  {
    $j='sem'.$i;
    if($i<3){
      $marks+=$row1[$j]*250;
      $total=$total+250;
    }
    else{
      $marks+=$row1[$j]*220;
      $total=$total+220;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Print</title>
  <script type="text/javascript" src="jquery.min.js"></script>
  <style type="text/css">
    #content{
      margin-left: 3%;
    }
    #results{
      text-align: center;
    }
    table{
      width: 100%;
      border-collapse: collapse;
    }
    th,td{
      padding: 5px;
      font-size: 20px;
      border:1px solid black;
    }
  </style>
</head>
<body>
  <div id="content"><b>
    <div style="height: 70px;">
      <img src="pics/collegeLogo.PNG" style="float: left; width: 100px;height: 100px;">
      <h2 style="font-size: 20px; margin-top: 40px; ">NATIONAL INSTITUTE OF TECHNOLOGY DURGAPUR</h2>
      <h3>&ensp;&emsp;&emsp;&emsp;Mahatma Gandhi Avenue, Durgapur - 713209, INDIA</h3>
    </div>
    <br><br>
    <div id="results">
      <span style="font-size: 20px;"><u>Provisional Grade Card</u></span>
      <br><br><br><br><br>
      
      <table border="1">
        <tr>
          <td>Branch : B.Tech-<?php echo substr($row['RollNo'],3,5);?> (Regular)</td>
          <td>Current Semester : <?php echo $row1['semester'];?></td>
          <td>Year : <?php echo $row['year']; ?></td>
        </tr>
        <tr>
          <td colspan="2">Name: <?php echo $row['Name']; ?></td>
          <td>Roll No: <?php echo $row['RollNo']; ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td>Reg. No: <?php echo $row['RegistrationNo']; ?></td>
        </tr>
      </table>
      <br><br><br>
      <table>
        <thead>
          <th>SEMESTER</th>
          <th>SGPA</th>
        </thead>
        <?php 
          for($i=1;$i<$row1['semester'];$i++){
            $j='sem'.$i;
            $k='Sem '.$i;
            echo '<tr><td>'.$k.'</td><td>'.$row1[$j].'</td></tr>';
          }
        ?>
      </table>
      <br><br><br>
      <table>
        <tr>
          <td>CGPA</td>
          <td><?php echo round($marks/$total,2); ?></td>
        </tr>
      </table>
      <br><br><br><br><br>

    </div>
    
  </b></div>
  <p>Note:</p>
  <p style="margin-left: 40px;">
1. It is an electronically generated print, signature in original not required.<br>
2. Final grade card will be issued shortly.</p>
</body>
</html>