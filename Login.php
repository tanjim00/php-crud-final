<?php
if (isset($_POST['login'])) {
  $conn = mysqli_connect("localhost", "root", "", "userdatas"); // database connection

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM Userinfos WHERE email = '$email'";
  $res = mysqli_query($conn, $sql); // database connection

  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $storedPassword = $row['password'];

    if ($password === $storedPassword) {
      session_start();
      $_SESSION['user'] = $row['username'];
      header("location://localhost/Reg/Crud.php");
      exit();
    } else {
      echo "<div class='alert alert-danger'>Invalid Password</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Invalid Email</div>";
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

      .div#forgot-popup{
        display:flex;
      }
   </style>

    <title>Registration Portal</title>
  </head>
  <body>
    <video id="video-container" class="video-js vjs-default-skin" autoplay muted loop>
      <source src="images/1.mp4" type="video/mp4">
    </video>

    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <h1 class="text-center">Login</h1>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Email">
          <small id="emailHelp" class="form-text text-white-50">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password">

        </div>
        
        <div class="form-group">
    <input type="submit" name="login" class="btn btn-outline-dark btn-lg btn-block text-white" value="Login">
</div>
        
        <div class="form-group">
        <a href="forgotpass.php" class="text-warning">Forgot Password?</a>
          </div>

<div class="form-group">
          Don't have an account? <span><a href="Signup.php" class="text-warning">Sign Up</a></span>
          </div>
      </form>
    </div>

  
  </body>
</html>