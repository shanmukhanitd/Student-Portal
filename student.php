<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: loginpage.php");
	}
	include_once 'connect.php';
	$username=$_SESSION['username'];
	$sql='SELECT * from student where username="'.$username.'";';
	$result=$con->query($sql);
	$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  
     <link rel="stylesheet" type="text/css" href="tooltip.css">
     <link rel="stylesheet" type="text/css" href="home.css">
     <script type="text/javascript" src="jquery.min.js"></script>

	<style type="text/css">
		
		html{
		    margin: 0;
		    padding: 0;
		    background: url('pics/background.jpeg') no-repeat center center fixed; 
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
		    font-family: 'Oswald', sans-serif;
		}

		#box{
			margin: 50px auto;
			width: 550px;
			height: auto;
			background-color: white;
			opacity: 0.85;
			z-index: 1;
			border: solid 2px transparent;
			padding-left: 25px;	
			border-radius: 5px;		
		}

		#marks{
			margin: 50px auto;
			background-color: rgba(245,245,245,0.7);
			width: 500px;
			text-align: center;
			border-radius: 5px;
		}

		.subBox{
			margin: 20px;
			margin-bottom: 0px;
		}

		#profilePic{
			height: 150px;
			width: 150px;
			border-radius: 50%;
			z-index: 2;
			margin-top: 10px;
			margin-left: 23%;
			border: solid 2px grey;
		}

		.bold{
			font-size: 23px;
			font-weight: bold;
		}

		.info{
			font-size: 19px;
		}

		button{
			border: none;
		    outline: none;
		    height: 40px;
		    background: #ED1C24;
		    color: #fff;
		    font-size: 20px;
		    border-radius: 10px;
		    margin-top: 20px;
		    margin-bottom: 10px;
		    padding-left: 10px;
		}

		button:hover, #profilelabel:hover{
			cursor: pointer;
			background: #009DF7;
		}

		input[type="file"]{
			width: 0.1px;
			height: 0.1px;
		}

		#profilelabel{
			padding: 5px;
			border-radius: 15px;
			background-color: red;
			margin-top:10px;
			position: absolute;
			padding: 5px;
			margin-left: -50px;
		}

		.image{
			border-radius: 50%;
			width: 100px;
			height: 100px;
		}

		#enter{
			background-color: white;
			border-color: #565656;
			position: absolute;
		   top: 25%;
		   left: 30%;
		   z-index: 1;
		   padding: 30px;
		   width: 400px;
		   text-align: center;
		}

		input[type="text"], input[type="password"], input[type="email"], input[type="date"], input[type="number"]
		{
		    width: 80%;
		    font-family: 'Roboto Condensed', sans-serif;
		    border: none;
		    border-bottom: 1px solid #000;
		    background: transparent;
		    outline: none;
		    height: 40px;
		    color: #000;

		    font-size: 20px;
		}

		select{
			-moz-appearance: none;
		    appearance: none;
		    padding: 5px;
		    margin-top: 40px;
		    width: 250px;
		    background-color: rgba(255, 255, 255, 0.45);
		    border-radius: 5px;
		    border:3px solid #ccc;
		    background: transparent;
		}
		#errormsg{
			margin-top: 5px;
			position: absolute;
		}
		.errormsg{
			border-radius: 10px;
		}

	</style>
