<?php 

// Make sure the GET variables are set..if not bounce them off this page with errors back to the table page...
session_start();
if(!isset($_GET['id']) ||
   !isset($_GET['firstname']) ||
   !isset($_GET['lastname']) ){
    $_SESSION['errormessage'] = "<p>The Student information not set.</p>";
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


<form method="post" action="delete_user_processing.php">
<fieldset>
<legend>Are you sure you want to delete?</legend>
<?php echo "<label for='id'>".$_GET['id'] ." - ".$_GET['firstname']." ". $_GET['lastname']."</label>";?>
<br>
<input type="hidden" name="id" value= "<?php echo $_GET['id'] ?>">
<input type="radio" name="confirm" id="yes" value="yes">
<label for="yes">Yes</label>
<br>
<input type="radio" name="confirm" id="no" value="no">
<label for="no">No</label>
<br>
<input type="submit" value="Submit">
</fieldset>
</form>
<div class="cancel">
    <a href="home-page.php">Cancel the deletion and return to the home page.</a>
</div>  
</div>
    
</body>
</html>