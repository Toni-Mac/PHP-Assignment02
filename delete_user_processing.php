<?php

require_once("dbinfo.php");
session_start();

//VARIABLES
    $confirm                = "";
    $id                     = "";

//TEST TO SEE IF VALUES ARE SET
if(!isset( $_GET["confirm"]) ){
    $_SESSION['errormessage'] = "<p>The form is invalid. Please try again.</p>";
    header('Location:home-page.php');
    die();
    }

//NORMALIZE DATA
    $confirm = array($_GET["confirm"]);
        
//INITIATE 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//TEST TO SEE IF SUCCESSFUL
if( mysqli_connect_errno() != 0  ){
	die("<p>Your connection was NOT successful</p>");	
}

//CREATE A QUERY CALLING USERNAME AND PASSWORD
    $query 	= "DELETE FROM students WHERE id ='.$record[0].';";

//SEND RESULTS TO THE DATABASE
    $results = $mysqli->query( $query );

    if($results==true){
        $_SESSION['errormessage'] = "<p>The record has been deleted.</p>";
        // header('Location:home-page.php');
        die();
    }else {
        $_SESSION['errormessage'] = "<p>The record has NOT been deleted.</p>";
        // header('Location:home-page.php');
        die();
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
    $_SESSION['errormessage'] = "<p>Record deleted : " . $_GET["id"] . "</p>";
    die();
}

//DELETE USER SUCCESSFUL
    $isFormValid = false;
    echo $_SESSION['errormessage'] = "<p>Delete Record Aborted</p>";
    header('Location:home-page.php');
    die();



?>
