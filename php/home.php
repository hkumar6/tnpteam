<?php
	include('sessions.php');
?>

<!doctype html>
<html>
	<head>
		<style type="text/css">
			*{
				font-family : "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			body{
				font-size: 14px;
				font-weight: bold;
			}
			#header, #option-list, #footer{
				width: 300px;
				margin: auto;
				text-align: center;
			}
			li{
				list-style: none;
				padding: 5px;
				border-style: dotted;
				border-width: 1px;
				margin: 5px;
			}
			ul{
				padding: 1px;
			}
			#footer a{
				padding: 5px;
			}
		</style>
	</head>
	
	<body>
		<div id="header">
			<h1>TNP Team Portal</h1>
			<hr />
		</div>
		<div id="option-list">
			<ul>
				<li><a href="add_company.php">Add a Company</a></li>
				<li><a href="add_contact.php">Add a Contact</a></li>
				<li><a href="add_log.php">Add a Log</a></li>
			</ul>
		</div>
		<div id="footer">
			<br style="clear: both;"></br>
			<hr />
			<a href="home.php">Home</a>
			<a href="logout.php">Logout</a>
		</div>
	</body>
</html>