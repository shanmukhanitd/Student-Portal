<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <title>About Us</title>
    <link rel="icon" type="image/ico" href="../pics/logo.jpg" />
<style>
	.background{
	 background-image: url("back.jpg");
  	 height: 500px;
 	 background-position: center;
 	 background-repeat: no-repeat;
 	 background-size: cover;
 	 position: relative;
	 opacity:0.7;
	 filter: alpha(opacity=80);
	border-radius:2%;
	}
	.background:hover {
  		opacity: 1.0;
  		filter: alpha(opacity=100); /* For IE8 and earlier */
	}
	.onbackground{
	color:white;
	width:30%;
	
	position:absolute;
	padding-left:40px;
	top:50px;
	left:10px;
   }
	.background h1{
	color:red;
   }

p{
	color:red;
}
	.button {
		position:absolute;
		top:300px;
		left:100px;
		width:200px;
		padding:15px;
		color:white;
		}

	#flex_container{
		display: flex;
		margin-top:1px;
		background-color:grey;
		padding-left:150px;
		padding-top:50px;
		padding-bottom:50px;
		border-radius:10px;
		
  	
	}
	.member{
	width:25%;
	text-align:center;
	color:white;
	text-align:justify;
	margin-left:25px;
	margin-right:0px;
	border-radius:50%;
	
}
	 img{
	width:250px;
	 border-radius:50%;
	height:250px;
	
}

.flip-box {
  background-color: black;
  width: 250px;
  height: 250px;
  border: 1px solid #f1f1f1;
  perspective: 1000px;
	 border-radius:50%;
 
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
	 border-radius:50%;
}

.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

.flip-box-front{
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  border-radius:50%;
  text-align:center;	
}


 .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  border-radius:50%;
  text-align:center;	
}

.flip-box-front {
  background-color: #bbb;
  color: purple;
}

.flip-box-back {
  background-color: #555;
  color: white;
  transform: rotateY(180deg);
}
.name{
	text-align:center;
	font-size:20px;
	color:red;
}
#text{
	width: 700px;
	font-size:25px;
	font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
	color:rgb(58, 43, 75);
}



</style>
</head>
<body >
       <div class="navbar">
        <?php 
            if(isset($_SESSION['username'])){
              echo '<a href="../home.php">Home</a>
              <a href="../student.php">Profile</a>
              <a href="../request.php">Request</a>
              <a href="../student_feedback.php">Feedback</a>

              <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>';
            }
            else if(isset($_SESSION['adminusername'])){
              echo '<a href="../home.php">Home</a>
              <a href="../admin.php">AdminPage</a>
              <a href="../admin_faq.php">Feedback</a>

              <a href="../logout.php" style="float: right; margin-right: 10px;">Logout</a>';
            }
            else{
              echo '<a href="../home.php">Home</a>
                <a href="../adminLogin.php">AdminLogin</a>
                <div class="dropdown">
                    <button class="dropbtn">Student 
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="../loginpage.php">Login</a>
                      <a href="../registerPage.php">Register</a>
                      
                    </div>
                </div> 
                <a href="about/Aboutus.php" style="background-color: rgb(22, 96, 25); cursor: not-allowed;">About Us</a>';
            }
        ?>
    </div>

<div class="background">
	<div class="onbackground">
		<h1>AboutUs</h1>
		<p id="text">We are the students of <b>NIT Durgapur</b> and with three members in a team we designed here we designed student login portal with php backend.We are very creative team members who are very experienced designing many webpages.</p>
	</div>
	
</div>
<div id="container" >
<div Id="flex_container" >
	<div class="member">

		<div class="flip-box">
  			<div class="flip-box-inner">
    				<div class="flip-box-front">
   					<img src="Suraj.jpeg"></img>
				</div>
    				<div class="flip-box-back">
					<br>
					<br>
      					<h3>Suraj</h3>
      					<p> !!</p>
    				</div>
			</div>

 		 </div>
		<p style="width:250px;padding-left:5px;" >
			<p>
				

			</p>	
		</p>
	</div>
	<div class="member" >
		<div class="flip-box">
  			<div class="flip-box-inner">
    				<div class="flip-box-front">
   					<img src="Shanmukha.jpg"></img>
				</div>
    				<div class="flip-box-back">
					<br>
					<br>
      					<h3>Shanmukha</h3>
      					<p>!!</p>
    				</div>
			</div>

 		 </div>
		<p style="width:300px;">
			
		</p>

	</div>
	<div class="member">
		<div class="flip-box">
  			<div class="flip-box-inner">
    				<div class="flip-box-front">
   					<img src="Atul.jpeg"></img>
				</div>
    				<div class="flip-box-back">
					<br>
					<br>
      					<h3>Atul</h3>
      					<p>!!!</p>
    				</div>
			</div>

 		 </div>			
		
		<p id="pradum" style="width:250px;">
			
		</p>
	</div>

</div>
</div>


</body>
</html>