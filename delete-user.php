<?php 

// Make sure the GET variables are set..if not bounce them off this page with errors back to the table page...
session_start();
if(!isset($_GET['id']) ||
   !isset($_GET['firstname']) ||
   !isset($_GET['lastname']) ){
    $_SESSION['errormessage'] = "<p>The form is invalid.</p>";
    header('Location:home-page.php');
    die();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css"/>
    <title>Delete User</title>
</head>
<body>
<div class="wrapper">
<h1>Assignment 02 | Toni McIntire &amp; Yadira Stubbs</h1>
<h3>Delete A Student</h3>

<fieldset>
<legend>Are you sure you want to delete?</legend>
<?php echo "<label for='id'>".$_GET['id'] ." &nbsp ".$_GET['firstname'], $_GET['lastname']."</label>";?>
<form method="GET" action="delete_user_processing.php">
<input type="hidden" name="id" value= "id">
<input type="radio" name="confirm" id="yes" value="yes">
<label for="yes">Yes</label>
<br>
<input type="radio" name="confirm" id="no" value="no">
<label for="no">No</label>
<br>
<input type="submit" value="Submit">
<input type="button" value="">
</form>
</fieldset>
</div>
    
</body>
</html>