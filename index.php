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
			div{
				width: 300px;
				margin: auto;
			}
			#footer{
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
		</style>
	</head>
	
	<body>
		<div><h1>TNP Team Portal</h1></div>
		
		<div id="login">
			<form method="post" action="php/auth.php">
				<p>
					<label>Username</label>
					<input class="text-input" type="text" name="username"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<label>Password</label>
					<input class="text-input" type="password" name="passwd"></input>
				</p>
				<br style="clear: both;"></br>
				<p>
					<input class="button" type="submit" value="Sign In"></input>
				</p>
			</form>
		</div>
		<div id="footer">
			<br style="clear: both;"></br>
			<hr />
			<a href="php/home.php">Home</a>
		</div>
	</body>

</html>