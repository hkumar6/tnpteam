<?php
	include('sessions.php');
	include('db_connect.php');
	
	$msg = '';
	
	if ( isset($_POST['cid']) && isset($_POST['log']) && !empty($_POST['log']) )
	{
		$sql = "insert into contact_log(log_time,contact_id,log_remark) values (now(),'".$_POST['cid']."','".$_POST['log']."')";
		if ( mysqli_query($conn, $sql) )
		{
			$msg = "Logged successfully!";
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
			#header, #company, #msg, #footer, #add-log{
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
		<div id="header">
			<h1>TNP Team Portal</h1>
			<hr />
			<h2>Add a Conversation log</h2>
			<hr />
		</div>
		<div id="company">
			<form method="get" action="add_log.php">
				<p>
					<label>Company</label>
					<!--<input type="text" class="text-input" name="company"></input>-->
					<select name="c">
						<?php
							$sql = "select company_id, company_name from companies";
							if ( $result = mysqli_query($conn, $sql) )
							{
								while ( $row = mysqli_fetch_row($result) )
								{
						?>
						<option value="<?php echo $row[0]; ?>"
							<?php if ( isset($_GET['c']) )
									{
										if ( strcmp($_GET['c'], $row[0]) == 0 )
											echo 'selected';
									} ?> >
							<?php echo $row[1]; ?> 
						</option>
						<?php
								}
								mysqli_free_result($result);
							}
						?>
					</select>
				</p>
				<br style="clear: both;"></br>
				<p>
					<input class="button" type="submit" value="Fetch"></input>
				</p>
			</form>
		</div>
		<?php
		if ( isset($_GET['c']) )
		{ ?>
		<div id="add-log">
			<br style="clear: both;"></br>
			<form method="post" action="add_log.php">
				<p>
					<label>Contact person</label>
					<select name="cid">
						<?php
							$sql = "select contact_id, contact_name from contacts where company_id=".$_GET['c'];
							if ( $result = mysqli_query($conn, $sql) )
							{
								while ( $row = mysqli_fetch_row($result) )
								{
						?>
						<option value=" <?php echo $row[0]; ?> "> <?php echo $row[1]; ?> </option>
						<?php
								}
								mysqli_free_result($result);
							}
						?>
					</select>
				</p>
				<br style="clear: both;"></br>
				<p>
					<label>Conversation log</label>
					<input type="text" class="text-input" name="log" style="height: 50px;"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<input class="button" type="submit" value="Log"></input>
				</p>
			</form>
		</div>
		<?php
		} ?>
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