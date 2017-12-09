<?php

$query = "SELECT * FROM user where uid
          in (
            Select fid from friends
            where uid='$id'
          )";
$result = @mysqli_query($dbc, $query);

// mysqli_fetch_array will return a row of data from the query
// until no further data is available

while($r = mysqli_fetch_array($result)){
  $sname=$r['uname'];
  $sid=$r['uid'];
  $sdp=$r['dp'];
  if($sdp== NULL){
    $sdp='<img src="images/avatardefault.jpg" class="img-responsive">';
  }
  else{
    $sdp='<img src="images/'.$sdp.'" class="img-responsive">';

  }
  echo '<div class="thumbnail">
  <div class="profile-userpic">
  <div class="row" style="padding:0px 0px 5px 10px;" >
    <div class="col-md-5" style="height:10%; width:10%; padding:10px 0px 5px 15px;">'. $sdp.'</div><div class="col-md-7"  style="padding:10px 0px 5px 10px;"><h4><a href="view.php?uid='.$sid.'">'.$sid.'</a></h4>';
    if(isset($_GET['uid'])){
    //   echo implode("",$row);
    echo '<a href="add_friend.php?uid='.$sid.'"><button type="button" class="btn btn-default btn-sm">
      <span class="glyphicon glyphicon-plus"></span>Add Friend
            </button></a></div></div></div>';
          }
          else{
            echo '<button type="button" class="btn btn-default btn-sm">
                      <a href="remove_friend.php?uid='.$sid.'"><span class="glyphicon glyphicon-remove-circle"></span>Un-Friend
                    </button></div></div></div>';
         }
  }



?>
