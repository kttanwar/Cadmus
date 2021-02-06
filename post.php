<?php session_start();?>
<?php
    include("config/db.php");
    if(isset($_FILES['featuredimage'])){
        $title = $_POST['title'];
        $blog = $_POST['blog'];
        $category = $_POST['category'];
        if($title != "" && $blog != "" && $category != ""){
            $uploadok = 1;
            $file_name = $_FILES['featuredimage']['name'];
            $file_size = $_FILES['featuredimage']['size'];
            $file_tmp = $_FILES['featuredimage']['tmp_name'];
            $file_type = $_FILES['featuredimage']['type'];
            $target_dir = "assets/featuredimages";
            $target_file = $target_dir . basename($_FILES['featuredimage']['name']);
            $check = getimagesize($_FILES['featuredimage']['tmp_name']);
            $extexplode = explode('.', $_FILES['featuredimage']['name']);
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
                move_uploaded_file($file_tmp, "assets/featuredimages/" . $file_name);
                $url = $_SERVER['HTTP_REFERER'];
                $seg = explode('/', $url);
                $path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
                $full_url = $path.'/'.'assets/featuredimages/'.$file_name;
                $id = $_SESSION['id'];
                $sql = "INSERT INTO posts(title, blog, category, featuredimage, user_id) VALUES('$title', '$blog', '$category', '$full_url', '$id')";
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
    <div class="col-md-10">
      <div class="card signup-form">
        <h2 class="card-title text-center">Add Blog
        </h2>
        <div class="card-body py-md-4">
          <form action="post.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Title Of Blog">
            </div>
            <div class="form-group">
              <textarea id="autoresizing" class="form-control" name="blog" placeholder="Type Blog Here"></textarea>
            </div>
            <div class="form-group">
                <label for="category" class = "col-form-label">Choose Category</label>
                <select class ="form-control category" name="category">
                    <option value="" disabled selected>--Select--</option>
                    <option value="Technology">Technology</option>
                    <option value="Design">Design</option>
                    <option value="Design">Management</option>
                    <option value="Science & Humanities">Science & Humanities</option>
                </select>
            </div>
            <div class="form-group">
                <label for="featuredimage" class = "col-form-label">Add Blog Picture</label>
                <input type="file" name="featuredimage">
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="addblog" value="AddBlog">Add Blog</button>
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
            <div class="form-group">
                <?php if(isset($_POST['addblog'])):?>
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