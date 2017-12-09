
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
      <form method="POST" action="edit.php" >
      <button type="submit" class="btn btn-success btn-sm text-left" name="edit">Edit Details</button>
    </form>
  </br>
    <form method="POST" action="logout.php" >
      <button type="submit" class="btn btn-danger btn-sm " name="logout.php">Logout</button>
    </form>
    </div>
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
      <ul class="nav">

        <li>
          <a href="view.php">
          <i class="glyphicon glyphicon-user"></i>
          View Profile</a>
        </li>
        <li>
          <a href="request.php">
          <i class="	glyphicon glyphicon-bullhorn"></i>
          Requests
          <?php

          $qu="SELECT no FROM no_of_requests WHERE uid='$id'";
          $resu= @mysqli_query($dbc,$qu);
          while($r = mysqli_fetch_array($resu)){
            $no=$r['no'];
          }
          if($no!=0){
          echo '<span class="badge badge-primary">'.$no.'</span>';}
           ?>
         </a>
        </li>
        

      </ul>
    </div>
    <!-- END MENU -->
  </div>
</div>
