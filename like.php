<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];

if (isset($_GET['type'],$_GET['mid'])) {
  $type=$_GET['type'];
  $mid=(int)$_GET['mid'];

  $query="INSERT INTO likes (uid,mid)
          SELECT  '$id','$mid'
          FROM media
          WHERE EXISTS(
            SELECT mid
            FROM media
            WHERE mid='$mid')
            AND NOT EXISTS(
              SELECT mid
              FROM likes
              WHERE uid='$id'
              AND mid='$mid'
            )
            LIMIT 1";
  $res = @mysqli_query($dbc, $query);
  $query2="UPDATE activities
                SET type='$type'
                WHERE uid='$id'
                AND mid='$mid'";
  $res2 = @mysqli_query($dbc, $query2);
}
header("Location: dashboard.php#$mid");

 ?>
