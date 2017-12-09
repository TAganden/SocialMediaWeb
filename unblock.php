<?php
require('../../mysqli_connect.php');
include("auth.php");
$id=$_SESSION["username"];
// Create a query for the database
if (isset($_GET['ubid'])) {
$ubid=$_GET['ubid'];
}

$query="DELETE FROM `blocked` WHERE uid='$id' and bid='$ubid'";
$res = @mysqli_query($dbc, $query);


header("Location: search.php?ufid=$ubid");


 ?>
