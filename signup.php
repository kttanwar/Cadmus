<?php 
    include("config/db.php");
    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($username != '' && $email != '' && $password != ''){
            $pwd_hash = sha1($password);
            $sql = "INSERT INTO users (username, email, password, role) VALUES('$username', '$email', '$pwd_hash', 0)";
            $query = $conn->query($sql);
            if($query){
                header('Location:login.php');
            }
            else{
                $error = 'Account creation failed!';
            }
        }
        else{
            $error = 'Please fill all the details!';
        }
    }
?>
<?php include("include/header.php");?>
<div class="container cadmus_all_form">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card signup-form">
        <h2 class="card-title text-center">Sign Up
        </h2>
        <div class="card-body py-md-4">
          <form action="signup.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between">
              <a href="login.php">Login
              </a>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="signup" value="Signup">Create Account</button>
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
            <div class="form-group">
                <?php if(isset($_POST['signup'])):?>
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
