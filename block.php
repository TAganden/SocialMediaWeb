<?php
require('../../mysqli_connect.php');
include("auth.php");
$id=$_SESSION["username"];
// Create a query for the database
if (isset($_GET['uid'])) {
$bid=$_GET['uid'];
}
echo $id.$rid;
$query="INSERT INTO blocked (uid,bid)
          SELECT '$id','$bid'
          FROM user
          WHERE  NOT EXISTS(
               SELECT bid
              FROM blocked
              WHERE uid='$id' AND bid='$bid')

            LIMIT 1";
$res = @mysqli_query($dbc, $query);

$query="DELETE FROM `friends` WHERE uid='$id' and fid='$bid'";
$res = @mysqli_query($dbc, $query);

$quer="DELETE FROM `friends` WHERE uid='$bid' and fid='$id'";
$re = @mysqli_query($dbc, $quer);

header("Location: search.php?buid=$bid");


 ?>
