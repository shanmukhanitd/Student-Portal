<?php
include_once 'connect.php';
	if(isset($_POST['submit'])){
		 $name=mysqli_real_escape_string($con,$_POST['name']);
		 $username=mysqli_real_escape_string($con,$_POST['username']);
		 $password=md5($_POST['password']);
		 $gender=mysqli_real_escape_string($con,$_POST['gender']);
		 $father=mysqli_real_escape_string($con,$_POST['fatherName']);
		 $mother=mysqli_real_escape_string($con,$_POST['motherName']);
		 $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
		 $email=mysqli_real_escape_string($con,$_POST['email']);
		 $address=mysqli_real_escape_string($con,$_POST['address1'].', '.$_POST['address2'].', '.$_POST['address3'].', '.$_POST['address4']);
		 $department=mysqli_real_escape_string($con,$_POST['department']);
		 $rollNo=mysqli_real_escape_string($con,$_POST['roll']);
		 $registrationNo=mysqli_real_escape_string($con,$_POST['registration']);
		 $dob=mysqli_real_escape_string($con,$_POST['dob']);
		 $age=mysqli_real_escape_string($con,$_POST['age']);
		 $year=mysqli_real_escape_string($con,$_POST['year']);
		 $status=0;
		 $profile='profile/avatar.png';

		 $sql="insert into student values ('$name','$username','$password','$gender','$father','$mother','$mobile','$email','$address','$department','$rollNo','$registrationNo','$dob','$age','$year','$status','$profile');";

		 if(mysqli_query($con,$sql)){

		 	echo "yes";
		 }
		 else{
		 	echo "No";
		 }
	}

	else if(isset($_POST['user'])){
		$username=mysqli_real_escape_string($con,$_POST['user']);
		$sql="SELECT username from student where username='".$username."';";
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo "yes";
		}
		else{
			echo "no";
		}
	}

	else if(isset($_POST['RollNo'])){
		$rollNo=mysqli_real_escape_string($con,$_POST['RollNo']);
		$sql="SELECT RollNo from student where RollNo='".$rollNo."';";
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo "yes";
		}
		else{
			echo "no";
		}
	}

	else if(isset($_POST['reg'])){
		$registrationNo=mysqli_real_escape_string($con,$_POST['reg']);
		$sql="SELECT RegistrationNo from student where RegistrationNo='".$registrationNo."';";
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo "yes";
		}
		else{
			echo "no";
		}
	}

?>