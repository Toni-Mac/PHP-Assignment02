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
<input type="hidden" name="delete" value="delete">
<input type="hidden" name="studentnumber" value="studentnumber">
<input type="hidden" name="firstname" value="firstname">
<input type="hidden" name="lastname" value="lastname">
<input type="radio" name="confirm" id="yes" value="yes" checked="checked">
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