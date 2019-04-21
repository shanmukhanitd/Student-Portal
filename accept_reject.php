<?php 
    session_start();
    include_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>

	 <link rel="stylesheet" type="text/css" href="registrationStyles.css">   
     <link rel="stylesheet" type="text/css" href="tooltip.css">
     <link rel="stylesheet" type="text/css" href="home.css">
     <script type="text/javascript" src="jquery.min.js"></script>
     <script src="scripts.js"></script>

	<style type="text/css">
		
		html{
			    margin: 0;
			    padding: 0;
			    background: url('4.jpg') no-repeat center center fixed; 
			    -webkit-background-size: cover;
			    -moz-background-size: cover;
			    -o-background-size: cover;
			    background-size: cover;
			   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			}

			#box{
				margin: 50px auto;
				width: 550px;
				height: auto;
				background-color: rgb(242, 245, 218);
				opacity: 0.85;
				z-index: 1;
				padding-left: 11px;
				border: solid 2px transparent;
			}

			.subBox{
				margin: 20px;
				margin-bottom: 0px;
				border-bottom:1px solid #555; 
			}


			#topSubBox{
				margin-top: 50px;
			}

			.bold{
				font-size: 23px;
				font-weight: bold;
			}

			.info{
				font-size: 19px;
			}

			.show{
				border: none;
			    outline: none;
			    height: 40px;
			    width: 200px;
			    background: #ED1C24;
			    color: #fff;
			    font-size: 20px;
			    border-radius: 20px;
			    margin: 30px auto;
			}

			.show:hover{
				cursor: pointer;
    			background: #009DF7;
			}

	</style>
