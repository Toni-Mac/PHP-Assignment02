<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles1_update.css"/>
    <title>Update User</title>
</head>
<body>
<div class="wrapper">
<h1>Assignment 02 | Toni McIntire &amp; Yadira Stubbs</h1>
<h3>Update A Student</h3>

<fieldset>
<label for="Update student information"></label>
<form method="POST" action="update_user_processing.php">
<input type="hidden" name="target" value"studentnumber">
<input type="hidden" name="update" id="update">
<fieldset>
<legend>New Data</legend>
<input type="text" name="studentnumber" id="student" value="studentnumber">
<label for="studentnumber"> - Student Number</label>
<br>
<input type="text" name="firstname" id="student" value="firstname">
<label for="firstname"> - Firstname</label>
<br>
<input type="text" name="lastname" id="student" value="lastname">
<label for="lastname"> - Lastname</label>
<br>
</fieldset>
<input type="submit" value="Submit">
</form>
</fieldset>
</div>
    
</body>
</html>