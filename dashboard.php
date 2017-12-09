<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];
// Create a query for the database
$query = "SELECT * FROM user where uid='$id' ";
$result = @mysqli_query($dbc, $query);

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($result)){
  $name=$row['uname'];
  $dp=$row['dp'];
  $status=$row['status'];
  $email=$row['email'];
}

include 'display_dp.php';


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/pic.css" />
<link rel="stylesheet" href="css/feed.css" />
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

    <?php include_once("side_template.php"); ?>
  		<div class="col-md-9">
              <div class="profile-content">
                <?php include 'upload.php'; ?>
                <?php include 'feed.php'; ?>

              </div>
  		</div>
  	</div>
  </div>

  <br>
  <br>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
