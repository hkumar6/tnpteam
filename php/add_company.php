<?php
	include('sessions.php');
	include('db_connect.php');
	include('generatekey.php');
	
	$msg = '';
	if (isset($_POST['company']))
	{
		//check if the company exists in the db
		$exists = 0;
		//echo generateKey($_POST['company']);
		$sql = "select company_name from companies where company_key='". generateKey($_POST['company']) ."'";
		if ( $result = mysqli_query($conn, $sql) )
		{
			if ($row = mysqli_fetch_array ($result))
			{
				$msg = $row[0]." already exists in the DB.";
				$exists = 1;
			}
		}
		if ( !$exists )
		{
			$sql = "insert into companies(company_name, company_key) values ('". $_POST['company'] . "', '". generateKey($_POST['company']) ."')";
			if ( mysqli_query( $conn, $sql) )
			{
				$msg = "Company added successfully!";
			}
			else
			{
				$msg = "Some error occured. Please try again!";
			}
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
		<?php include('header.php'); ?>
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