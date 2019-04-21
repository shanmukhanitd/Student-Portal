<?php
	session_start();
	if(isset($_SESSION['username']) || isset($_SESSION['adminusername'])){
		header("Location:home.php");
	}
	include_once 'connect.php';
	if(isset($_POST['studentlogin'])){
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=md5($_POST['password']);
		$sql='SELECT status from student where username="'.$username.'" and password="'.$password.'";';
                $result=$con->query($sql);
                if($result->num_rows==1){
                	$row=mysqli_fetch_assoc($result);
                	echo $row['status'];
                	if($row['status']==1){
                		$_SESSION['username']=$username;
                	}
                }
                else{
                	echo "no";
                }
	}



	if(isset($_POST['adminlogin'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql='SELECT username from admin where username="'.$username.'" and password="'.$password.'";';
        $result=$con->query($sql);
        if($result->num_rows==1){
        	echo "ok";
        	$_SESSION['adminusername']=$username;
        }
        else{
        	echo "no";
        }
	}

?>