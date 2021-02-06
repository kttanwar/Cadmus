<?php
    session_start();
?>
<?php
    include("config/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT * FROM profile WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die('error');
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $profile_pic = $row['profile_pic'];
            $profession = $row['profession'];
        }
    }
?>
<?php if(!$_SESSION['username']):?>
    <?php header('Location:login.php');?>
<?php else:?>
<?php include("include/header.php");?>
<div class="container blog_post">
    <?php
        $url = $_SERVER['PHP_SELF'];
        $seg = explode('/', $url);
        $path = 'http://'.$_SERVER['SERVER_NAME'].$seg[0].'/'.$seg[1];
        $full_url = $path.'/'.'img'.'/'.'profile_pic.png';
    ?>
    <?php if($_SESSION['id'] == 1):?>
        <h1>ADMIN DASHBOARD</h1>
    <?php else:?>
        <h1>USERS DASHBOARD</h1>
    <?php endif;?>
    <div class="row">
        <div class="col-lg-12">
            <p>
                <?php if(isset($profile_pic)):?>
                    <img src = <?php echo $profile_pic;?> style = "width: 200px; border-radius: 30%"/>
                    <h1><?php echo $_SESSION['username'];?></h1>
                    <h4><?php echo $profession;?></h4>
                <?php else:?>
                    <img src = <?php echo $full_url;?> style = "width: 200px; border-radius: 30%"/>
                    <h1><?php echo $_SESSION['username'];?></h1>
                <?php endif;?>
            </p>
        </div>
    </div>
    <h1>ALL BLOGS</h1>
    <?php
    $posts_query = "SELECT * FROM posts";
    $posts_result = mysqli_query($conn, $posts_query) or die("error");
    if(mysqli_num_rows($posts_result)>0){
        while($posts = mysqli_fetch_assoc($posts_result)){
            $id = $posts['id'];
            $title = $posts['title'];
            $blog = $posts['blog'];
            $category = $posts['category'];
            $featuredimage = $posts['featuredimage'];

            ?>
            <div class="row">
                <div class="col-lg-12" style="text-align:center;">
                    <h3><a href=""><?php echo $title;?></a></h3>
                    <img src=<?php echo $featuredimage;?> style="margin-bottom:50px; margin-top:50px">
                </div>
                <div class="col-lg-12" style="text-align:center;">
                    <p><?php echo $blog;?></p>
                    <p>CATEGORY: <a href=""><?php echo $category;?></a><p>
                    <?php if($_SESSION['id'] != 1):?>
                        <a href="view.php?id=<?php echo $id;?>">VIEW</a>
                        <hr>
                    <?php else:?>
                    <a href="view.php?id=<?php echo $id;?>">VIEW</a>
                    <a href="edit.php?id=<?php echo $id;?>" style="margin-left: 25px;margin-right: 25px;">EDIT</a>
                    <a href="delete.php?id=<?php echo $id;?>">DELETE</a>
                    <hr>
                    <?php endif;?>
                </div>
            </div>
            <?php
        }
    }
    ?>
    
</div>
<?php include("include/footer.php");?>
<?php endif;?>