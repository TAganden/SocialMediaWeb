<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];

  if (isset($_GET['type'],$_GET['ruid'])) {
    $type=$_GET['type'];
    $ruid=$_GET['ruid'];
  }

  switch ($type) {
    case 'a':
      # code...
      $q1="INSERT INTO `friends` (`uid`, `fid`) VALUES ('$id', '$ruid')";
      $q2=  "INSERT INTO `friends` (`uid`, `fid`) VALUES ('$ruid', '$id')";
      $q3="CALL accepted('$id','$ruid')";
      $sql=$dbc->query($q3);
        $r1 = @mysqli_query($dbc, $q1);
          $r2 = @mysqli_query($dbc, $q2);
            $r3 = @mysqli_query($dbc, $q3);
            // echo "done";

      break;

    case 'r':
      # code...
        $q3="DELETE FROM `requests` WHERE `requests`.`uid` = '$id' AND `requests`.`ruid` = '$ruid'";
        $r3 = @mysqli_query($dbc, $q3);
        // echo "case Reject";
      break;

    default:
      # code...
      // echo "def";
      break;
  }

  // echo "out";
header("Location: request.php");







 ?>
