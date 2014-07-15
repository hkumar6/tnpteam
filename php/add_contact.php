<?php
	include('sessions.php');
	include('db_connect.php');
	
	$msg = '';
	if (isset($_POST['name']) && isset($_POST['company']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['info']) &&
		!empty($_POST['name']) )
	{
		$sql = "insert into contacts(contact_name,company_id,contact_email,contact_number,contact_info) values
				('".$_POST['name']."', '".$_POST['company']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['info']."')";
		if ( mysqli_query($conn, $sql) )
		{
			$msg = "Contact added successfully.";
		}
		else
		{
			$msg = "Some error occured. Please try again!";
		}
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
			#header, #add-contact, #msg, #footer{
				width: 300px;
				margin: auto;
				text-align: center;
			}
			label{
				float: left;
			}
			input.text-input, select{
				float: right;
				width: 125px;
			}
			input.button{
				float: right;
			}
			#msg{
				color: red;
			}
			#footer a{
				padding: 5px;
			}
		</style>
	</head>
	
	<body>
		<?php include('header.php'); ?>
		<div id="add-contact">
			<form method="post" action="add_contact.php">
				<p>
					<label>Name</label>
					<input type="text" class="text-input" name="name"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<label>Company</label>
					<!--<input type="text" class="text-input" name="company"></input>-->
					<select name="company">
						<?php
							$sql = "select company_id, company_name from companies";
							if ( $result = mysqli_query($conn, $sql) )
							{
								while ( $row = mysqli_fetch_row($result) )
								{
						?>
						<option value=" <?php echo $row[0]; ?> "> <?php echo $row[1]; ?> </option>
						<?php
								}
							}
						?>
					</select>
				</p>
				<br style="clear: both;"></br>
				<p>
					<label>E-mail</label>
					<input type="text" class="text-input" name="email"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<label>Phone</label>
					<input type="text" class="text-input" name="phone"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<label>Extra Info</label>
					<input type="text" class="text-input" name="info"></input>
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


<?php
	mysqli_close($conn);
?>