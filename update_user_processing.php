<?php

require_once("dbinfo.php");
session_start();

//VARIABLES
    //$confirm                = "";
    $firstname              ="";
    $lastname               ="";
    $studentnumber          ="";

//TEST TO SEE IF VALUES ARE SET
if(!isset( $_POST["studentnumber"]) || 
           $_POST["firstname"]      ||
           $_POST["lastname"]){
    $_SESSION['error'] = "<p>The form is invalid. Please try again.</p>";
    header('Location:update-user.php');
    die();
    }

        
//INITIATE 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//TEST TO SEE IF SUCCESSFUL
if( mysqli_connect_errno() != 0  ){
	die("<p>Your connection was NOT successful</p>");	
}

//CREATE A QUERY CALLING USERNAME AND PASSWORD

    $query 	= "UPDATE students SET firstname='$firstname', lastname='$lastname' WHERE id='$studentnumber';
    ;";

//SEND RESULTS TO THE DATABASE
    $results = $mysqli->query( $query );

    if($results == true){
        $_SESSION['error'] = "<p>The record has been updated</p>";
        header('Location:home-page.php');
        die();
    }else {
        $_SESSION['error'] = "<p>The record has NOT been updated.</p>";
        header('Location:home-page.php');
    } 

//DO WE NEED THIS ?? BELOW    
//DETERMINE NUMBER OF ROWS AFFECTED
//$numRowsAffected = $mysqli->affected_rows;
//echo "</p>Number of rows updated: $numRowsAffected</p>";


//CLOSE SQL
    $mysqli->close();


?>
