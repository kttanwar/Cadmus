<?php 
    session_start();
    include("config/db.php");
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email != '' && $password != ''){
            $passwd = sha1($password);
            $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$passwd'";
            $result = mysqli_query($conn, $sql) or die('Error');
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $email = $row['email'];

                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $email;
                    header('Location:dashboard.php');
                }
            }
            else{
                $error = 'Username or Password is Incorrect!';
            }
        }
        else{
            $error = 'Please fill all the details!';
        }
    }
?>
<?php if(isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>
<?php include("include/header.php");?>
<div class="container cadmus_all_form">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card signup-form">
        <h2 class="card-title text-center">Login
        </h2>
        <div class="card-body py-md-4">
          <form action="login.php" method="POST">
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between">
              <a href="signup.php">New User
              </a>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
            <div class="form-group">
                <?php if(isset($_POST['login'])):?>
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