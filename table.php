<!DOCTYPE html>
<html>
<head>
	<title>Assignment 02</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
</head>
<body>
<div class="wrapper">
<h2>Assignment 02</h2>
<?php

//EXTERNAL FILE
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//TEST TO SEE IF SUCCESSFUL
if( mysqli_connect_errno() != 0  ){
	die("<p>Your connection was NOT successful</p>");	
}
//CREATE A QUERY CALLING USERNAME AND PASSWORD
$query 	= "SELECT username, password FROM users;";

//SEND RESULTS TO THE DATABASE
$result = $mysqli->query( $query );

$numberRows = $result->num_rows;
echo "<p>Number of records: ".$numberRows."</p>";
/*
	$result is an Object
	$result->fetch_assoc()
	returns an associative array of record data
	each field name assigned as an index
*/
echo "<table>";
while( $record = $result->fetch_assoc()  ){
	//loop through the $record array
	echo "<tr>";
	echo "<td>" . $record['username'] . "</td>";
	echo "<td>" . $record['password'] . "</td>";
	echo "</tr>";	
}
echo "</table>";

?>
</div>
</body>
<html>