</head>
<body>
	<span style="width: 100%; background-color: red;" id="content"></span>
    <?php 
    	$sql1='SELECT * from marks where username="'.$username.'";';
    	$result1=$con->query($sql1);
    	if($result1->num_rows==0){
    		echo '<div class="navbar">
			        <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>
			    </div>';
    		echo '<div id="enter">
		    		<div id="divimage"><img src="'.$row["profile"].'" class="image" id="image"><br><div>
			    	<input type="file" name="file" id="file">
			    	<span style="background-color: red; color:white; font-size: 20px; text-align:center" id="errormessage" class="errormsg"></span><br>

			    	<label for="file" id="profilelabel" title="Only jpg/jpeg/png">Choose Your Profile</label><br>
			    	<select name="semester" id="semester" onblur="sem()">
			        	<option value=" ">Semester</option>
			        	<option value="1">Sem 1</option>
			        	<option value="2">Sem 2</option>
			        	<option value="3">Sem 3</option>
			        	<option value="4">Sem 4</option>
			        	<option value="5">Sem 5</option>
			        	<option value="6">Sem 6</option>
			        	<option value="7">Sem 7</option>
			        	<option value="8">Sem 8</option>
			        </select><br><span style="background-color: red; color:white; font-size: 20px; text-align:center" id="errormsg" class="errormsg"></span><br><hr>
			        <button id="submitmarks" style="width:200px;">Submit</button>
		    </div>';
    	}
    	else{
    		$row1=mysqli_fetch_assoc($result1);
			echo '<div class="navbar">
      
		        <a href="home.php">Home</a>
		        <a href="request.php">Update Request</a>
		        <a href="student_feedback.php">Feedback</a>
		        <a href="about/Aboutus.php">About Us</a>
		        <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>
		    </div>';
		    echo '<div id="box">
				<img src='.$row['profile'].' id="profilePic">
				<div class="subBox" id="topSubBox">
					<span class="bold">Name : </span>&emsp;&ensp;&emsp;<span id="name" class="info">'. $row["Name"].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Gender : </span>&emsp;&ensp;&emsp;&ensp;&emsp;&emsp;<span id="gender" class="info">'.$row['gender'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Father\'s Name : </span>&emsp;&ensp;&ensp;&emsp;<span id="fatherName" class="info">'.$row['FatherName'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Mother\'s Name : </span>&emsp;&ensp;<span id="motherName" class="info">'.$row['MotherName'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Address : </span>&emsp;&ensp;<span id="address" class="info">'.$row['Address'].'</span>
				</div>
				<div class="subBox">
					<span class="bold">Mobile : </span>&emsp;&ensp;&emsp;&emsp;&ensp;&ensp;<span id="mobile" class="info">'.$row['Mobile'].'</span>
				</div>
				<div class="subBox">
					<span class="bold">Email : </span>&emsp;&ensp;&emsp;&emsp;&ensp;&ensp;<span id="email" class="info">'.$row['email'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Department : </span>&emsp;&ensp;&ensp;<span id="department" class="info"> '.$row['department'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Roll Number : </span>&emsp;&ensp;<span id="rollNo" class="info">  '. $row['RollNo'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Registration No : </span>&emsp;<span id="regNo" class="info">'.$row['RegistrationNo'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Data of Birth : </span>&ensp;&ensp; <span id="dob" class="info">'.$row['dob'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Age : </span>&emsp;&emsp;&emsp;&emsp;&ensp;<span id="age" class="info">'.$row['age'].'</span>
				</div>

				<div class="subBox">
					<span class="bold">Year of Passing Out : </span>&emsp;&ensp;<span id="year" class="info">'.$row['year'].'</span>
				</div>

				<button id="editButton" style="margin-left:20%;">Edit Profile</button>
				<button id="displaymarks" style="margin-right:25%; float:right">Academics</button>
			</div>';
			echo '<div id="marks" >
					<div class="subBox1" style="padding-bottom:15px;">
						<span class="bold">Cuurent Semester : </span>&emsp;&emsp;&emsp;&emsp;&ensp;<span id="'.$row1['semester'].'" class="info">'.$row1['semester'].'</span>
					</div>';
			for($i=1;$i<$row1['semester'];$i++){
				$j='sem'.$i;
				echo '<div class="subBox1" style="padding-bottom:15px;">
						<span class="bold">Semester '.$i.' Marks : </span>&emsp;&emsp;&emsp;&emsp;&ensp;<span id="'.$j.'" class="info">'.$row1[$j].'</span>
					</div>';
			}
			echo '<button id="backButton" style="width:100px;">Back</button>
					<button id="print" style="margin-left:20px;">Print Grade Card</button>
				</div>';
    	}
    ?>
    
	
	

	<script type="text/javascript">

		function sem(){
			var val=document.getElementById('semester').value;
			$('.sem').remove();
			if(val==" "){
				setTimeout(function () {
                    document.getElementById("errormsg").innerHTML = "";
                }, 4000);
            	document.getElementById("errormsg").innerHTML="Please select your Semester.";
			}
			else{
				for (var i = 1; i < val; i++) {
					var j="sem"+i;
					$("button").before("<input type='number' name='"+j+"' placeholder='"+j+" marks' class='sem' id='"+j+"'>");
				}
			}
			$('button').show();
		}

		$('#print').click(function(){
				printPage('print.php');
			
		})
		var size;
		$('#marks').hide();
		$("#editButton").click(function(){
			window.location.replace("EditProfile.php");
		});

		$('#displaymarks').click(function(){
			$('#box').hide();
			$('#marks').show();
		});

		$('#backButton').click(function(){
			$('#marks').hide();
			$('#box').show();
		})

		$("#submitmarks").click(function(event){
			event.preventDefault();
			var pic=document.getElementById('image').getAttribute('src');
			if(pic=="profile/avatar.png"){
				setTimeout(function () {
                        document.getElementById("errormessage").innerHTML = "";
                    }, 4000);
                document.getElementById("errormessage").innerHTML=" Please upload your photo";
			}
			else{
				var val=document.getElementById("semester").value;
				if(val!=" " && (val>0 && val<9)){
					var formdata={};
					formdata['semester']=val;
					var f=0,j;
					for(var i=1;i<val;i++){
						j='sem'+i;
						if($('#'+j).val()=='' || $('#'+j).val()<=0 || $('#'+j).val()>10){
							setTimeout(function () {
			                        document.getElementById("errormsg").innerHTML = "";
			                    }, 4000);
			                document.getElementById("errormsg").innerHTML=" Values are in between 0 and 10.";
							f=1;
							break;
						}
					}
					if(f==0){
						for(var i=1;i<val;i++){
							j='sem'+i;
							formdata[j]=$('#'+j).val();
						}
						$.post('uploadmarks.php',formdata,function(data,status,xhr){
							if(data=="Thank You")
								window.location.replace('student.php');
							else{
								document.getElementById('content').innerHTML="Not uploaded. Try again";
							}
						});
					}
				}
				else{
					setTimeout(function () {
	                        document.getElementById("errormsg").innerHTML = "";
	                    }, 4000);
	                document.getElementById("errormsg").innerHTML=" Select Your Semester.";
				}
			}
		});

		$("#file").bind("change",function(){
			size=this.files[0].size;
			var path=$('#file').val();
			var i=path.lastIndexOf(".");
			if(i==-1){
				setTimeout(function () {
                        document.getElementById("errormessage").innerHTML = "";
                    }, 4000);
                document.getElementById("errormessage").innerHTML=" Extension is not found.Please upload it once again.";
                $("#file").val('');
			}
			else if(size>40010000){
				setTimeout(function () {
                        document.getElementById("errormessage").innerHTML = "";
                    }, 4000);
                document.getElementById("errormessage").innerHTML=" File size should not be more than 300kB";
                $("#file").val('');
			}
			else{
				var ext=path.substring(i+1).toLowerCase();
				if(!(ext=='jpg' || ext=='jpeg' || ext=='png')){
					setTimeout(function () {
                        document.getElementById("errormessage").innerHTML = "";
                    }, 4000);
                	document.getElementById("errormessage").innerHTML=" Only jpg/jpeg/png are allowed.";
                	$('#file').val('');
				}
				else{
					var formdata=new FormData();
					formdata.append('file',document.getElementById('file').files[0]);
					var xhr=new XMLHttpRequest();
					xhr.upload.addEventListener("progress",progressHandler,false);
					xhr.addEventListener("load",completeHandler,false);
					xhr.open('POST','uploadmarks.php',true);
					xhr.send(formdata);
				}
			}
		});


		function progressHandler(event){
			
		}
		function completeHandler(event){
			$("img").attr("src",event.target.responseText);
		}

		$('#print').click(function(){

		});

	</script>

	<script type="text/javascript">
		function closePrint () {
		  document.body.removeChild(this.__container__);
		}

		function setPrint () {
		  this.contentWindow.__container__ = this;
		  this.contentWindow.onbeforeunload = closePrint;
		  this.contentWindow.onafterprint = closePrint;
		  this.contentWindow.focus(); // Required for IE
		  this.contentWindow.print();
		}

		function printPage (sURL) {
		  var oHiddFrame = document.createElement("iframe");
		  oHiddFrame.onload = setPrint;
		  oHiddFrame.style.position = "fixed";
		  oHiddFrame.style.right = "0";
		  oHiddFrame.style.bottom = "0";
		  oHiddFrame.style.width = "0";
		  oHiddFrame.style.height = "0";
		  oHiddFrame.style.border = "0";
		  oHiddFrame.src = sURL;
		  document.body.appendChild(oHiddFrame);
		}
	</script>
</body>
</html>