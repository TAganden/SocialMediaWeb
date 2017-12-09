<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];
if (isset($_GET['mid'])) {
  # code...
$mid=$_GET['mid'];
}

$q="delete from media where uid='$id' and mid='$mid'";
$res=mysqli_query($dbc,$q);

header("Location: view.php");

 ?>
