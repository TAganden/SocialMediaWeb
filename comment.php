<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];

if (isset($_GET['mid'])) {
  # code...
  $mid=$_GET['mid'];
  $c=$_POST['comment'];
}else {
  $mid=NULL;
}

$q="INSERT INTO comment value ('$mid','$id','$c')";
$r=mysqli_query($dbc,$q);


header("Location:dashboard.php#$mid");


 ?>
