<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: loginpage.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	 <link rel="stylesheet" type="text/css" href="registrationStyles.css">   
     <link rel="stylesheet" type="text/css" href="tooltip.css">
     <link rel="stylesheet" type="text/css" href="home.css">
     <script type="text/javascript" src="jquery.min.js"></script>

	<style type="text/css">
		
		html{
			    margin: 0;
			    padding: 0;
			    background: url('pics/background.jpg') no-repeat center center fixed; 
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
				text-align: center;
				padding: 15px;
			}

			.button{
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

			.button:hover{
				cursor: pointer;
    			background: #009DF7;
			}

			.button2{
				border: none;
			    outline: none;
			    height: 40px;
			    width: 150px;
			    background: #ED1C24;
			    color: #fff;
			    font-size: 20px;
			    border-radius: 20px;
			    margin: 30px auto;
			}

			.button2:hover{
				cursor: pointer;
    			background: #009DF7;
			}

			p{
				font-size: 20px;
			}

			.item{
				text-align: left;
				margin-left: 190px;
			}

			#continueButton{
				position: relative;
				left: 15px;
			}

			#backButton{
				position: relative;
				right: 15px;
			}

			#submitButton{
				position: relative;
				left: 15px;
			}

			#backButton1{
				position: relative;
				right: 15px;
			}

			#part2{
				display: none;
			}

			.inputBar{
				width: 320px;
				height: 23px;
				font-size: 17px;
				padding: 5px 10px;
				outline: none;
				border: 2px solid lightblue;
				float: right;
				border-radius: 5px;
			}

			#formDiv{
				text-align: left;
				margin-left: 10px;
			}

			#message{
				display: none;
				text-align: center;
			}

			.error{
				margin-left: 206px;
				color: red;
				font-size: 17px;
			}

			#selectButton{
				border: none;
			    outline: none;
			    height: 28px;
			    width: 140px;
			    background: #ED1C24;
			    color: #fff;
			    font-size: 17px;
			    border-radius: 14px;
			    margin: 15px auto;
			}

			#selectButton:hover{
				cursor: pointer;
    			background: #009DF7;
			}

			#dateDiv{
					width: 320px;
				height: 23px;
				float: right;
				margin-right: 25px;
			}

			#dob{
				height: 100%;
				  width: 100%;
				  font-size: 15px;
				  text-transform: uppercase;
				  font-weight: bold;
				  outline: none;
				  border: 2px solid lightblue;
				  border-radius: 5px;
				  padding: 5px 10px;
			}

			#yearDiv{
				width: 320px;
				height: 23px;
				float: right;
				margin-right: 25px;
			}

			#year{
				height: 100%;
				  width: 100%;
				  font-size: 15px;
				  outline: none;
				  border: 2px solid lightblue;
				  border-radius: 5px;
				  padding: 5px 10px;
			}

			#genderDiv{
				width: 345px;
				height: 37px;
				float: right;
				margin-right: 25px;
				position: relative;
				top: -10px;
				left: 15px;
			}

			#gender{
				height: 100%;
				  width: 100%;
				  font-size: 15px;
				  outline: none;
				  border: 2px solid lightblue;
				  border-radius: 5px;
				  padding: 5px 10px;
			}

			#departmentDiv{
				width: 345px;
				height: 37px;
				float: right;
				margin-right: 25px;
				position: relative;
				top: -10px;
				left: 15px;
			}

			#department{
				height: 100%;
				  width: 100%;
				  font-size: 15px;
				  outline: none;
				  border: 2px solid lightblue;
				  border-radius: 5px;
				  padding: 5px 10px;
			}

	</style>
