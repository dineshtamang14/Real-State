<?php include'header.php';?>


<?php
include("dbcon.php");

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "SELECT * from user WHERE email='$email'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount > 0){
            ?>
    <script>
        alert("Email Already Exits");
    </script>
    <?php 
    } else {
      if($password === $cpassword){
        $insertquery = "INSERT INTO user(name, email, password) VALUES('$name', '$email', '$pass');";
        $iquery = mysqli_query($con, $insertquery);

        if($iquery){
            header('Location: index.php');
        }
      } else {
        ?>
        <script>
            alert("please check your password!");
        </script>
        <?php 
      }
    }
}
?>

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->

<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

      <form method="POST" action="register.php">
      <input type="text" class="form-control" placeholder="Full Name" name="name" required autocomplete="off">
                <input type="email" class="form-control" placeholder="Enter Email" name="email" required autocomplete="off">
                <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="off">
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass" required autocomplete="off">

                <textarea rows="6" class="form-control" placeholder="Address"></textarea>
      <input type="submit" class="btn btn-success" name="submit">Register</button>
      </form>                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>