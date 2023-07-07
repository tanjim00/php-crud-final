<?php
$conn = mysqli_connect("localhost", "root", "", "userdatas"); //new database connection

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM `Userinfos` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row !== null) {
        $name = $row['username'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
    } else {
        echo "No data found for the given ID";
    }

    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        $sql = "UPDATE `Userinfos` SET username='$user', email='$email', mobile='$mobile', password='$password' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header('location:Cruddisplay.php');
            echo "Data updated successfully";
        } else {
            echo "Data not updated";
        }
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

      form {
  padding: 40px;
  background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form h1 {
  color: #333;
  font-size: 24px;
  margin-bottom: 20px;
}

form .form-group label {
  color: #555;
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


    <title>Update Information</title>
  </head>
  <body>



  <div class="container">
    <form action="" method="POST">
        <h1 class="text-center">Update Your Credentials</h1>
        <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" name="username" placeholder="Enter Username" autocomplete="off" value=<?php echo $name;?>>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Email" autocomplete="off" value=<?php echo $email;?>>
            <small id="emailHelp" class="form-text text-white-50">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputMobile1">Mobile Number</label>
            <input type="number" class="form-control" id="exampleInputMobile1" aria-describedby="mobileHelp" name="mobile" placeholder="Enter Mobile Number" autocomplete="off" value=<?php echo $mobile;?>>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" value=<?php echo $password;?>>
        </div>
        
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-outline-primary btn-lg btn-block" value="Update">
        </div>
        
    </form>
</div>

 


        
</div>

   
  </body>
</html>