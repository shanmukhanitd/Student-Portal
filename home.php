<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="icon" type="image/ico" href="pics/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    
    
</head>
<body style="background: url(3837.jpg); background-size: cover; background-position: center; height:100vh;">

    <?php 
        if(isset($_GET['registration'])){
          $message="Your registration is ".$_GET['registration'].".";
          echo '<div style="width: 100%; background-color: green; margin-top:-20px; margin-bottom:-20px; text-align: center;">
                    <h2 id="success"></h2>
                </div>
                <script>
                    setTimeout(function () {
                        document.getElementById("success").innerHTML = "";
                        window.location.href="home.php";
                    }, 4000);
                    document.getElementById("success").innerHTML="'.$message.'";
                </script>';
        }
        if(isset($_GET['logout'])){
          echo '<div style="width: 100%; background-color: green; margin-top:-20px; margin-bottom:-20px; text-align: center;">
                    <h2 id="success"></h2>
                </div>
                <script>
                    setTimeout(function () {
                        document.getElementById("success").innerHTML = "";
                        window.location.href="home.php";
                    }, 4000);
                    document.getElementById("success").innerHTML="You were Successfully Logged out.";
                </script>';
        }
    ?>
    <div class="navbar">
        <?php 
            if(isset($_SESSION['username'])){
              echo '<a href="student.php">Profile</a>
              <a href="request.php">Request</a>
              <a href="student_feedback.php">Feedback</a>
              <a href="about/Aboutus.php">About Us</a>

              <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>';
            }
            else if(isset($_SESSION['adminusername'])){
              echo '<a href="admin.php">AdminPage</a>
              <a href="admin_faq.php">Feedback</a>
              <a href="about/Aboutus.php">About Us</a>
              <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>';
            }
            else{
              echo '<a href="" style="background-color: rgb(22, 96, 25); cursor: not-allowed;">Home</a>
                <a href="adminLogin.php">AdminLogin</a>
                <div class="dropdown">
                    <button class="dropbtn">Student 
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="loginpage.php">Login</a>
                      <a href="registerPage.php">Register</a>
                      
                    </div>
                </div> 
                <a href="about/Aboutus.php">About Us</a>';
            }
        ?>
    </div>
              
              <div class="heading">
                  <h3>Student Information Service</h3>
              </div>
</body>
</html>
