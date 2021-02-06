<?php session_start();?>
<?php if(!isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>

    <?php include("config/db.php");?>
    <?php
        if(isset($_POST['postcomment'])){
            $user_id = $_SESSION['id'];
            $username = $_SESSION['username'];
            $postid = $_POST['id'];
            $comment = $_POST['comment'];
            if($comment != ""){
                $sql = "INSERT INTO comments (user_id, post_id, username, comment) VALUES('$user_id', '$postid', '$username', '$comment')";
                $query = $conn -> query($sql);
                if($query){
                    header("Location:view.php?id=" . $postid);
                }
            }
        }
    ?>

<?php endif;?>