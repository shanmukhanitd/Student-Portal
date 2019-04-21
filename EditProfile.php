<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
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
				font-size: 20px;
				padding: 5px 10px;
				outline: none;
				border: 2px solid lightblue;
				float: right;
			}

			#formDiv{
				text-align: left;
				margin-left: 10px;
			}

			#message{
				display: none;
				text-align: center;
			}

	</style>
</head>
<body>

	<div class="navbar">
      
        <a href="home.php">Home</a>
        <a href="student.php">Profile</a>
        <a href="request.php">Update Request</a>
        <a href="student_feedback.php">Feedback</a>
        <a href="about/Aboutus.php">About Us</a>
        <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>

    </div>

	<div id="box">

		<div id="part1">
		
			<h2>Following are the fields that you can Edit. Tick the fields that you want to edit and click on Continue Button</h2>

			<p class="item"><input type="checkbox">&emsp;Username</p>

			<p class="item"><input type="checkbox">&emsp;Password</p>

			<p class="item"><input type="checkbox">&emsp;Mobile Number</p>

			<p class="item"><input type="checkbox">&emsp;Residential Address</p>

			<p><button id="backButton" class="button">Back</button><button id="continueButton" class="button">Continue</button></p>

		</div>

		<div id="part2">
			
			<h2 id="formHeader">Fill the following Form and click Submit</h2>

			<div id="formDiv">

				<br>
				<div class="formItem"><p>Username<input type="text" name="username" class="inputBar" id="username"></p>
					<span id="userspan" style="color: #f90404;"></span></div>
				<div class="formItem">
					<p>Old Password<input type="password" name="oldpassword" class="inputBar" id="oldpassword"></p>
					<span id="oldspan" style="color: #f90404;"></span>
					<p>New Password<input type="password" name="password" class="inputBar" id="password" class="password"      onkeyup="funcpass()" onblur="funcpass1()"></p>
					<span class="password" id="passspan" style="color: #f90404;"></span>
					<p>Confirm Password<input type="password" name="password1" class="inputBar" id="password1" class="password1" onblur="funcconfirm()"></p>
					<span class="password1" id="confirmspan" style="color: #f90404;"></span>
				</div>

				<div class="formItem"><p>Mobile Number<input type="text" name="mobile" class="inputBar" id="mobile"></p>
					<span class="password1" id="mobilespan" style="color: #f90404;"></span></div>

				<div class="formItem"><p>Residential Address<input type="text" name="address" class="inputBar" id="address"></p></div>

				<h2 id="message">You have not selected any fields to Edit</h2>

			</div>

			<p><p><button id="backButton1" class="button">Back</button><button id="submitButton" class="button" name="submitstudent">Submit</button></p></p>

		</div>

	</div>

	<script type="text/javascript">
		
		$("#backButton").click(function(){
			window.location.replace("student.php");
		})

		$("#continueButton").click(function(){
			$("#part2").show();
			var flag=0;
			for(var i=0; i<4; i++){
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
		})

		$("#backButton1").click(function(){
			$("#part1").show();
			$("#part2").hide();
		})

		$("#submitButton").click(function(){
			var formdata={};
			if($("input[type=checkbox]")[0].checked==true){
				var user=$('#username').val();
				alert(user);
	            var patt1 = /[^A-Z0-9_@]/gi;
	            var result = user.match(patt1);
	            if(user.length<5)
	            {
	                document.getElementById("userspan").innerHTML="Username should contain atleast 5 characters";
	                document.getElementById('username').focus();
	                return;
	            }
	            else if(result!=null){
	                document.getElementById("userspan").innerHTML="**use only alphabets, digits, _, @ only";
	                document.getElementById('username').focus();
	                return;
	            }
	            else{
	                $.post('verify.php',{'user':user},function(data,status,xhr){
	                    if(data=="yes"){
	                        document.getElementById("userspan").innerHTML="Username already exist, please use another one";
	                        document.getElementById('username').focus();
	                        return;
	                    }
	                    else
	                        document.getElementById("userspan").innerHTML="";
	                });
	            }
	            formdata['username']=user;
			}

			if($("input[type=checkbox]")[1].checked==true){
				var oldpassword=$('#oldpassword').val();
				var password=$('#password').val();
				var password1=$('#password1').val();
				if(oldpassword==""){
					document.getElementById("oldspan").innerHTML="Password is Empty.";
	                document.getElementById('oldpassword').focus();
	                return;
				}
				if(password=="" || document.getElementById("passspan").innerHTML!=""){
	                document.getElementById('password').focus();
	                return;
				}
				if(password1=="" || document.getElementById("confirmspan").innerHTML!=""){
	                document.getElementById('password1').focus();
	                return;
				}
				$.post('updatestudentprofile.php',{'oldpassword':oldpassword},function(data,status,xhr){
					if(data=='false'){
						document.getElementById("oldspan").innerHTML="Password is incorrect";
		                document.getElementById('oldpassword').focus();
		                return;
					}
					else{
						document.getElementById("oldspan").innerHTML="";
					}
				});
				formdata['password']=password;
			}

			if($("input[type=checkbox]")[2].checked==true){
				var pat=/^[6-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	            var n=document.getElementById("mobile").value;
	            if(!pat.test(n)){
	                document.getElementById("mobilespan").innerHTML="Mobile number is in correct";
	                document.getElementById('mobile').focus();
	                return;
	            }
	            else{
	                document.getElementById("mobilespan").innerHTML="";
	            }
	            formdata['mobile']=n;
			}

			if ($("input[type=checkbox]")[3].checked==true) {
				var address = $("#address").val();
				if(address==""){
					document.getElementById('address').focus();
	                return;
				}
				formdata['address']=address;
			}

			formdata['updatedetails']='update';
			$.post('updatestudentprofile.php',formdata,function(data,status,xhr){
				if(data=="ok1"){
					alert("Updated Successfully!\nPlease Login again.");
					window.location.replace('student.php');
				}
				else if(data=="ok0"){
					alert("Updated Successfully!");
					window.location.replace('student.php');
				}
				else{
					alert(data);
				}
			})
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

        function checkAddress(){

			var address = $("#address").val();
			if(address != ''){
				$("#addressErrorMessage").hide();
			}else{
				$("#addressErrorMessage").html("This Field is Required");
				$("#addressErrorMessage").show();
				addressErrorMessage = true;
			}
		}

	</script>
</body>
</html>