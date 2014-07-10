<?php
	session_start();
	if ( ! isset($_SESSION['user']))
	{
		header( 'Location: ../index.php' );
	}
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
			#header{
				width: 300px;
				margin: auto;
				text-align: center;
			}
		</style>
	</head>
	
	<body>
		<div id="header">
			<h1>TNP Team Portal</h1>
			<hr />
		</div>
	</body>
</html>