<?php
	$xml = simplexml_load_file("../xml/db.xml");
	$dbhost = $xml->dbhost;
	$dbuser = $xml->dbuser;
	$dbpass = $xml->dbpass;
	$db = $xml->dbname;
	
	// connect to mysql
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if( ! $conn )
	{
		die('Could not connect: ' . mysql_error() );
	}

	//check connection
	if (mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error);
		exit();
	}
?>