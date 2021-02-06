<?php session_start();?>
<?php
    include("config/db.php");
    if(isset($_FILES['profile_pic'])){
        $profession = $_POST['profession'];
        if($profession != ""){
            $uploadok = 1;
            $file_name = $_FILES['profile_pic']['name'];
            $file_size = $_FILES['profile_pic']['size'];
            $file_tmp = $_FILES['profile_pic']['tmp_name'];
            $file_type = $_FILES['profile_pic']['type'];
            $target_dir = "assets/uploads";
            $target_file = $target_dir . basename($_FILES['profile_pic']['name']);
            $check = getimagesize($_FILES['profile_pic']['tmp_name']);
            $extexplode = explode('.', $_FILES['profile_pic']['name']);
            $ext = end($extexplode);
            $file_ext = strtolower($ext);
         
            $extensions = array("jpeg", "jpg", "png");
            if(in_array($file_ext, $extensions) == false){
                $error = "Supported file types are jpeg, jpg and png!";
            }
            if(file_exists($target_file)){
                $error = "File already exists!";
            }
            if($check == false){
                $error = "File is not an image file!";
            }
            if(empty($error) == true){
                move_uploaded_file($file_tmp, "assets/uploads/" . $file_name);
                $url = $_SERVER['HTTP_REFERER'];
                $seg = explode('/', $url);
                $path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
                $full_url = $path.'/'.'assets/uploads/'.$file_name;
                $id = $_SESSION['id'];
                $sql = "INSERT INTO profile(profession, profile_pic, user_id) VALUES('$profession', '$full_url', '$id')";
                $query = $conn -> query($sql);
                if($query){
                    header('Location: dashboard.php');
                }
                else{
                    $error = "Failed to Upload Image!";
                }
            }
        }
        else{
            $error = "Please fill all the details!";
        }
    }
?>
<?php if(!isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>
<?php include("include/header.php");?>
<div class="container cadmus_all_form">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card signup-form">
        <h2 class="card-title text-center">Add Profile
        </h2>
        <div class="card-body py-md-4">
          <form action="profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" name="profession" placeholder="Add Profession">
            </div>
            <div class="form-group">
                <label for="profile_pic" class = "col-form-label">Change Profile Picture</label>
              <input type="file" name="profile_pic" placeholder="Profile Pic">
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="profile" value="Profile">Add Profile</button>
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
            <div class="form-group">
                <?php if(isset($_POST['profile'])):?>
                    <div class="alert alert-dismissible alert-warning">
                        <p><?php echo $error;?></p>
                    </div>
                <?php endif;?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("include/footer.php");?>
<?php endif;?>