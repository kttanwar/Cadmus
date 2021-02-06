<?php session_start();?>
<?php if(!isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>


<?php include("include/header.php");?>
<?php include("config/db.php");?>
<div class="container blog_post">
    <h1 style="text-align:center; margin-bottom:25px;">VIEW BLOG</h1>
    <?php $id = $_GET['id'];?>
    <?php
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
    <div class="row">
        <div class="col-lg-12" style="text-align:center;">
            <h3><a href=""><?php echo $title;?></a></h3>
            <img src=<?php echo $featuredimage;?> style="margin-bottom:50px; margin-top:10px">
        </div>
        <div class="col-lg-12" style="text-align:center;">
            <p>CATEGORY: <a href=""><?php echo $category;?></a><p>
            <p><?php echo $blog;?></p>
            <form action="like.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <?php
                    $sql = "SELECT * FROM likes WHERE post_id = '$id'";
                    $query = mysqli_query($conn, $sql) or die('error');
                    $cnt_likes = mysqli_num_rows($query);
                ?>
                <input type="submit" name="like" value="LIKE" style="background: none; color:#337ab7; border:none;"><span style="color:#337ab7;">: <?php echo $cnt_likes;?></span>
            </form>
            <form action="dislike.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <?php
                    $sql = "SELECT * FROM dislikes WHERE post_id = '$id'";
                    $query = mysqli_query($conn, $sql) or die('error');
                    $cnt_dislikes = mysqli_num_rows($query);
                ?>
                <input type="submit" name="dislike" value="DISLIKE" style="background: none; color:#337ab7; border:none;"><span style="color:#337ab7;">: <?php echo $cnt_dislikes;?></span>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="comment.php" method="POST">
                <input type="hidden" name="id" value = "<?php echo $id;?>">
                <div class="form-group">
                    <h4><label class="col-lg-3 control-label">Add Comment:</label></h4>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="comment" placeholder="Comment"></textarea>
                    </div>    
                </div>
                <div class="col-lg-12">
                    <input type="submit" name="postcomment" value="Comment" class="btn btn-primary">
                    <a href="dashboard.php" class="btn btn-default">Go Back To Dashboard</a>
                <div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <hr>
                <h4>All Comments:</h4>
                <?php
                    $com_query = "SELECT * FROM comments WHERE post_id ='$id' ORDER BY id DESC";
                    $coms_result = mysqli_query($conn, $com_query) or die("error");
                    if(mysqli_num_rows($coms_result)>0){
                        while($com = mysqli_fetch_assoc($coms_result)){
                            $username = $com['username'];
                            $comment = $com['comment'];
                            ?>
                            <i>Comment:<?php echo $comment;?></i>
                            <p>Posted By:<?php echo $username;?></p>
                            <hr>
                            <?php
                        }
                    }
                ?>
            </div>
        <div>
    </div>
</div>
<?php include("include/footer.php");?>

<?php endif;?>