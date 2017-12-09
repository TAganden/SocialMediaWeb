<?php
require('../../mysqli_connect.php');
include("auth.php");
$rid=$_SESSION["username"];
// Create a query for the database
if (isset($_GET['uid'])) {
$id=$_GET['uid'];
}
echo $id.$rid;
$query="INSERT INTO requests (uid,ruid)
          SELECT '$id','$rid'
          FROM user
          WHERE  NOT EXISTS(
               SELECT fid
              FROM friends
              WHERE uid='$rid' AND fid='$id')
              AND NOT EXISTS(
                  SELECT uid
                  FROM requests
                  WHERE ruid='$rid' AND uid='$id')
            LIMIT 1";
$res = @mysqli_query($dbc, $query);
header("Location: search.php?uid=$id");


 ?>
