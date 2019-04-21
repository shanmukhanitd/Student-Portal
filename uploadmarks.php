<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: home.php");
	}
	include_once 'connect.php';
	$username=$_SESSION['username'];
	if(isset($_FILES['file'])){
		$path=$_FILES['file']['tmp_name'];
		$type=$_FILES['file']['type'];
		$name=$_FILES['file']['name'];
		$sql="SELECT RollNo from student where username='".$username."';";
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		$RollNo=$row['RollNo'];
		$i= strrpos($name, ".");
		$ext=substr($name,$i);
		if(move_uploaded_file($path, "profile/$RollNo$ext")){
			$path= "profile/$RollNo$ext";
			echo $path;
			$sql1="UPDATE student set profile='".$path."' where username='".$username."';";
			$con->query($sql1);
		}
		else{
			echo "No";
		}
	}
	if(isset($_POST['semester']) && $_POST['semester']<9){

		$semester=$_POST['semester'];
		$sem=array(0,0,0,0,0,0,0,0);
		for ($i=1; $i<8 ;$i++ ) { 
			$j='sem'.$i;
			if(isset($_POST[$j])){
				$sem[$i-1]=$_POST[$j];
			}
		}
		$sql="INSERT into marks values('".$username."',".$semester.",".$sem[0].",".$sem[1].",".$sem[2].",".$sem[3].",".$sem[4].",".$sem[5].",".$sem[6].",".$sem[7].");";
		if($con->query($sql)){
			echo "Thank You";
		}
		else{
			echo "not uploaded";
		}
	}
?>