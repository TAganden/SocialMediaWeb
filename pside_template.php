<div class="row profile">
<div class="col-md-3">
  <div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
      <div class="con">
<?php echo $dp; ?>
<div class="mid">
<div class="change"><a href="upload_dp.php"> Change Picture</a></div>
</div>
</div>

    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
      <div class="profile-usertitle-name">
        <?php echo $name; ?>
      </div>
      <div class="profile-usertitle-job">
        <?php echo $email; ?>
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR BUTTONS -->
    <div class="profile-userbuttons">

  </br>

    </div>
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
      <ul class="list-group">
                 <li class="list-group-item text-right"><span class="pull-left"><strong class=""><a href="view.php?uid=<?php  echo $id;?>&type=posts">Posts</a></strong></span><?php

                 $qu="SELECT count(*) FROM media WHERE uid='$id'";
                 $resu= @mysqli_query($dbc,$qu);
                 while($r = mysqli_fetch_array($resu)){
                   $no=$r['count(*)'];
                 }

                 echo $no;
                  ?></li>

                 <li class="list-group-item text-right"><span class="pull-left"><strong class=""><a href="view.php?uid=<?php  echo $id;?>&type=friends">Friends</a></strong></span><?php

                 $qu="SELECT count(*) FROM friends WHERE uid='$id'";
                 $resu= @mysqli_query($dbc,$qu);
                 while($r = mysqli_fetch_array($resu)){
                   $no=$r['count(*)'];
                 }

                 echo $no;
                  ?></li>

             </ul>
    </div>
    <!-- END MENU -->
  </div>
</div>
