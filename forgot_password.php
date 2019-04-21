<?php session_start();
      if(isset($_SESSION['username']) || isset($_SESSION['adminusername'])){
        header("Location: home.php");
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot_Password</title>
	<link rel="stylesheet" type="text/css" href="home.css">
  <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
  <script type="text/javascript" src="jquery.min.js"></script>
  <style type="text/css">
    h1{
        padding: 0 0 20px;
        text-align: center;
        font-size: 30px;
    }

    h5{
      text-align: center;
    }

    #background{
        background: rgba(255, 255, 255, 0.7);
        color: #000;
        top: 200px;
        left: 430px;
        width: 500px;
        position: absolute;
        box-sizing: border-box;
        padding: 50px 30px;
        border-radius: 15px;
        font-family: 'Bad Script', cursive;
        margin-bottom: 200px; 
    }

    input[type='text'],input[type='number'],input[type='password']{
      width: 80%;
      margin-bottom: 20px;
      margin-top: 10px;
      font-family: 'Roboto Condensed', sans-serif;
      border: none;
      border-bottom: 1px solid #000;
      background: transparent;
      outline: none;
      height: 40px;
      color: #000;
      font-size: 20px;
      margin-left: 40px;
    }

    #background button{
        border: none;
        outline: none;
        height: 50px;
        width: 170px;
        background: #ED1C24;
        color: #fff;
        font-size: 24px;
        border-radius: 25px;
        font-family: 'Bad Script', cursive;
        margin-left: 20px;
        display: inline-block;
        margin-left: 120px;
        margin-bottom: 30px;
    }

    #background button:hover{
        cursor: pointer;
        background: #009DF7;
    }

    #background a{
        text-decoration: none;
        font-size: 16px;
        color: #000;
        margin-left: 90px;
    }

    #background a:hover
    {
        color: #005988;
    }
  </style>
</head>


<body style="background: url(wallpaper.jpg); background-size: cover; background-position: center; height:100vh;">
	<div class="navbar" style="opacity: 1">
        <a href="home.php" >Home</a>
        <a href="adminLogin.php">Admin Login</a>
        <div class="dropdown">
            <button class="dropbtn">Student 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="loginpage.php" >Login</a>
              <a href="registerPage.php">Register</a>
              
            </div>
        </div> 
        <a href="#">About Us</a>
	</div>

  <div id="background">
    <div id="one">
      <h1>Forgot Password</h1>
      <h5 id="errorusername" style="margin-top: -20px; margin-bottom: -10px; color: red;"></h5>
      <input type="text" name="username" id="username" placeholder="USERNAME">
      <button id="submitusername">Submit</button><br>
      <a href="loginpage.php">Login</a>
      <a href="registerPage.php">Sign Up</a>
    </div>

    <div id="two">
      <h1>Enter OTP</h1>
      <h5 id="errorotp" style="margin-top: 0px; margin-bottom: 0px; color: red;"></h5>
      <input type="number" name="otp" id="otp" placeholder="OTP">
      <button id="submitotp">Submit</button>
    </div>

    <div id="three">
      <h1>Reset Password</h1>
      <input type="password" name="password" id="password" placeholder="********" onkeyup="funcpass()" onblur="funcpass1()">
      <span id="passspan" style="margin-left:15px; color: red;"></span>
      <input type="password" name="password" id="password1" placeholder="********" onblur="funcconfirm()">
      <span id="confirmspan" style="color: red;"></span>
      <button id="submitpassword">Submit</button>
    </div>
  </div>




