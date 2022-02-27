<?php include'header.php';?>

<?php
include("dbcon.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $emailquery = "SELECT * from user WHERE email='$email'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
          ?>
          <script>
            location.replace("home.php");
          </script>
          <?php 
        } else {
        ?>
        <script>
            alert("please check your password!");
        </script>
        <?php 
        }
    } else {
      ?>
      <script>
          alert("Email Does not exist please register first");
      </script>
      <?php 
    }
}
?>

<div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Login</h4>
          <form role="form" method="POST" action="index.php">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="email" required autocomplete="off">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password" required autocomplete="off">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Remember me
          </label>
        </div>
        <input type="submit" class="btn btn-success" name="submit"></button>
      </form>          
        </div>
        <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and get updated with all the properties deal happening around.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
        </div>

      </div>
    </div>
  </div>
</div>

