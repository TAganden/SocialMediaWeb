<?php
$query1= "SELECT * FROM media";
$result1 = @mysqli_query($dbc, $query1);
$query2= "SELECT * FROM friends where uid='$id'";
$result2 = @mysqli_query($dbc, $query2);
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
$fid=array();
$i=0;
while($row1 = mysqli_fetch_array($result2)){
  $fid[$i]=$row1['fid'];
  $i++;
}
$fid[$i]=$id;
$i=0;
$uid=array();
$mid= array();

while($row = mysqli_fetch_array($result1)){
  $uid[$i]=$row['uid'];
  $mid[$i]=$row['mid'];
  $i++;
}

$n=sizeof($fid);
$m=sizeof($uid);
$feed_id= array();
$k=0;
for ($i=0; $i <$m ; $i++) {
for ($j=0; $j <$n ; $j++) {
  if($fid[$j]==$uid[$i]){
    $feed_id[$k]=$mid[$i];
    $k++;
  }

}
}

$feed_id=array_reverse($feed_id);
foreach ($feed_id as $pic) {
  $query= "SELECT * FROM media WHERE mid='$pic'";
  $result = @mysqli_query($dbc, $query);
  while($row = mysqli_fetch_array($result)){
    $file=$row['file'];
    $uid=$row['uid'];
    $mid=$row['mid'];
    $cap=$row['caption'];
    $time = date("F j, Y g:i a", strtotime($row['timestamp']));
    $q= "SELECT * FROM user WHERE uid='$uid'";
    $res = @mysqli_query($dbc, $q);
    while($row1 = mysqli_fetch_array($res)){
      $dp=$row1['dp'];
      include 'display_dp.php';
    }
    $qu= "SELECT count(*) as likes FROM likes WHERE mid='$mid'";
  $res = @mysqli_query($dbc, $qu);
  while($r = mysqli_fetch_array($res)){
    $likes=$r['likes'];
  }
    // $qu= "SELECT count(*) as likes FROM activities WHERE mid='$mid' AND type='like'";
    // $res = @mysqli_query($dbc, $qu);
    // while($r = mysqli_fetch_array($res)){
    //   $likes=$r['likes'];
    // }
    $i=0;
    $comment=array( );

    // $cap=$row['caption'];

$pic='<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

  <div class="thumbnail">
<div class="profile-userpic">
  <div class="row" style="padding:0px 0px 5px 10px;" >
    <div class="col-md-5" id="'.$mid.'"style="height:10%; width:10%; padding:10px 0px 5px 15px;">'. $dp.'</div><div class="col-md-7"  style="padding:10px 0px 5px 10px;"><h4>'.$uid.'</h4></div></div></div>
    <img src="images/'.$file.'"alt="">
      <div class="caption">
        <p style="font-size:15px;">'.$cap.'</p>

        <p><a href="like.php?type=like&mid='.$mid.'">
   <span class="glyphicon glyphicon-heart" style="font-size:30px; color:#f24646;"></span>&nbsp;&nbsp<span style="font-size:12px;">'.$likes.'</span> </a><span class="pull-right"> '.$time.'</span>
</p>
<form action="comment.php?mid='.$mid.'" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="input-group">


      <input type="text" name="comment" class="form-control"  placeholder="Leave a Comment here . . ." aria-label="Leave a Comment here . . ." style="margin-bottom:11px;" />
      <span class="input-group-btn">  <button  class="btn btn-secondary" name="submit" style="float:left;" type="submit"><i class="glyphicon glyphicon-send"></i></button>
</span>
</div>
</div></div>  </form>';



$qu= "SELECT comment,uname from comment natural join media natural join user where mid='$mid'";
$res = @mysqli_query($dbc, $qu);
while($r = mysqli_fetch_array($res)){
  if(isset($r['comment'])) {
  $pic .='<p style="background: rgba(1,1,1,0.1); padding: 10px 20px 10px;margin-top: 2px;margin-bottom:2px;">'.$r['uname']." Says : ".$r['comment'].'</p>';
}
}






$pic .='   </div>
  </div>
</div></div>';
}
echo $pic;
}




 ?>
