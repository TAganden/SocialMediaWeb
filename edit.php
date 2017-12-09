<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];
  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/pic.css" />
<link rel="stylesheet" href="css/feed.css" />
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
  background: #F1F3FA;
  min-height: 3000px;
  padding-top: 10px;
  font-family: 'Open Sans', sans-serif;
}

/* Profile container */


.con{
    position: relative;
    width: 100%;
}



.mid {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.con:hover .image {
  opacity: 0.3;
}

.con:hover .mid {
  opacity: 1;
}

.change {
  background-color: #999;
  color: white;
  font-size: 16px;
  padding: 5px 5px;
}



</style>

</head>
<body>
  <div class="container">
    <?php include_once("top_template.php"); ?>
  <div class="col-md-2"></div>
  		<div class="col-md-8">
              <div class="profile-content">

<?php

//If form submitted, insert values into the database.

    $query = "SELECT * FROM user where uid='$id' ";
    $result = @mysqli_query($dbc, $query);

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($result)){
      $name=$row['uname'];
      $status=$row['status'];
      $email=$row['email'];
      $password=$row['pwd'];
    }




          mysqli_close($dbc);


?>
<div class="form">
  <center>
<h3>Edit Details</h3>
<br>

<form name="registration" action="edit_process.php" method="post">
  <div class="form-group">
  <label for="exampleInputEmail1">Name</label><br>
<input type="text" name="name" value=<?php echo $name; ?> required />
  </div>
  <div class="form-group">
<label for="exampleInputEmail1">Email address</label><br>
<input type="email" name="email"  value=<?php echo $email; ?> required />
  </div>

<div class="form-group">
<label for="exampleInputEmail1">Password</label><br>
<input type="password" name="password" value=<?php echo MD5($password);  ?> required />
  </div>
  <div class="form-group">
<p>Status
	<input type="radio" name="status" value="private" checked> Private
  <input type="radio" name="status" value="public"> Public
</p>
</div>
<input type="submit" name="submit" value="Change" />

</form>
</center>
</div>
</div>
</div>
</div>


</body>
</html>
