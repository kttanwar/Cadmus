<?php session_start();?>
<?php if(!isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>

    <?php
        include("config/db.php");
        $id = $_GET['id'];
        $posts_query = "SELECT * FROM posts WHERE id = '$id'";
        $posts_result = mysqli_query($conn, $posts_query) or die("error");
        if(mysqli_num_rows($posts_result)>0){
            while($posts = mysqli_fetch_assoc($posts_result)){
                $id = $posts['id'];
                $title = $posts['title'];
                $blog = $posts['blog'];
                $category = $posts['category'];
                $featuredimage = $posts['featuredimage'];
            }
        }
    ?>
    <?php include("include/header.php");?>
    <div class="container cadmus_all_form">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card signup-form">
            <h2 class="card-title text-center">Update Blog
            </h2>
            <div class="card-body py-md-4">
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="featuredimage" value="<?php echo $featuredimage;?>">
                <div class="form-group">
                <input type="text" class="form-control" name="title" value="<?php echo $title;?>" placeholder="Title Of Blog">
                </div>
                <div class="form-group">
                <textarea id="autoresizing" class="form-control" name="blog" placeholder="Type Blog Here"><?php echo $blog;?></textarea>
                </div>
                <div class="form-group">
                    <label for="category" class = "col-form-label">Choose Category</label>
                    <select class ="form-control category" name="category">
                        <option value=<?php echo $category;?>><?php echo $category;?></option>
                        <option value="Technology">Technology</option>
                        <option value="Design">Design</option>
                        <option value="Design">Management</option>
                        <option value="Science & Humanities">Science & Humanities</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="featuredimage" class = "col-form-label">Change Blog Picture</label>
                    <input type="file" name="featuredimage">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-between">
                <a href="dashboard.php">Go Back To Dashboard</a>
                <div class="form-group">
                    
                    <button type="submit" class="btn btn-primary" name="addblog" value="Update Blog">Update Blog</button>
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