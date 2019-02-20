<?php

//Local Login

$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "test";

// Production login

//$server = "localhost";
//$user = "cravenmo_testdb";
//$pw = "Thisis4class";
//$db = "cravenmo_test";

$connect = mysqli_connect($server, $user, $pw, $db);

if( !$connect)
{
	die("ERROR: Cannot connect to database $db on server $server
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}
?>