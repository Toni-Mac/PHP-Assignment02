<?php
//FORM VALIDATION AND SQL PROCESSING NEW USERS
session_start();
//form validate

//constants 
const MIN_LENGTH_OF_STUDENT_ID = 9;

//variables
$studentnumber = "";
$firstname   = "";
$lastname    = ""; 

if( isset($_POST['studentnumber'])  ||
    isset($_POST['firstname'])     ||
    isset($_POST['lastname'])){
      $studentnumber = trim($_POST['studentnumber']);
      $firstname   = ucfirst(strtolower(trim($_POST['firstname'])));
      $lastname    = ucfirst(strtolower(trim($_POST['lastname']))); 
      if(empty($_POST['studentnumber'] ) || 
         empty($_POST['firstname']) ||
         empty($_POST['lastname'])){
            $_SESSION['errormessage'] = "<p>You did not provide the username and/or password. Please try again...</p>";
            header("Location: add-user-page.php");
            die();
      }else{
            //PRE-MATCH HERE
            // $isValid = "";
            // $error = "";

            if ($studentnumber !== "/^a[0-9]{8}$/i"){
                $_SESSION['errormessage'] = "<p>You did not provide a valid student number. Please try again...</p>";
                header("Location: add-user-page.php");
                die();
            }else{
                $_SESSION['errormessage'] = "<p>YAY</p>";

            
            //DATABASE STUFF HERE
            //GRAB 
            require_once("./dbinfo.php");
            //initiate
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            //check if connection was successful
            if( mysqli_connect_errno() != 0  ){
                die("<p>Your connection was NOT successful</p>");	
            }   
    

        //CREATE A QUERY CALLING USERNAME AND PASSWORD
        //IF SELECT VAR ARE NOT FOUND IN SYSTEM THEN INSERT .
        $searchQuery = "SELECT * FROM students WHERE id='$studentnumber';";

        //run the query
        $result = $mysqli->query($searchQuery);
        //count rows affected
        $numRowsFoundWhenSearched = $result->num_rows;

        if($numRowsFoundWhenSearched == 0){
            $query 	= "INSERT INTO students (firstname, lastname, id) VALUES ('$firstname','$lastname','$studentnumber');";

            //SEND RESULTS TO THE DATABASE
            $results = $mysqli->query( $query );

            //count rows
            $numRowsAffectedWhenSearched = $results->affected_rows;

            if($numRowsAffectedWhenSearched == 0 ){
                $_SESSION['errormessage'] = "<p>Record
                Added: $studentnumber $firstname $lastname </p>";

                //CLOSE SQL
                $mysqli->close();
                header('Location:home-page.php');
                die();
            }else{
                $_SESSION['errormessage'] = "<p>NOT DELETED</p>";
                header('Location:home-page.php');
                die();
            }
    }else {
        $_SESSION['errormessage'] = "<p>Error: the record is already in the database. </p>";
        header('Location:home-page.php');
        die();
    }
//end of the PREG MATCH STUFF
}
//end of if(not empty)    
}
//end of if(isset)
}    






?>