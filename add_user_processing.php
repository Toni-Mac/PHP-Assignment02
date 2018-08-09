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
      $_SESSION['errormessage'] ="<p>DISPLAY FKDJKFKD</p>";
      header("location: add-user-page.php");
      die();

}else {
    echo "<p>KFJKFDKFJKSD</p>";
}

// if(empty($_POST['studentnumber'] ) || 
//    empty($_POST['firstname']) ||
//    empty($_POST['lastname'])){
//     $_SESSION['errormessage'] = "<p>You did not provide the username and/or password. Please try again...</p>";
//     header("Location: add-user-page.php");
//     die();
// }

//Errors and Validation

//come back
// if ($studentnumber == "/^a0[0-9]{7}$/i"){
//     $_SESSION['errormessage'] = "<p>Please put in a valid student number</p>";
//     header('location:add-user-page.php');
//     die();
// }else {
//     $_SESSION['errormessage'] = "<p>BOO</p>";
// }
// $isFormValid = true;
// $error= "";

// //Function to test the data entered to see if matches
// //output variety of messages
// function testInput($pattern, $teststrn, $typeOfInput){
//    //global $isFormValid;
//    //global $error;
   
//    //preg_match to perform a reg expression match
//    $result = preg_match($pattern, $teststrn);
//    if( $result == 0){
//        $isFormValid= false;

//        if($typeOfInput == "studentnumber"){
//            $error= "<p>Invalid Student Number Format</p>";
//        }
//    }   
// }
// //test inputs ** note to self red letters represent format
// testInput("/^a0[0-9]{7}$/i", $studentnumber, 'studentnumber');





?>