</head>
<body>

	<div class="navbar">
      
        <a href="home.php">Home</a>
        <a href="student.php">Profile</a>
        <a href="student_feedback.php">Feedback</a>
        <a href="about/Aboutus.php">About Us</a>
        <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>

    </div>

	<div id="box">

		<div id="part1">
		
			<h2>Select the fields that you want to edit and click on Continue</h2>

			<button id="selectButton">Select all</button>

			<p class="item"><input type="checkbox">&emsp;Name</p>

			<p class="item"><input type="checkbox">&emsp;Gender</p>

			<p class="item"><input type="checkbox">&emsp;Father's Name</p>

			<p class="item"><input type="checkbox">&emsp;Mother's Name</p>

			<p class="item"><input type="checkbox">&emsp;Email</p>

			<p class="item"><input type="checkbox">&emsp;Department & Roll Number</p>

			<p class="item"><input type="checkbox">&emsp;Registration Number</p>

			<p class="item"><input type="checkbox">&emsp;Date of Birth</p>

			<p class="item"><input type="checkbox">&emsp;Year of Passing</p>

			<p><button id="backButton" class="button">Back</button><button id="continueButton" class="button">Continue</button></p>

		</div>

		<div id="part2">
			
			<h2 id="formHeader">Fill the following Form and click Submit</h2>

			<div id="formDiv">

				<br>
				<div class="formItem"><p>Name<input type="text" name="name" class="inputBar" id="name"></p>
				<p class="error" id="nameErrorMessage"></p></div>

				<div class="formItem"><p>Gender<span id="genderDiv"><select name="gender" id="gender">
					<option value=""></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select></span></p><p class="error" id="genderErrorMessage"></p></div>

				<div class="formItem"><p>Father's Name<input type="text" name="fatherName" class="inputBar" id="fatherName"></p> <p class="error" id="fatherNameErrorMessage"></p></div>

				<div class="formItem"><p>Mother's Name<input type="text" name="motherName" class="inputBar" id="motherName"></p><p class="error" id="motherNameErrorMessage"></p></div>

				<div class="formItem"><p>Email<input type="text" name="email" class="inputBar" id="email"></p><p class="error" id="emailErrorMessage"></p></div>

				<div class="formItem"><p>Department<span id="departmentDiv">
					<select name="department" id="department">
					<option value=""></option>
	                <option value="Information Technology">IT</option>
	                <option value="Computer Science & Engineering">CS</option>
	                <option value="Electronics & Communication Engineering">EC</option>
	                <option value="Electrical Engineering">EE</option>
	                <option value="Civil Engineering">CE</option>
	                <option value="Mechanical Engineering">ME</option>
	                <option value="Bio Technology">BT</option>
	                <option value="Chemical Engineering">CH</option>
	                <option value="Metallurgical & Material Engineering">MM</option></select></span></p><p class="error" id="departmentErrorMessage"></p>

				<p>Roll Number<input type="text" name="rollNo" class="inputBar" id="rollNo"></p>
				<p class="error" id="rollNoErrorMessage"></p></div>

				<div class="formItem"><p>Registration Number<input type="text" name="regNo" class="inputBar" id="regNo"></p><p class="error" id="regNoErrorMessage"></p></div>

				<div class="formItem"><p>Date of Birth<span id="dateDiv"><input type="date" name="dob" id="dob"></span></p><p class="error" id="dobErrorMessage"></p></div>

				<div class="formItem"><p>Year of Passing<span id="yearDiv"><input type="number" name="year" min="2000" max="2030" id="year"></span></p><p class="error" id="yearErrorMessage"></p></div>

				<h2 id="message">You have not selected any fields to Edit</h2>

			</div>

			<p><button id="backButton1" class="button2">Back</button><button id="reset" class="button2">Reset</button><button id="submitButton" class="button2">Submit</button></p>

		</div>

	</div>

	<script type="text/javascript">

		$(function(){

			var formdata={};

			$("#backButton").click(function(){
				window.location.replace("student.php");
			});

			$("#continueButton").click(function(){
				$("#part2").show();
				var flag=0;
				for(var i=0; i<9; i++){
					if($("input[type=checkbox]")[i].checked == false){
						$(".formItem").eq(i).hide();
					}else{
						$(".formItem").eq(i).show();
						flag=1;
					}
				}
				if(flag==0){
					$("#message").show();
					$("#formHeader").hide();
				}else{
					$("#message").hide();
					$("#formHeader").show();
				}
				$("#part1").hide();
				scrollTop();
			});

			$("#selectButton").click(function(){
					if($("input[type=checkbox]").prop("checked") == false){
						$("input[type=checkbox]").prop("checked",true);
					}else{
						$("input[type=checkbox]").prop("checked",false);
					}
			});

			$("#reset").click(function(){
				$(".error").html("");
				$(".error").hide();
				$(".inputBar").val("");
				$("#gender").val("");
				$("#department").val("");
				$("#dob").val("");
				$("#year").val("");
				scrollTop();
			});

			$("#backButton1").click(function(){
				$("#part1").show();
				$("#part2").hide();
				scrollTop();
			});

			$("#submitButton").click(function(){
				var flag=0;
				for(var i=0; i<9; i++){
					if($("input[type=checkbox]")[i].checked == true){
						flag=1;
						break;
					}
				}
				if(flag==0)
					return;
				if(validation()){
					formdata['studentrequest']='request';
					$.post('updatestudentprofile.php',formdata,function(data,status,xhr){
						if(data=="ok"){
							alert("Request send Successfully!");
							window.location.replace('student.php');
						}
						else{
							alert("You were already requested to Update!");
						}
					})
				}
			});

			function validation(){
				formdata={};
				if($("input[type=checkbox]")[0].checked == true ){
					if(!checkName())
					{
						document.getElementById('name').focus();
						return false;
					}
					formdata['name']=document.getElementById('name').value.toUpperCase();
				}
				if($("input[type=checkbox]")[1].checked == true ){
					if(!checkGender()){
						document.getElementById('gender').focus();
						return false;
					}
					formdata['gender']=document.getElementById('gender').value;
				}
				if($("input[type=checkbox]")[2].checked == true ){
					if(!checkFatherName()){
						document.getElementById('fatherName').focus();
						return false;
					}
					formdata['fatherName']=document.getElementById('fatherName').value.toUpperCase();
				}
				if($("input[type=checkbox]")[3].checked == true ){
					if(!checkMotherName()){
						document.getElementById('motherName').focus();
						return false;
					}
					formdata['motherName']=document.getElementById('motherName').value.toUpperCase();
				}
				if($("input[type=checkbox]")[4].checked == true ){
					if(!checkEmail()){
						document.getElementById('email').focus();
						return false;
					}
					formdata['email']=document.getElementById('email').value;
				}
				if($("input[type=checkbox]")[5].checked == true ){
					if(!checkDepartment()){
						document.getElementById('department').focus();
						return false;
					}
					if(!checkRollNo()){
						document.getElementById('rollNo').focus();
						return false;
					}
					formdata['department']=document.getElementById('department').value;
					formdata['rollNo']=document.getElementById('rollNo').value;
				}
				if($("input[type=checkbox]")[6].checked == true ){
					if(!checkRegNo()){
						document.getElementById('regNo').focus();
						return false;
					}
					formdata['regNo']=document.getElementById('regNo').value;
				}
				if($("input[type=checkbox]")[7].checked == true ){
					if(!checkYear()){
						document.getElementById('dob').focus();
						return false;
					}
					formdata['dob']=document.getElementById('dob').value;
				}
				if($("input[type=checkbox]")[8].checked == true ){
					var year=document.getElementById('year').value;
					if(year=="" || year<2000 || year>2030){
						document.getElementById('year').focus();
						return false;
					}
					formdata['year']=year;
				}
				return true;
			}


			$("#name").focusout(function(){
				checkName();
			})

			$("#gender").focusout(function(){
				checkGender();
			})

			$("#fatherName").focusout(function(){
				checkFatherName();
			})

			$("#motherName").focusout(function(){
				checkMotherName();
			})

			$("#email").focusout(function(){
				checkEmail();
			})

			$("#department").focusout(function(){
				checkDepartment();
			})

			$("#rollNo").focusout(function(){
				checkRollNo();
			})

			$("#regNo").focusout(function(){
				checkRegNo();
			})

			$("#dob").focusout(function(){
				checkYear();
			})

			function scrollTop(){
				$("html, body").animate({ scrollTop: 0 }, "slow");
			}

			function checkGender(){
				var gender = $("#gender").val();
				if(gender != ''){
					$("#genderErrorMessage").hide();
					return true;
				}else{
					$("#genderErrorMessage").html("This Field is required");
					$("#genderErrorMessage").show();
					return false;
				}
			}

			function checkYear(){
				if(document.getElementById('dob').value==""){
					$("#dobErrorMessage").html("This Field is required");
					$("#dobErrorMessage").show();
					return false;
				}else{
					$("#dobErrorMessage").hide();
					return true;
				}
			}

			function checkDepartment(){
				var department = $("#department").val();
				if(department != ''){
					$("#departmentErrorMessage").hide();
					return true;
				}else{
					$("#departmentErrorMessage").html("This Field is required");
					$("#departmentErrorMessage").show();
					return false;
				}
			}

			$("#rollNo").focusin(function(){
					if($("#department").val() == ''){
						$("#rollNoErrorMessage").html("Fill the Department Field First");
						$("#rollNoErrorMessage").show();
					}
			})

			function checkRollNo(){
				var pat=/^[0-9][0-9](IT|CS|BT|EE|EC|CE|CH|ME|MM)80[0-9][0-9]$/;
				roll = $("#rollNo").val()
				department = $("#department option:selected").text();
				if(roll == ''){
					$("#rollNoErrorMessage").html("This field is required");
					$("#rollNoErrorMessage").show();
					return false;
				}else if(roll.length != 8 || !pat.test(roll)){
					$("#rollNoErrorMessage").html("This Roll Number is incorrect");
					$("#rollNoErrorMessage").show();
					return false;
				}else if(roll.substring(2,4) != department){
					$("#rollNoErrorMessage").html("This Roll Number does not belong to the selected department");
					$("#rollNoErrorMessage").show();
					return false;
				}else{
					$.post('verify.php',{'RollNo':roll},function(data,status,xhr){
						if(data=='yes'){
							$("#rollNoErrorMessage").html("This Roll Number already exists.");
							$("#rollNoErrorMessage").show();
							return false;
						}
						else{
							$("#rollNoErrorMessage").hide();
						}
					})
				}
				return true;
			}

			function checkRegNo(){
				var pat=/^[0-9][0-9](U10)[0-9][0-9][0-9]$/;
				regNo = $("#regNo").val();
				if(regNo == ''){
					$("#regNoErrorMessage").html("This field is required");
					$("#regNoErrorMessage").show();
					return false;
				}else if(regNo.length!=8 || !pat.test(regNo)){
					$("#regNoErrorMessage").html("This Registration Number is incorrect.");
					$("#regNoErrorMessage").show();
					return false;
				}else{
					$.post('verify.php',{'reg':regNo},function(data,status,xhr){
						if(data=='yes'){
							$("#regNoErrorMessage").html("This Reg Number already exists.");
							$("#regNoErrorMessage").show();
							return false;
						}
						else{
							$("#regNoErrorMessage").hide();
						}
					})
				}
				return true;
			}

			function checkName(){
				var pattern = /^[a-zA-Z\s]*$/;
				var name = $("#name").val();
				name=name.trim();
				if(pattern.test(name) && name!=''){
					$("#nameErrorMessage").hide();
					return true;
				}else{
					if(name == ''){
						$("#nameErrorMessage").html("This Field is Required");	
					}else{
						$("#nameErrorMessage").html("Name should contain only characters");
					}
					$("#nameErrorMessage").show();
					return false;
				}
			}

			function checkFatherName(){
				var pattern = /^[a-zA-Z\s]*$/;
				var name = $("#fatherName").val();
				name=name.trim();
				if(pattern.test(name) && name!=''){
					$("#fatherNameErrorMessage").hide();
					return true;
				}else{
					if(name == ''){
						$("#fatherNameErrorMessage").html("This Field is Required");	
					}else{
						$("#fatherNameErrorMessage").html("Name should contain only characters");
					}
					$("#fatherNameErrorMessage").show();
					return false;
				}
			}

			function checkMotherName(){

				var pattern = /^[a-zA-Z\s]*$/;
				var name = $("#motherName").val();
				name=name.trim();
				if(pattern.test(name) && name!=''){
					$("#motherNameErrorMessage").hide();
					return true;
				}else{
					if(name == ''){
						$("#motherNameErrorMessage").html("This Field is Required");	
					}else{
						$("#motherNameErrorMessage").html("Name should contain only characters");
					}
					$("#motherNameErrorMessage").show();
					return false;
				}
			}

			function checkEmail(){

				var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				var email = $("#email").val();
				if(pattern.test(email) && email!=''){
					$("#emailErrorMessage").hide();
					return true;
				}else{
					if(email == ''){
						$("#emailErrorMessage").html("This Field is Required");	
					}else{
						$("#emailErrorMessage").html("Invalid Email Address");
					} 
					$("#emailErrorMessage").show();
					return false;
				}
			}

			

		});

	</script>

</body>
</html>