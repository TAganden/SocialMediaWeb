<?php

$query = "SELECT * FROM media where uid='$id' ";
$result = @mysqli_query($dbc, $query);

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
$i=0; $pic = array();
while($row = mysqli_fetch_array($result)){
  $file=$row['file'];
  $mid=$row['mid'];
  $cap=$row['caption'];
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
   $time = date("F j, Y g:i a", strtotime($row['timestamp']));
$pic[$i]='<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
  <div class="thumbnail" >
  <div class="row" style="padding:0px 0px 5px 10px;" >
    <div class="col-md-5" style=" margin-right:20px; height:10%; width:10%; padding:10px 0px 5px 15px;"><a style="margin-left:560px;"  href="delete.php?mid='.$mid.'"><span class="glyphicon glyphicon-trash"></span></a></div></div>
    <img src="images/'.$file.'"alt="">
      <div class="caption">
        <p style="font-size:15px;">'.$cap.'</p>

        <p><a>
   <span class="glyphicon glyphicon-heart" style="font-size:30px; color:#f24646;"></span>&nbsp;&nbsp<span style="font-size:12px;">'.$likes.'</span> </a><span class="pull-right"> '.$time.'</span>
</p>
    </div>
  </div>
</div></div>';;
$i++;}

$pic=array_reverse($pic);

  echo implode("",$pic);

?>
