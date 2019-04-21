<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: student.php");
    }
    if(isset($_SESSION['adminusername'])){
        header("Location: admin.php");
    }
?>
<html>
<head>
    <title>Student Login Form</title>
    <link rel="stylesheet" type="text/css" href="loginStyles.css">   
    <link rel="stylesheet" type="text/css" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
    <?php 
        if(isset($_GET['forgot'])){
            if($_GET['forgot']=='success'){
                $message="Your password is changed successfully.";
                echo '<div style="width: 100%; background-color: green; margin-top:-20px; margin-bottom:-20px; text-align: center;">
                    <h2 id="success"></h2>
                    </div>
                    <script>
                        setTimeout(function () {
                            document.getElementById("success").innerHTML = "";
                            window.location.href="loginpage.php";
                        }, 3000);
                        document.getElementById("success").innerHTML="'.$message.'";
                    </script>';
            }
            else{
                if($_GET['forgot']=='error'){
                    $message="Sorry, Something went wrong, sorry for inconvinence";
                }
                echo '<div style="width: 100%; background-color: red; margin-top:-20px; margin-bottom:-20px; text-align: center; color: white;">
                    <h2 id="error"></h2>
                    </div>
                    <script>
                        setTimeout(function () {
                            document.getElementById("error").innerHTML = "";
                            window.location.href="loginpage.php";
                        }, 5000);
                        document.getElementById("error").innerHTML="'.$message.'";
                    </script>';
            }
        }
    ?>

    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="adminLogin.php">Admin Login</a>
        <div class="dropdown">
          <button class="dropbtn" style="background-color:rgb(22, 96, 25);">Student 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="" style="background-color: rgb(22, 96, 25); cursor: not-allowed;">Login</a>
            <a href="registerPage.php">Register</a>
          </div>
        </div> 
        <a href="about/Aboutus.php">About Us</a>
    </div>

    <div class="loginBox">
        <img src="pics/avatar1.png" class="avatar">
        <h1>Student Login</h1>
        <h5 id="incorrect" style="margin-top: -20px; margin-bottom: -10px; color: red;"></h5>
            <p>Username :</p>
            <input type="text" name="username" id="username" required>
            <p>Password :</p>
            <input type="password" name="password" id="password" required>
            <input type="submit" name="login" id="login" value="Login"><br>
            <a href="forgot_password.php"><strong>Forgot Password ?</strong></a>
    </div>

    <script type="text/javascript">
        $('#login').click(function(){
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
                formdata['studentlogin']='submit';
                $.post('login.php',formdata,function(data,status,xhr){
                    if(data==0){
                        document.getElementById("incorrect").innerHTML="Sorry your request is still in progress.";
                        $('#password').val('');
                    }
                    else if(data==2){
                        document.getElementById("incorrect").innerHTML="Sorry your request has been rejected.<br> Please contact administrator.";
                        $('#password').val('');
                    }
                    else if(data=="no"){
                        document.getElementById("incorrect").innerHTML="Username and/or password is incorrect.";
                        $('#password').val('');
                    }
                    else if(data==1){
                        window.location.replace('student.php');
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