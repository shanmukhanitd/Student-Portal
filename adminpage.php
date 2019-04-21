<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="icon" type="image/ico" href="pics/logo.jpg" />
	<style type="text/css">
		thead {color:green;}
		tbody {color:blue;}
		tfoot {color:red;}

		table, th,td {
		  border: 1px solid black;
		  padding: 5px;
		}
	</style>
</head>
<body>
	<!-- Here it contains HOME, Update, FEEDBACK, right-most will be (LOGOUT) -->
	<a href="logout.php">Logout</a>


	<div>
		<?php
			include_once 'connect.php';
			$sql="select Name, RollNo, email from student where status=0;";
			$result=$con->query($sql);
			if ($result->num_rows>0) {
				//You can use whichever is preferrable I am using tables
				echo "<table> <thead> <tr> <th>Name</th> <th>Roll No</th> <th>email</th> <th>View</th></tr></thead>";
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<tbody> <tr><td>".$row['Name']."</td> <td>".$row['RollNo']."</td> <td>".$row['email']."</td> <td> <form action='accept_reject.php' method='POST'> <input type='submit' name='submit' id='submit' value='View Details'> </form> </td> </tr> </tbody>" ;
				}
				echo "</table>";
			}
			else{
				//make a div showing no requests are pending in large font at the center.
				echo "<div id='NoRequests'> No Requests are Pending </div>";
			}
		?>
	</div>
</body>
</html>