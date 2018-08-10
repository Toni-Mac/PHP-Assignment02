<?php
//FORM VALIDATION AND SQL PROCESSING NEW USERS
session_start();
//form validate



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
            $_SESSION['errormessage'] = "<p>You did not provide the name and/or student number Please try again...</p>";
            header("Location: add-user-page.php");
            die();
      }else{

            if ($studentnumber !== "/^a[0-9]{8}$/i"){
                $_SESSION['errormessage'] = "<p>You did not provide a valid student number. Please try again...</p>";
                header("Location: add-user-page.php");
                die();
            }else{
                //$_SESSION['errormessage'] = "<p>YAY</p>";

            
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

        if($numRowsFoundWhenSearched !== 0){
            $query 	= "UPDATE students SET firstname='$firstname' lastname= '$lastname' WHERE id= '$studentnumber';";    
        }else{
            $_SESSION['errormessage'] = "<p>Error: there are no records to match input. </p>";
            header('Location:home-page.php');
        die();
        }
    }
//end of the PREG MATCH STUFF
}
//end of if(not empty)    
}
//end of if(isset)
}    






?>