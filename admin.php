<?php session_start(); 
    if(!isset($_SESSION['adminusername'])){
        header("Location: adminLogin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="icon" type="image/ico" href="pics/logo.jpg" />
	<link rel="stylesheet" type="text/css" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <script type="text/javascript" src="jquery.min.js"></script>
	<style type="text/css">
		body{
			background-image: url('pics/admin.jpg');
		}
		#details{
			background-color: rgba(240,240,240,1);
			margin: 10%;
		}
		.students,.title {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		  text-align: center;
		}

		.students td, .students th,.title th {
		  border-bottom: 1px solid #ddd;
		  padding: 8px;
		}
		.title{
			background-color: rgb(173, 172, 179)
		}

		.students tr:nth-child(even){background-color: #f2f2f2;}

		.students tr:hover {background-color: #ddd;}

		.students th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  background-color: rgb(173, 172, 79);
		  color: white;
		}

		.submit{
		    background-color: rgb(217, 235, 226);
		    border: 1px solid rgb(235, 210, 210);
		    border-radius: 3px;
		    padding: 5px;
		}
		.NoRequests{
			width: 100%;
			height: 400px;
			text-align: center;
			border: 1px solid rgb(0, 158, 247);
		}
		input[type="submit"]:hover
		{
		    cursor: pointer;
		    background: #009DF7;
		}

		.adminButton{
			font-size: 18px; 
		    border: none;
		    outline: none;
		    color:  rgb(229, 208, 194);
		    padding: 14px 16px;
		    background-color: inherit;
		    font-family: inherit; /* Important for vertical align on mobile phones */
		    margin: 0;
		}

		.adminButton:hover{
			cursor: pointer;
			background-color: rgb(202, 96, 25);
		}
		
	</style>
</head>
<body>
	<!-- Here it contains HOME, Update, FEEDBACK, right-most will be (LOGOUT) -->

	<div class="navbar">
            <a href="home.php">Home</a>
            <div class="dropdown">
            	<button id="request" class="adminButton">Update Requests</button>
                <button id="pending" class="adminButton">Pending</button>
	            <button id="accept" class="adminButton">Accepted</button>
	            <button id="reject" class="adminButton">Rejected</button>
            </div> 
            <a href="admin_faq.php">Feedback</a>
            <a href="about/Aboutus.php">About Us</a>
            <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>
    </div>
	<div id="details">
		<?php
			include_once 'connect.php';
			$sql="SELECT Name, RollNo, email,username from student where status=0;";
			$result=$con->query($sql);
			if ($result->num_rows>0) {
				//You can use whichever is preferrable I am using tables
				echo '<table class="title"><th>NEW STUDENTS</th></table><table class="students"> <thead> <tr> <th>Name</th> <th>Roll No</th> <th>Email</th> <th>View</th></tr></thead>';
				while ($row=mysqli_fetch_assoc($result)) {
					echo '<tbody> <tr><td>'.$row['Name'].'</td> <td>'.$row['RollNo'].'</td> <td>'.$row['email'].'</td> <td> <form action="accept_reject.php" method="POST"><input type="hidden" name="username" class="username" value='.$row['username'].'> <input type="submit" name="submit" class="submit" value="View Details"> </form> </td> </tr> </tbody>' ;
				}
				echo '</table>';
			}
			else{
				//make a div showing no requests are pending in large font at the center.
				echo "<div class='NoRequests'> <span style='opacity: 0.4; font-size: 7em;'> No Requests are Pending </span> </div>";
			}
		?>
	</div>

	<script type="text/javascript">
		$('#pending').hide();
		$('#reject').click(function(){
			var formdata={};
			formdata['reject']='rejected';
			$.post('table.php',formdata,function(data,status,xhr){
				$('#pending').show();
				$('#accept').show();
				$('#reject').hide();
				$('#request').show();
				$('.title').remove();
				$('.students').remove();
				$('.NoRequests').remove();
				$('#details').append(data);
			});
		});

		$('#accept').click(function(){
			var formdata={};
			formdata['accept']='accepted';
			$.post('table.php',formdata,function(data,status,xhr){
				$('#pending').show();
				$('#accept').hide();
				$('#reject').show();
				$('#request').show();
				$('.title').remove();
				$('.students').remove();
				$('.NoRequests').remove();
				$('#details').append(data);
			});
		});

		$('#pending').click(function(){
			var formdata={};
			formdata['pending']='pending';
			$.post('table.php',formdata,function(data,status,xhr){
				$('#pending').hide();
				$('#accept').show();
				$('#reject').show();
				$('#request').show();
				$('.title').remove();
				$('.students').remove();
				$('.NoRequests').remove();
				$('#details').append(data);
			});
		});

		$('#request').click(function(){
			var formdata={};
			formdata['request']='request';
			$.post('table.php',formdata,function(data,status,xhr){
				$('#pending').show();
				$('#accept').show();
				$('#reject').show();
				$('#request').hide();
				$('.title').remove();
				$('.students').remove();
				$('.NoRequests').remove();
				$('#details').append(data);
			});
		})
	</script>
</body>
</html>