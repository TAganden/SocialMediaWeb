<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('../../mysqli_connect.php');
// If form submitted, insert values into the database.
if(isset($_POST['submit'])){
		$data_missing = array();
		if(empty($_POST['name'])){

        // Adds name to array
        $data_missing[] = 'Name';

    } else {

        // Trim white space from the name and store the name
        $name = $_POST['name'];

    }

    if(empty($_POST['uname'])){

        // Adds name to array
        $data_missing[] = 'User Name';

    } else {

        // Trim white space from the name and store the name
        $uname = trim($_POST['uname']);

    }
    if(empty($_POST['password'])){

        // Adds name to array
        $data_missing[] = 'Password';

    } else {

        // Trim white space from the name and store the name
        $pwd = MD5($_POST['password']);

    }
    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    }else {

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }
    $status=$_POST['status'];
	if(empty($data_missing)){
    $query = "INSERT INTO user VALUES (?,?,?,?,?,?)";

   $stmt = mysqli_prepare($dbc, $query);
   $dp=NULL;

   mysqli_stmt_bind_param($stmt, "ssssss", $uname, $name,$pwd,$status,$email,$dp);

   mysqli_stmt_execute($stmt);

   $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
mysqli_stmt_close($stmt);

          mysqli_close($dbc);
        }}}
    else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Name" required />
<input type="text" name="uname" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<p>Status
	<input type="radio" name="status" value="private" checked> Private
  <input type="radio" name="status" value="public"> Public
</p>
<input type="submit" name="submit" value="Register" />
<a href='login.php'>Login</a>
</form>
</div>
<?php  } ?>
</body>
</html>
