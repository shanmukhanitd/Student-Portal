<?php 
	session_start();
	session_unset();
	header("Location: home.php?logout=success");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity= "sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>
</head>
<body>
</body>
</html>