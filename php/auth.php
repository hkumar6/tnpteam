<?php

  //start session
  session_start();

  //mysql credentials
  $dbhost = 'localhost:3306';
  $dbuser = 'tnpteam';
  $dbpass = 'tnpteam2014';
  $db = 'placements';

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
  
  // form and execute query
  $sql = "select count(*) from team_members where member_id='" . $_POST['username']. "' and member_password=SHA1('" . $_POST['passwd']. "')";
  if ($result = mysqli_query( $conn, $sql ))
  {
    $row = mysqli_fetch_row($result);
  }
  
  mysqli_close($conn);

?>