<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];
if(isset($_POST['submit'])){
$name=$_POST['name'];
$eid=$_POST['email'];
$pwd = MD5($_POST['password']);


}
$query2="UPDATE user
              SET uname='$name'
              WHERE uid='$id'";
$res2 = @mysqli_query($dbc, $query2);
$query3="UPDATE user
              SET pwd='$pwd'
              WHERE uid='$id'";
$res3 = @mysqli_query($dbc, $query3);
$query4="UPDATE user
              SET email='$eid'
              WHERE uid='$id'";
$res4 = @mysqli_query($dbc, $query4);
 header("Location: edit.php");
 ?>
