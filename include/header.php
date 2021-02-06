<!DOCTYPE html>
<html>
    <head>
        <title>CADMUS</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/612fc82eca.js" crossorigin="anonymous"></script>
        <!-- <script>
        $('#autoresizing').on('input', function () {
            this.style.height = 'auto';
             
            this.style.height = 
                    (this.scrollHeight) + 'px';
        });
        </script> -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary cadmus_nav">
            <div class="col-lg-10">
                <a class="navbar-brand" href="index.php"><img src="include/Optimized-cadmusbanner.png"></a>
            </div>
            <div class = "col-lg-2">
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle fa-2x" style = "color:#fff;"></i></a>
                <div class="dropdown-menu">
                <?php $login_url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>
                <?php if($login_url == 'http://localhost/cadmus_personal/index.php'):?>
                    <a class="dropdown-item" href="signup.php">Sign Up</a>
                    <a class="dropdown-item" href="login.php">Login</a>
                <?php elseif($login_url == 'http://localhost/cadmus_personal/login.php'):?>
                    <a class="dropdown-item" href="signup.php">Sign Up</a>
                <?php elseif($login_url == 'http://localhost/cadmus_personal/signup.php'):?>
                    <a class="dropdown-item" href="login.php">Login</a>
                <?php elseif(($login_url == 'http://localhost/cadmus_personal/dashboard.php') || ($login_url == 'http://localhost/cadmus_personal/profile.php') || ($login_url == 'http://localhost/cadmus_personal/post.php') || ($login_url == 'http://localhost/cadmus_personal/view.php') || ($login_url == 'http://localhost/cadmus_personal/edit.php')):?>
                    <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                    <a class="dropdown-item" href="profile.php">Add Profiles</a>
                    <a class="dropdown-item" href="post.php">Add Blog</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                <?php endif;?>
                </div>
                </li>
                </ul>
            </div>
            </div>
        </nav>