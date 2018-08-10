<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 2 | Toni McIntire &amp; Yadira Stubbs</title>
    <link rel="stylesheet" href="./styles/styleshome.css">
</head>
<body>
<div class="wrapper">
<h1>Assignment 2 | Toni McIntire &amp; Yadira Stubbs</h1>
<h3>Students:</h3>

<?php

//ERROR MESSAGES
session_start();

if(isset($_SESSION['errormessage']) ){
    echo $_SESSION['errormessage'];
    unset($_SESSION['errormessage']);
}

if(isset($_SESSION['successmessage'])){
    echo $_SESSION['successmessage'];
    unset($_SESSION['successmessage']);
}
if(isset($_SESSION['firstNameChange']) ||
    isset($_SESSION['lastNameChange'])){
          echo $_SESSION['firstNameChange'];
          echo $_SESSION['lastNameChange'];
    }

echo "<a href= 'add-user-page.php'> Add a Student</a>";
//EXTERNAL FILE
require_once("dbinfo.php");

//INITIATE 
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//TEST TO SEE IF SUCCESSFUL
if( mysqli_connect_errno() != 0  ){
	die("<p>Your connection was NOT successful</p>");	
}
// else {
//     echo "<p>Yay! You are connected to the database!</p>";
// }

//CREATE A QUERY CALLING USERNAME AND PASSWORD
$query 	= "SELECT id, firstname, lastname FROM students;";

//SEND RESULTS TO THE DATABASE
$result = $mysqli->query( $query );

//Counting the rows
$numberRows = $result->num_rows;
echo "<p>Number of records: ".$numberRows."</p>";

//Table to display content here
echo "<table>";
//Fetching fields
$arrayOfFieldObjects = $result->fetch_fields();
echo "<tr>";
//loop through this array
foreach($arrayOfFieldObjects as $fieldObject){
	//the ->name property is the name of this field
	//use it as a table heading
	echo "<th>".ucwords($fieldObject->name)."</th>";
}
echo "</tr>";
//Fetching rows
while( $record = $result->fetch_row()  ){
	//loop through the $record array
    $i = 0;
    while($i < $numberRows){
        if($i % 2 == 0){
            echo '<tr class = "style1" >';
        }else{
            echo '<tr class = "style2" >';
        }
    }
    echo '<tr>';
    echo "<td>".$record[0]."</td>";
    echo "<td>".$record[1]."</td>";
    echo "<td>".$record[2]."</td>";
    echo '<td><a href="delete-user.php?id='.$record[0].'&firstname='.$record[1].'&lastname='.$record[2].'">Delete</a></td>';
    echo '<td><a href="update-user.php?id='.$record[0].'&firstname='.$record[1].'&lastname='.$record[2].'">Update</td>';
    echo '</tr>';
}
echo "</table>";

?>
</div>
</body>
</html>