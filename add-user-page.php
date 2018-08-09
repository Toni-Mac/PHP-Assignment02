
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css"/>
    <title>Add User</title>
</head>
<body>
<div class="wrapper">

<h1>Assignment 02 | Toni McIntire &amp; Yadira Stubbs</h1>
<?php
session_start();
if(isset($_SESSION['errormessage'])){
	//if there is an error message, display it
	echo $_SESSION['errormessage'];
	//clear the error message now that we've displayed them
    unset($_SESSION['errormessage']);
}

?>
<h3>Add A Student</h3>

<fieldset>
<label for="Add student information"></label>
<form method="post" action="add_user_processing.php">

<input type="hidden" name="add" value"add">
<input type="text" name="studentnumber" id="studentnumber">
<label for="studentnumber"> -  Student Number</label>
<br>
<input type="text" name="firstname" id="firstname">
<label for="firstname"> - Firstname</label>
<br>
<input type="text" name="lastname" id="lastname">
<label for="lastname"> - Lastname</label>
<br>

<input type="submit" value="Submit">
</form>
</fieldset>
</div>
<?php


?>
</body>
</html>