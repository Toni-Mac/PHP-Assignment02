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
    header('Location: home-page.php');
    $_SESSION['errormessage'] = "<p>Adding to the system.</p>";
    die();
} 
      header("location: add-user-page.php");
      die();

}else {
    echo "<p>Not set or trimmed</p>";
    $_SESSION['errormessage'] ="<p>DISPLAY FKDJKFKD</p>";
    header("location: add-user-page.php");
    die();
}





?>