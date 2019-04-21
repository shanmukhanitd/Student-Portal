<?php 
	include_once 'connect.php';
	if(isset($_POST['reject'])){
		$sql='SELECT * from student where status=2';
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo '<table class="title"><th>Rejected Student\'s List</th></table><table class="students"> <thead> <tr> <th>Name</th> <th>Roll No</th> <th>Email</th> <th>View</th></tr></thead>';
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<tbody> <tr><td>".$row['Name']."</td> <td>".$row['RollNo']."</td> <td>".$row['email']."</td> <td> <form action='accept_reject.php' method='POST'><input type='hidden' name='username' class='username' value=".$row['username']."> <input type='submit' name='reject' id='submit' value='View Details'> </form> </td> </tr> </tbody>" ;
				}
				echo "</table>";
		}
		else{
			echo "<div class='NoRequests'> <span style='opacity: 0.4; font-size: 7em;'> No Student's Profile is Rejected </span> </div>";
		}
	}

	else  if(isset($_POST['accept'])){
		$sql='SELECT * from student where status=1';
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo '<table class="title"><th>Accepted Student\'s List</th></table><table class="students"> <thead> <tr> <th>Name</th> <th>Roll No</th> <th>Email</th> <th>View</th></tr></thead>';
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<tbody> <tr><td>".$row['Name']."</td> <td>".$row['RollNo']."</td> <td>".$row['email']."</td> <td> <form action='accept_reject.php' method='POST'><input type='hidden' name='username' class='username' value=".$row['username']."> <input type='submit' name='accept' id='submit' value='View Details'> </form> </td> </tr> </tbody>" ;
				}
				echo "</table>";
		}
		else{
			echo "<div class='NoRequests'> <span style='opacity: 0.4; font-size: 7em;'> No Student's Profile is Accepted </span> </div>";
		}
	}

	else if(isset($_POST['pending'])){
		$sql='SELECT * from student where status=0';
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo '<table class="title"><th>NEW STUDENTS</th></table><table class="students"> <thead> <tr> <th>Name</th> <th>Roll No</th> <th>Email</th> <th>View</th></tr></thead>';
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<tbody> <tr><td>".$row['Name']."</td> <td>".$row['RollNo']."</td> <td>".$row['email']."</td> <td> <form action='accept_reject.php' method='POST'><input type='hidden' name='username' class='username' value=".$row['username']."> <input type='submit' name='pending' class='submit' value='View Details'> </form> </td> </tr> </tbody>" ;
				}
				echo "</table>";
		}
		else{
				//make a div showing no requests are pending in large font at the center.
				echo "<div class='NoRequests'> <span style='opacity: 0.4; font-size: 7em;'> No Requests are Pending </span> </div>";
			}
	}	

	else if(isset($_POST['request'])){
		$sql='SELECT * from updaterequest;';
		$result=$con->query($sql);
		if($result->num_rows>0){
			echo '<table class="title"><th>REQUESTS TO UPDATE</th></table><table class="students"> <thead> <tr> <th>Name</th> <th>Username</th>  <th>View</th></tr></thead>';
			while ($row=mysqli_fetch_assoc($result)) {
				$sql1='SELECT Name from student where username="'.$row['username'].'";';
				$result1=$con->query($sql1);
				$row1=mysqli_fetch_assoc($result1);
				echo "<tbody> <tr><td>".$row1['Name']."</td> <td>".$row['username']."</td> <td> <form action='accept_reject.php' method='POST'><input type='hidden' name='username' class='username' value=".$row['username']."> <input type='submit' name='request' class='submit' value='Show Request'> </form> </td> </tr> </tbody>" ;
			}
			echo "</table>";
		}
		else{
			echo "<div class='NoRequests'> <span style='opacity: 0.4; font-size: 7em;'> No Requests to Update. </span> </div>";
		}
	}
?>