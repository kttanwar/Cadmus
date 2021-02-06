<?php session_start();?>
<?php
    include("config/db.php");
    if(isset($_FILES['featuredimage'])){
        $post_id = $_POST['id'];
        $upl_featuredimage = $_POST['featuredimage'];
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

                $image_path = explode('/', $upl_featuredimage);
                $image = $image_path[6];
                
                $full_url = $path.'/'.'assets/featuredimages/'.$file_name;
                $id = $_SESSION['id'];
                $sql = "UPDATE posts 
                        SET title = '$title', blog = '$blog', category = '$category', featuredimage = '$full_url'
                        WHERE id = '$post_id'";
                
                unlink("assets/featuredimages/" . $image);
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