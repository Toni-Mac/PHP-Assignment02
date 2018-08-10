<?php
session_start();

//TEST TO SEE IF VALUES ARE SET
if(!isset( $_POST["confirm"]) || !isset($_POST['id'])){
    $_SESSION['errormessage'] = "<p>The form is invalid. Please try again.</p>";
    header('Location: home-page.php');
    die();
}

//NORMALIZE DATA
$confirm = $_POST["confirm"];
$id = $_POST['id'];

if($confirm == 'no'){
    $_SESSION['errormessage'] = "<p>Student deletion was cancelled. Student NOT deleted.</p>";
    header('Location: home-page.php');
    die();
}

// Get DB Info
require_once("dbinfo.php");

// //INITIATE 
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//TEST TO SEE IF SUCCESSFUL
if( mysqli_connect_errno() != 0  ){
    $_SESSION['errormessage'] = "<p>Problem connecting to the database. Student NOT deleted. Please try again.</p>";
    header('Location: home-page.php');
    die();	
}

$id = $mysqli->real_escape_string($id);

//CREATE A QUERY CALLING ID
$query 	= "DELETE FROM students WHERE id ='$id';";
//SEND RESULTS TO THE DATABASE
$mysqli->query($query);

if($mysqli->affected_rows > 0){
    $mysqli->close();
    $_SESSION['successmessage'] = '<p>Student successfully deleted.</p>';
    header('Location: home-page.php');
}else{
    $mysqli->close();
    $_SESSION['errormessage'] = '<p>Oh oh...Problem deleting student. Student was NOT deleted. Please try again.</p>'; 
    header('Location: home-page.php');
}
 
?>
