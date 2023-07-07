<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Password</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #ffffff;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      background-color: #eaf2ff;
      background-image: linear-gradient(to bottom, #eaf2ff, #c6d8ff);
      border-radius: 10px;
      padding: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h3 {
      margin-top: 0;
      color: #3b5998;
      font-size: 30px;
      font-weight: bold;
      font-family: 'Arial', sans-serif; 
    }

    .form-group {
      margin-bottom: 30px; 
    }

    .form-control {
  width: 100%;
  padding: 15px; /* Increased padding value */
  border: 3px solid #ddd;
  border-radius: 20px;
  background-color: #f9f9f9;
  transition: border-color 0.3s ease, background-color 0.3s ease;
}

    .form-control:focus {
      border-color: #aaa; 
      background-color: #fff; 
    }

    .reset-btn {
      background-color: #FFC107;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: auto;
    }

    .reset-btn:hover {
      background-color: #FFA000;
    }
  </style>
</head>
<body>

<div class="container">
  <?php
  $conn = mysqli_connect("localhost", "root", "", "userdatas");

  if (isset($_GET['email']) && isset($_GET['reset_token'])) {
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d");
      $expiration_date = date("Y-m-d H:i:s", strtotime($date . ' +1 day'));
      $query = "SELECT * FROM `Userinfos` WHERE `email`='{$_GET['email']}' AND `resettoken`='{$_GET['reset_token']}' AND `resettokenexpire`='$expiration_date'";
      $result = mysqli_query($conn, $query);

      if ($result) {
          if (mysqli_num_rows($result) == 1) {
              echo '<form method="POST">
              <div class="form-group">
                    <h3>Create New Password</h3>
                      <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
                    </div>
                    <button type="submit" class="reset-btn mx-5" name="update_password">Update Password</button>
                  <input type="hidden" name="email" value="' . $_GET['email'] . '">
                    </form>';
          } else {
              echo '<script>
                  alert("Invalid or Expired Link!");
                  window.location.href = "forgotpass.php";
              </script>';
          }
      } else {
          echo '<script>
              alert("Server Down!");
              window.location.href = "forgotpass.php";
          </script>';
      }
  }
  ?>

<?php
if (isset($_POST['update_password'])) {
  $email = $_POST['email'];
  $newPassword = $_POST['new_password'];

  $conn = mysqli_connect("localhost", "root", "", "userdatas");

  $query = "SELECT * FROM `Userinfos` WHERE `email`='$email'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $password = $row['password'];

      if ($newPassword === $password) {
        echo '<script>
          alert("You entered the same password. Please choose a different one.");
          window.location.href = "forgotpass.php";
        </script>';
      } else {
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $update = "UPDATE `Userinfos` SET `password`='$newPassword', `resettoken`=NULL, `resettokenexpire`=NULL WHERE `email`='$email'";

        if (mysqli_query($conn, $update)) {
          echo '<script>
            alert("Password Updated Successfully");
            window.location.href = "login.php";
          </script>';
        } else {
          echo '<script>
            alert("Server Down!");
            window.location.href = "forgotpass.php";
          </script>';
        }
      }
    } else {
      echo '<script>
        alert("Invalid or Expired Link!");
        window.location.href = "forgotpass.php";
      </script>';
    }
  } else {
    echo '<script>
      alert("Server Down!");
      window.location.href = "forgotpass.php";
    </script>';
  }
}
?>
</div>
  
</body>
</html>

