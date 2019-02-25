<!DOCTYPE html>
<!--	Author: Michael Craven
		Date:	2/20/2019
		File:	job-titles2.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>

<?php

$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "test";

include('db-connect.php');


$connect=mysqli_connect($server, $user, $pw, $db);

if( !$connect) 
{
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$jobTitle = $_POST['jobTitle'];

$userQuery = " Select lastName, firstName From personnel where jobTitle = '$jobTitle'";  // ADD THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
  
	print("<h1>RESULTS</h1>");
	print("<table border = \"1\">");
	print("<tr><th>FIRST NAME</th><th>LAST NAME</th></tr>");
  while ($person = mysqli_fetch_assoc($result))
  {
  print("<tr><th>".$person['firstName']."</th><th>".$person['lastName']."</th></tr>");
	
	print ("</table>");
  }  
}


mysqli_close($connect);   // close the connection
 
?>
</body>
</html>
