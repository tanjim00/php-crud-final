<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "userdatas"); 
if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `Userinfos` (username, email, mobile, password) VALUES ('$user', '$email', '$mobile', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
        header('location:Cruddisplay.php');
    } else {
        echo "Data not inserted";
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

    
      .container {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: black;
      }

      .custom-font-size {
    font-size: 30px;
    
}

.navbar-nav {
    display: flex;
    align-items: center;
}

.navbar-nav > .nav-item {
    margin-left: 10px;
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
  background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
  border-radius: 10px;
  background: rgba(240, 240, 240, 0.3);
}

form h1 {
  color: snow;
  font-size: 24px;
  margin-bottom: 20px;
}

form .form-group label {
  color: snow;
  font-weight: 600;
}

form .form-group input {
  border-radius: 5px;
}

form .form-group input[type="email"],
form .form-group input[type="password"] {
  border: 1px solid #ccc;
  padding: 8px 12px;
  width: 100%;
  transition: border-color 0.2s ease;
}

form .form-group input[type="email"]:focus,
form .form-group input[type="password"]:focus {
  border-color: #007bff;
}

form .form-group small {
  color: #888;
}

form .form-group .btn {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 20px;
  padding: 10px 20px;
  font-weight: 600;
  transition: background-color 0.2s ease;
}

form .form-group .btn:hover {
  background-color: #0056b3;
  cursor: pointer;
}

form .form-group .text-warning {
  color: #ff6600;
}
   </style>


    <title>Crud Application</title>
  </head>
  <body>

  <video id="video-container" class="video-js vjs-default-skin" autoplay muted loop>
      <source src="images/2.mp4" type="video/mp4">
    </video>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="mx-7 align-items-center justify-content-center">
        <a class="navbar-brand text-white custom-font-size">Crud Application</a>
    </div>
    <div class="ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="text-white mr-3">Welcome<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="text-white mr-3"><?php echo $_SESSION['user']?></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="Login.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>

</nav> 
  



  <div class="container">
    <form action="" method="POST">
        <h1 class="text-center">Fill Up Your Credentials</h1>
        <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" name="username" placeholder="Enter Username" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Email" autocomplete="off">
            <small id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputMobile1">Mobile Number</label>
            <input type="number" class="form-control" id="exampleInputMobile1" aria-describedby="mobileHelp" name="mobile" placeholder="Enter Mobile Number" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password">
        </div>
        
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-outline-primary btn-lg btn-block" value="Insert To Database">
        </div>

        <div class="form-group">
            <a class="btn btn-outline-primary btn-lg btn-block" href="Cruddisplay.php">View Database</a>
        </div>
        
        
    </form>
</div>

 


        
</div>

   
  </body>
</html>