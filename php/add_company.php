<?php
	include('sessions.php');
	include('db_connect.php');
	
	$msg = '';
	if (isset($_POST['company']))
	{	
		//query
		$sql = "insert into companies(company_name) values ('". $_POST['company'] . "')";
		if ( mysqli_query( $conn, $sql) )
		{
			$msg = "Company added successfully!";
		}
		else
		{
			$msg = "Some error occured. Please try again!";
		}
	}
	mysqli_close($conn);
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
			#header, #add-company, #msg, #footer{
				width: 300px;
				margin: auto;
				text-align: center;
			}
			label{
				float: left;
			}
			input.text-input{
				float: right;
			}
			input.button{
				float: right;
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
			<h2>Add a new Company</h2>
			<hr />
		</div>
		<div id="add-company">
			<form method="post" action="add_company.php">
				<p>
					<label>Company</label>
					<input type="text" class="text-input" name="company"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<input class="button" type="submit" value="Add"></input>
				</p>
			</form>
		</div>
		<div id="msg">
			<br style="clear: both;"></br>
			<?php
				echo $msg;
			?>
		</div>
		<div id="footer">
			<br style="clear: both;"></br>
			<hr />
			<a href="home.php">Home</a>
			<a href="logout.php">Logout</a>
		</div>
	</body>
</html>