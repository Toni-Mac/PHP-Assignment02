<?php

require_once("dbinfo.php");
session_start();

//VARIABLES
    $confirm                = "";
    $firstname              ="";
    $lastname               ="";
    $studentnumber          ="";

//TEST TO SEE IF VALUES ARE SET
if(!isset( $_POST["confirm"]) ){
    $_SESSION['error'] = "<p>The form is invalid. Please try again.</p>";
    header('Location:delete-user.php');
    die();
    }

//NORMALIZE DATA
    $confirm = array($_POST["confirm"]);
        
//INITIATE 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//TEST TO SEE IF SUCCESSFUL
if( mysqli_connect_errno() != 0  ){
	die("<p>Your connection was NOT successful</p>");	
}

//CREATE A QUERY CALLING USERNAME AND PASSWORD
    $query 	= "DELETE FROM students WHERE id = '$studentnumber' AND firstname = '$firstname' AND lastname = '$lastname';";

//SEND RESULTS TO THE DATABASE
    $results = $mysqli->query( $query );

    if($results==true){
        $_SESSION['error'] = "<p>The record has been deleted.</p>";
        header('Location:home-page.php');
        die();
    }else {
        $_SESSION['error'] = "<p>The record has NOT been deleted.</p>";
        header('Location:home-page.php');
    }
    
//DETERMINE NUMBER OF ROWS AFFECTED
$numRowsAffected = $mysqli->affected_rows;
echo "</p>Number of rows deleted: $numRowsAffected</p>";

//CLOSE SQL
    $mysqli->close();

//VARIABLES
$isFormValid = true;

//TEST TO SEE WHAT USER PICKS
if($confirm == "yes"){
    $isFormValid = true;
    echo $_SESSION['errormessage'] = "<p>You clicked yes</p>";

    die("<p>sorry</p>");
}

//DELETE USER SUCCESSFUL
    $isFormValid = false;
    echo $_SESSION['errormessage'] = "<p>You clicked no</p>";
    die();



?>