<script type="text/javascript">
    var username="shanmukha_nitd";
    $('#two').hide();
    $('#three').hide();
    $('#submitusername').click(function(){
        username=$('#username').val();
        if(username==""){
          setTimeout(function () {
              document.getElementById("errorusername").innerHTML = "";
          }, 4000);
          document.getElementById("errorusername").innerHTML="Please Provide your username";
        }
        else{
          var formdata={};
          formdata['username']=username;
          formdata['sendmail']='submit';
          $.post('phpmailer1/sendmail.php',formdata,function(data,status,xhr){
            if(data=="nouser"){
              setTimeout(function () {
                  document.getElementById("errorusername").innerHTML = "";
              }, 4000);
              document.getElementById("errorusername").innerHTML="Username doesn't exist";
            }
            else if(data=='send'){
              $('input[type=text]').remove();
              $('#one').hide();
              $('#two').show();
            }
            else{
              alert(data);
            }
          });
        }
    });

    $('#submitotp').click(function(){
      if($('#otp').val()==""){
        setTimeout(function () {
            document.getElementById("errorotp").innerHTML = "";
        }, 4000);
        document.getElementById("errorotp").innerHTML="Please Enter OTP";
      }
      else{
        var formdata={};
        formdata['username']=username;
        formdata['otp']=$('#otp').val();
        formdata['submitotp']='submit';
        $.post('phpmailer1/sendmail.php',formdata,function(data,status,xhr){
          if(data=='wrong'){
            setTimeout(function () {
                document.getElementById("errorotp").innerHTML = "";
            }, 4000);
            document.getElementById("errorotp").innerHTML="OTP is incorrect, please enter correct one.";
          }
          else if(data=='ok'){
            $('input[type=number]').remove();
            $('#two').hide();
            $('#three').show();
          }
          else{
            alert(data);
          }
        });
      }
    });


    $('#submitpassword').click(function(){
      if($('#password').val()=="" || document.getElementById('passspan').innerHTML!=""){
        document.getElementById('password').focus();
        return;
      }
      if($('#password').val()=="" || document.getElementById('confirmspan').innerHTML!=""){
        document.getElementById('password1').focus();
        return;
      }
      var formdata={};
      formdata['username']=username;
      formdata['password']=$('#password').val();
      formdata['submitpassword']='submit';
      $.post('phpmailer1/sendmail.php',formdata,function(data,status,xhr){
        if(data=="ok"){
          window.location.replace('loginpage.php?forgot=success');
        }
        else{
          window.location.replace('loginpage.php?forgot=error');
        }
      });
    });


    function funcpass()
        {
            var password=document.getElementById("password").value;
            var pat1=/[A-Z]/g;
            var pat2=/[a-z]/g;
            var pat3=/[0-9]/g;
            var pat4=/[%!@#$&^*]/g;
            var result="";
            if(password.match(pat1)==null)
            {
                result+="Upper case is required. <br>";
            }
            if(password.match(pat2)==null)
            {
                result+="Lower case is required.<br>";
            }
            if(password.match(pat3)==null)
            {
                result+="digit is required.<br>";
            }
            if(password.match(pat4)==null)
            {
                result+="One special character !@#$%^&* is required.";
            }
            document.getElementById("passspan").innerHTML=result;
        }

        function funcpass1()
        {
            var password=document.getElementById("password").value;
            var pat=/[^A-Z0-9a-z!@#$%^&*]/g;
            var pat1=/[A-Z]/g;
            var pat2=/[a-z]/g;
            var pat3=/[0-9]/g;
            var pat4=/[%!@#$&^*]/g;
            var result="";
            if(password.match(pat1)==null)
            {
                result+="Upper case is required. <br>";
            }
            if(password.match(pat2)==null)
            {
                result+="Lower case is required.<br>";
            }
            if(password.match(pat3)==null)
            {
                result+="digit is required.<br>";
            }
            if(password.match(pat4)==null)
            {
                result+="One special character !@#$%^&* is required.<br>";
            }
            if(password.match(pat)!=null)
            {
                result+="Dont use special characters other than !@#$%^&*.<br>";
            }
            if(password.length<8 || password.length>15)
            {
                result+="Length of Password must be min 8 & max 15.";
            }
            document.getElementById("passspan").innerHTML=result;
        }

        function funcconfirm()
        {
            var password=document.getElementById("password").value;
            var confirm=document.getElementById("password1").value;
            if(password!=confirm)
            {
                document.getElementById("confirmspan").innerHTML="password is not matching.";
            }
            else
            {
                document.getElementById("confirmspan").innerHTML="";
            }
        }
</script>
</body>
</html>