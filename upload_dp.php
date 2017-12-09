
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 200px;
  height: 200px;
  opacity: 1;
  display: block;

  transition: .5s ease;
  backface-visibility: hidden;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

/* layout.css Style */
.upload-drop-zone {
  height: 250px;
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

</head>
<body>
<?php
require('../../mysqli_connect.php');
include("auth.php");
  $id=$_SESSION["username"];


  if (isset($_POST['upload'])) {
  		$target = "images/".basename($_FILES['image']['name']);

      $image = $_FILES['image']['name'];


$sql = "UPDATE user set dp='$image' where uid='$id'";
mysqli_query($dbc, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			echo "Image uploaded successfully";
      header("Location: upload_dp.php");
		}else{
			echo "Failed to upload image".$_FILES['image']['error']."ff";
		}
	}elseif (isset($_POST['remove'])) {
    $sql = "UPDATE user set dp=NULL where uid='$id'";
    mysqli_query($dbc, $sql);
	}{?>
<?php
  $query = "SELECT * FROM user where uid='$id' ";
  $result = @mysqli_query($dbc, $query);

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($result)){
    $name=$row['uname'];
    $status=$row['status'];
    $dp=$row['dp'];
    $email=$row['email'];
  }

  if($dp==NULL){
    $dp='<img src="images/avatardefault.jpg" class="img-responsive">';
  }
  else{
     $dp='<img src="images/'.$dp.'" class="img-responsive">';
  }


?>


<div class="container"> <br />
  <?php include_once("top_template.php"); ?>
    <div class="row">

    	<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Choose a Profile Picture</strong> <small> </small></div>
				<div class="panel-body">
					<div class="input-group image-preview">
            <form method="POST" action="" enctype="multipart/form-data">

						<!-- don't give a name === doesn't send on POST/GET -->
						<span class="input-group-btn">
						<!-- image-preview-clear button -->
            <button type="submit" class="btn btn-default image-preview-clear" name="remove" > <span class="glyphicon glyphicon-remove"></span> Remove Picture </button>

            <!-- image-preview-input -->
						<div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif" name="image"/>

              <!-- rename it -->
						</div>
						<button type="submit" name="upload" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span>
          </div>
					<!-- /input-group image-preview [TO HERE]-->

					<br />
        </form>

					<!-- Drop Zone -->
					<div class="upload-drop-zone" id="drop-zone">
            <div class="progress">
  						<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> <span class="sr-only">60% Complete</span> </div>
  					</div>

            <div class="profile-userpic">
              <?php echo $dp; ?>
            </div>
          </div>
					<br />
          <form action="dashboard.php" method="post">


					<!-- Progress Bar -->
        </div class="float-center">
        <button type="submit" name="back" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-home"></i> </span>Back Home</button>
      </br></span>
      </div>
      </form>


				</div>
			</div>
		</div>



	</div>
</div>



<!-- /container -->


    <?php } ?>
</body>
</html>
