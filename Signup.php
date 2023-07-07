<?php
if (isset($_POST['save'])) {

  $conn = mysqli_connect("localhost", "root", "", "userdatas");

  $user = $_POST['user'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password === $cpassword) {
      $sql1 = "INSERT INTO Userinfos (username, email, mobile, password) VALUES ('$user', '$email', '$mobile', '$password')";
      if (mysqli_query($conn, $sql1)) {
          echo "<div class='alert alert-danger'>Congratulations! You have registered successfully</div>";
      } else {
          echo "Sorry! Credentials are not valid ";
      }
  } else {
      echo "<div class='alert alert-danger'>Passwords do not match</div>";
  }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Video.js CSS -->
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet">

    <style>
      body {
        position: relative;
      }

      #video-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        object-fit: cover;
        
      }

      .container {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: snow;
      }

      form {
        padding: 40px;
        background: rgba(240, 240, 240, 0.3);
      }
    </style>

    <title>Registration Portal</title>
  </head>

  <body>
    <video id="video-container" class="video-js" autoplay muted loop>
      <source src="images/4.mp4" type="video/mp4">
    </video>

    <div class="container">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <h1 class="text-center">Sign Up</h1>

        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="exampleInputusername" aria-describedby="usernameHelp" name="user" placeholder="Enter Username">
          
        </div>

    
        <div class="form-group">
          <label for="exampleInputEmail1">Email Address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Email">
          <small id="emailHelp" class="form-text text-white-50">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputmobile1">Mobile Number</label>
          <input type="mobile" class="form-control" id="exampleInputmobile1" name="mobile" placeholder="Enter Mobile Number">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>

        <div class="form-group">
          <label for="exampleconfirmpassword1">Confirm Password</label>
          <input type="password" class="form-control" id="exampleconfirmPassword1" name="cpassword" placeholder="Confirm Password">
        </div>
    
        <div class="form-group my-2">
          <input type="submit" name="save" class="btn btn-outline-dark btn-lg btn-block text-white" value="Sign Up">
        </div>
        <div class="form-group">
          Already have an account? <span><a href="Login.php" class="text-warning">Login</a></span>
          </div>
      </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   


</body>
</html>