<?php

  //start session
  session_start();

  include('db_connect.php');
  
  // form and execute query
  $sql = "select count(*) from team_members where member_id='" . $_POST['username']. "' and member_password=SHA1('" . $_POST['passwd']. "')";
  if ($result = mysqli_query( $conn, $sql ))
  {
    $row = mysqli_fetch_row($result);
	if ($row[0] == 1)
	{
		$_SESSION['user'] = $_POST['username'];
		header( 'Location: home.php' );
	}
	else
		header( 'Location: ../index.php' );
  }
  else
  {
	printf("sql error\nplease go back and try again");
  }
  
  mysqli_close($conn);

?>