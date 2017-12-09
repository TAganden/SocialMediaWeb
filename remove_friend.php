<?php
require('../../mysqli_connect.php');
include("auth.php");
$id=$_SESSION["username"];
// Create a query for the database
if (isset($_GET['uid'])) {
$fid=$_GET['uid'];
}

$query="DELETE FROM `friends` WHERE uid='$id' and fid='$fid'";
$res = @mysqli_query($dbc, $query);

$quer="DELETE FROM `friends` WHERE uid='$fid' and fid='$id'";
$re = @mysqli_query($dbc, $quer);
header("Location: search.php?ufid=$fid");


 ?>
