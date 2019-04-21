<?php   session_start();
        if(isset($_SESSION['username'])){
            header("Location: student.php");
        }
        if(isset($_SESSION['adminusername'])){
            header("Location: admin.php");
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Form</title>
    <link rel="stylesheet" type="text/css" href="loginStyles.css">
     <link rel="stylesheet" type="text/css" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="" style="background-color: rgb(22, 96, 25); cursor: not-allowed;">AdminLogin</a>
        <div class="dropdown">
          <button class="dropbtn">Student 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="loginpage.php">Login</a>
            <a href="registerPage.php">Register</a>
            
          </div>
        </div> 
        <a href="about/Aboutus.php">About Us</a>
    </div>

    <div class="loginBox">
        <img src="pics/avatar1.png" class="avatar">
        <h5 id="incorrect" style="margin-top: -20px; margin-bottom: -10px; color: red;"></h5>
        <h1>Admin Login</h1>
            <p>Username :</p>
            <input type="text" name="username" id="username" required>
            <p>Password :</p>
            <input type="password" name="password" id="password" required>
            <input type="submit" name="submit" value="Login" id="submit"><br>
    </div>

    <script type="text/javascript">
        $('#submit').click(function(){
            var username=$('#username').val();
            var password=$('#password').val();
            if(username=="" || password==""){
                setTimeout(function () {
                        document.getElementById("incorrect").innerHTML = "";
                    }, 4000);
                document.getElementById("incorrect").innerHTML="Please fill the details.";
                $('#password').val('');
            }
            else{
                var formdata={};
                formdata['username']=username;
                formdata['password']=password;
                formdata['adminlogin']='submit';
                $.post('login.php',formdata,function(data,status,xhr){
                    if(data=="no"){
                        document.getElementById("incorrect").innerHTML="Username and/or password is incorrect.";
                        $('#password').val('');
                    }
                    else if(data=="ok"){
                        window.location.replace('admin.php');
                    }
                    else{
                        alert("Sorry unable to proceed");
                    }
                });
            }
        });
    </script>
</body>
</html>