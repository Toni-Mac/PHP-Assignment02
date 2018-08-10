<?php
//FORM VALIDATION AND SQL PROCESSING NEW USERS
session_start();
//form validate

//variables
$studentnumber = $_POST['studentnumber'];
$firstname   = $_POST['firstnamechange'];
$lastname    = $_POST['lastnamechange']; 

//GRAB 
require_once("./dbinfo.php");
//initiate
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//check if connection was successful
if( mysqli_connect_errno() != 0  ){
    die("<p>Your connection was NOT successful</p>");	
}   

$studentnumber = $mysqli->real_escape_string($studentnumber);
$firstname = $mysqli->real_escape_string($firstname);
$lastname = $mysqli->real_escape_string($lastname);

$query 	= "UPDATE students SET firstname='$firstname', lastname= '$lastname' WHERE id= '$studentnumber';"; 
$results = $mysqli->query($query);


if($results == true){
    $mysqli->close();
    $_SESSION['successmessage'] = '<p>Student successfully fkjdkfjekfjke updated.</p>';
    //$_SESSION['firstNameChange'];
    //$_SESSION['lastNameChange'];
    header('Location: home-page.php');
}else{
    $mysqli->close();
    $_SESSION['errormessage'] = '<p>Oh oh...Problem updating the student. Please try again.</p>'; 
    header('Location: home-page.php');
    die();
}







?>