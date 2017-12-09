<style type="text/css">
/* layout.css Style */
.upload-drop-zone {
  min-height: xxx;
  overflow: hidden;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}



.image-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>


<?php

  if (isset($_POST['upload'])) {
  		$target = "images/".basename($_FILES['image']['name']);
      $type=$_FILES['image']['type'];
      $image = $_FILES['image']['name'];
      $caption=$_POST['caption'];

$query = "INSERT INTO `media`(`uid`, `type`, `caption`, `file`) VALUES (?,?,?,?)";
 $stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, "ssss", $id,$type,$caption,$image);
mysqli_stmt_execute($stmt);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      // header("Location: dashboard.php");
		}else{
			echo "Failed to upload image".$_FILES['image']['error']."ff";
		}
	}{?>

    <?php
     $last_id = mysqli_insert_id($dbc);
      $query = "SELECT * FROM media where mid='$last_id' ";
      $result = @mysqli_query($dbc, $query);

      // mysqli_fetch_array will return a row of data from the query
      // until no further data is available
      while($row = mysqli_fetch_array($result)){
        $caption=$row['caption'];
        $name=$row['file'];
        $ts=$row['timestamp'];
      }

      if($last_id==NULL){
        $pic='<img src="images/uploaddefault.jpg" class="img-responsive">';
      }
      else{
         $pic='<img src="images/'.$name.'" class="img-responsive">';
      }


    ?>

<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading"><strong>Post A Picture</strong> <small> </small></div>
  <div class="panel-body">
    <div class="input-group image-preview">
      <form method="POST" action="" enctype="multipart/form-data">

      <!-- don't give a name === doesn't send on POST/GET -->
      <span class="input-group-btn">
      <!-- image-preview-clear button -->

      <!-- image-preview-input -->
      <div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
        <input type="file" accept="image/png, image/jpeg, image/gif" name="image"/>

        <!-- rename it -->
      </div>
      <button type="submit" name="upload" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
      </span>
    </div>
    <!-- /input-group image-preview [TO HERE]-->

    <br/>


    <!-- Drop Zone -->
    <div class="upload-drop-zone" id="drop-zone">

      <div class="col-sm-6">
        <?php echo $pic; ?>
      </div>
      <div class="col-sm-6" >
        <textarea class="form-control" name="caption" style="margin-top:8px; min-height:xxx; overflow:hidden;" rows="3"></textarea>
      </div>
    </div>
    <br />
</form>

  </div>
</div>

</div>

    <?php } ?>
