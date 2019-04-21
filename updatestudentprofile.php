<?php  
	session_start();
	include_once 'connect.php';
	if(isset($_POST['oldpassword'])){
		$username=$_SESSION['username'];
		$sql='SELECT password from student where username="'.$username.'";';
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		if($row['password']==md5($_POST['oldpassword']))
			echo 'true';
		else
			echo 'false';
	}

	else if(isset($_POST['updatedetails'])){
		$username=$_SESSION['username'];
		$i=0;
		if(isset($_POST['address'])){
			$sql="UPDATE student set Address='".$_POST['address']."' where username='".$username."';";
			$con->query($sql);
		}
		if(isset($_POST['mobile'])){
			$sql="UPDATE student set Mobile=".$_POST['mobile']." where username='".$username."';";
			$con->query($sql);
		}
		if(isset($_POST['password'])){
			$password=md5($_POST['password']);
			$sql="UPDATE student set password='".$password."' where username='".$username."';";
			$con->query($sql);
			$i=1;
		}
		if(isset($_POST['username'])){
			$sql="UPDATE student set username='".$_POST['username']."' where username='".$username."';";
			$con->query($sql);
			$i=1;
		}
		echo 'ok'.$i;
		if($i==1){
			session_unset();
		}
	}
	else if(isset($_POST['studentrequest'])){
		$username=$_SESSION['username'];
		$name=0; $gender=0; $fatherName=0; $motherName=0; $email=0; $department=0; $rollNo=0; $regNo=0; $dob=0; $year=0;
		if(isset($_POST['name'])){
			$name=$_POST['name'];
		}
		if(isset($_POST['gender'])){
			$gender=$_POST['gender'];
		}
		if(isset($_POST['fatherName'])){
			$fatherName=$_POST['fatherName'];
		}
		if(isset($_POST['motherName'])){
			$motherName=$_POST['motherName'];
		}
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		}
		if(isset($_POST['department'])){
			$department=$_POST['department'];
		}
		if(isset($_POST['rollNo'])){
			$rollNo=$_POST['rollNo'];
		}
		if(isset($_POST['regNo'])){
			$regNo=$_POST['regNo'];
		}
		if(isset($_POST['dob'])){
			$dob=$_POST['dob'];
		}
		if(isset($_POST['year'])){
			$year=$_POST['year'];
		}
		$sql='INSERT into updaterequest values("'.$username.'","'.$name.'","'.$gender.'","'.$fatherName.'","'.$motherName.'","'.$email.'","'.$department.'","'.$rollNo.'","'.$regNo.'","'.$dob.'",'.$year.');';
		if($con->query($sql)){
			echo 'ok';
		}
		else{
			echo mysqli_error($con);
		}
	}

	else if(isset($_POST['accept'])){
		$username=$_POST['username'];
		$status=1;
		$sql="UPDATE student set status=".$status." where username='".$username."';";
		if($con->query($sql))
			echo "ok";
		else
			echo mysqli_error($con);
	}

	else if(isset($_POST['reject'])){
		$username=$_POST['username'];
		$status=2;
		$sql="UPDATE student set status=".$status." where username='".$username."';";
		if($con->query($sql))
			echo "ok";
		else
			echo mysqli_error($con);
	}

	else if(isset($_POST['reject1'])){
		$username=$_POST['username'];
		$sql="DELETE from updaterequest where username='".$username."';";
		if($con->query($sql))
			echo "ok";
		else
			echo mysqli_error($con);
	}

	else if(isset($_POST['update'])){
		$username=$_POST['username'];
		$sql="SELECT * from updaterequest where username='".$username."';";
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		if($row['Name']!='0'){
			$name=$row['Name'];
			$sql="UPDATE student set Name='".$name."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['gender']!='0'){
			$gender=$row['gender'];
			$sql="UPDATE student set gender='".$gender."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['FatherName']!='0'){
			$fatherName=$row['FatherName'];
			$sql="UPDATE student set FatherName='".$fatherName."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['MotherName']!='0'){
			$motherName=$row['MotherName'];
			$sql="UPDATE student set MotherName='".$name."' where username='".$motherName."';";
			$con->query($sql);
		}
		if($row['email']!='0'){
			$email=$row['email'];
			$sql="UPDATE student set email='".$email."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['department']!='0'){
			$department=$row['department'];
			$sql="UPDATE student set department='".$department."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['RollNo']!='0'){
			$rollNo=$row['RollNo'];
			$sql="UPDATE student set RollNo='".$rollNo."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['RegistrationNo']!='0'){
			$regNo=$row['RegistrationNo'];
			$sql="UPDATE student set RegistrationNo='".$regNo."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['dob']!='0'){
			$dob=$row['dob'];
			$sql="UPDATE student set dob='".$dob."' where username='".$username."';";
			$con->query($sql);
		}
		if($row['year']!=0){
			$year=$row['year'];
			$sql="UPDATE student set year='".$year."' where username='".$username."';";
			$con->query($sql);
		}
		$sql="DELETE from updaterequest where username='".$username."';";
		if($con->query($sql))
			echo "ok";
		else
			echo mysqli_error($con);
	}
?>