</head>
<body>

	<div class="navbar">
      
        <a href="home.php">Home</a>
        <a href="admin.php">AdminPage</a>
        <a href="admin_faq.php">Feedback</a>
        <a href="about/Aboutus.php">About Us</a>

        <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>

    </div>

	<div id="box">

        <?php
            echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Username :</span>&emsp;&ensp;<span id="username" class="info">'.$_POST['username'].'</span>
                    </div>';
            if(isset($_POST['request'])){
                $username=$_POST['username'];
                $sql='SELECT * from updaterequest where username="'.$username.'";';
                $result=$con->query($sql);
                $row=mysqli_fetch_assoc($result);
                if($row['Name']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Name :</span>&emsp;&ensp;<span id="name" class="info">'.$row['Name'].'</span>
                    </div>';
                }
                if($row['gender']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Gender :</span>&emsp;&ensp;<span id="gender" class="info">'.$row['gender'].'</span>
                    </div>';
                }
                if($row['FatherName']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Father\'s Name :</span>&emsp;&ensp;<span id="fatherName" class="info">'.$row['FatherName'].'</span>
                    </div>';
                }
                if($row['MotherName']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Mother\'s Name :</span>&emsp;&ensp;<span id="motherName" class="info">'.$row['MotherName'].'</span> </div>';
                }
                if($row['email']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Email :</span>&emsp;&ensp;<span id="email" class="info">'.$row['email'].'</span></div>';
                }
                if($row['department']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Department :</span>&emsp;&ensp;<span id="department" class="info">'.$row['department'].'</span>
                    </div>';
                }
                if($row['RollNo']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Roll Number :</span>&emsp;&ensp;<span id="rollNo" class="info">'.$row['RollNo'].'</span>
                    </div>';
                }
                if($row['RegistrationNo']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Registration NUmber :</span>&emsp;&ensp;<span id="registration" class="info">'.$row['RegistrationNo'].'</span>
                    </div>';
                }
                if($row['dob']!='0'){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Date of Birth :</span>&emsp;&ensp;<span id="dob" class="info">'.$row['dob'].'</span>
                    </div>';
                }
                if($row['year']!=0){
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Year of Passing :</span>&emsp;&ensp;<span id="year" class="info">'.$row['year'].'</span>
                    </div>';
                }

                echo '<div style="text-align:center">
                    <button class="show" id="back" onclick="backfunc(this)">Back</button>
                    <button class="show" id="update">Update</button>
                    <button class="show" id="reject1">Reject</button>
                </div>';
            }
        ?>
        <br>
        <div style="text-align:center">
            <button class="show" id="show_det">Complete Details</button>
        </div>

        <div id="container" style="display: none">
            <?php 
                $username=$_POST['username'];
                echo '<script> var username="'.$username.'"; </script>';
                    $sql='SELECT * from student where username="'.$username.'";';
                    $result=$con->query($sql);
                    $row=mysqli_fetch_assoc($result);
                    echo '<div class="subBox" id="topSubBox">
                        <span class="bold">Name :</span>&emsp;&ensp;<span id="name" class="info">'.$row['Name'].'</span>
                    </div>
                    <div class="subBox" >
                        <span class="bold">Username :</span>&emsp;&ensp;<span id="username" class="info">'.$row['username'].'</span>
                    </div>
                    <div class="subBox">
                        <span class="bold">Gender :</span>&emsp;&ensp;<span id="gender" class="info">'.$row['gender'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Father\'s Name :</span>&emsp;&ensp;<span id="fatherName" class="info">'.$row['FatherName'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Mother\'s Name :</span>&emsp;&ensp;<span id="motherName" class="info">'.$row['MotherName'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Address :</span>&emsp;&ensp;<span id="address" class="info">'.$row['Address'].'</span>
                    </div>
                    <div class="subBox">
                        <span class="bold">Mobile No :</span>&emsp;&ensp;<span id="mobile" class="info">'.$row['Mobile'].'</span>
                    </div>
                    <div class="subBox">
                        <span class="bold">Email :</span>&emsp;&ensp;<span id="email" class="info">'.$row['email'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Department :</span>&emsp;&ensp;<span id="department" class="info">'.$row['department'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Roll Number :</span>&emsp;&ensp;<span id="rollNo" class="info">'.$row['RollNo'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Registration Number :</span>&emsp;&ensp;<span id="regNo" class="info">'.$row['RegistrationNo'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Data of Birth :</span>&emsp;&ensp;<span id="dob" class="info">'.$row['dob'].'</span>
                    </div>
            
                    <div class="subBox">
                        <span class="bold">Age :</span>&emsp;&ensp;<span id="age" class="info">'.$row['year'].'</span>
                    </div>';
                if(!isset($_POST['request'])){
                    echo '<div style="text-align:center">
                            <button class="show" id="back1" onclick="backfunc(this)">Back</button>
                            <button class="show" id="accept" >Accept</button>
                            <button class="show" id="reject">Reject</button>
                    </div>';
                }
            ?>
    
        </div>
		
	</div>

    <script type="text/javascript">
        function backfunc(event) {
            window.location.replace("admin.php");
        }

        $(function(){
            $('#accept').click(function(){
                var formdata={};
                formdata['username']=username;
                formdata['accept']='accept';
                $.post('updatestudentprofile.php',formdata,function(data,status,xhr){
                    if(data=='ok'){
                        window.location.replace("admin.php");
                    }
                    else{
                        alert(data);
                    }
                })
            })
            $('#reject').click(function(){
                var formdata={};
                formdata['username']=username;
                formdata['reject']='reject';
                $.post('updatestudentprofile.php',formdata,function(data,status,xhr){
                    if(data=='ok'){
                        window.location.replace("admin.php");
                    }
                    else{
                        alert(data);
                    }
                })
            })

            $('#update').click(function(){
                var formdata={};
                formdata['username']=username;
                formdata['update']='update';
                $.post('updatestudentprofile.php',formdata,function(data,status,xhr){
                    if(data=='ok'){
                        $.post('phpmailer1/sendmail.php',formdata,function(data1,status1,xhr1){
                            if(data1=="send")
                                window.location.replace("admin.php");
                            else
                                alert(data1);
                        })
                    }
                    else{
                        alert(data);
                    }
                })
            })

            $('#reject1').click(function(){
                var formdata={};
                formdata['username']=username;
                formdata['reject1']='reject1';
                $.post('updatestudentprofile.php',formdata,function(data,status,xhr){
                    if(data=='ok'){
                        $.post('phpmailer1/sendmail.php',formdata,function(data1,status1,xhr1){
                            if(data1=="send")
                                window.location.replace("admin.php");
                            else
                                alert(data1);
                        })
                    }
                    else{
                        alert(data);
                    }
                })
            })
        })
    </script>
</body>
</html>