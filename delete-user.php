<?php 


// if(!isset($_GET['studentnumber']) ||
//    !isset($_GET['firstname']) ||
//    !isset($_GET['lastname']) ){
//     $_SESSION['error'] = 
//     header('Location:home-page');
//     die();
//    }
// Make sure the GET variables are set..if not bounce them off this page with errors back to the table page...

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
<form method="POST" action="delete_user_processing.php">
<input type="hidden" name="studentnumber" value= "<?php echo $affected_rows?>"
<input type="hidden" name="firstname" value="<?php echo $affected_rows?>">
<input type="hidden" name="lastname" value="<?php echo $affected_rows?>">

<input type="radio" name="confirm" id="yes" value="yes">
<label for="yes">Yes</label>
<br>
<input type="radio" name="confirm" id="no" value="no">
<label for="no">No</label>
<br>
<input type="submit" value="Submit">
</form>
</fieldset>
</div>
    
</body>
</html>