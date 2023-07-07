<?php
$conn = mysqli_connect("localhost", "root", "", "userdatas");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token)
{

require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

$mail = new PHPMailer(true);

try {
  //Server settings
                    
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'prithirajpritham123@gmail.com';                     //SMTP username
  $mail->Password   = 'dtqcdsmokreatgak';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('prithirajpritham123@gmail.com', 'Email Reset Link');
  $mail->addAddress($email);     //Add a recipient
  

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Password Reset Link';
  $mail->Body    = "We have got a request from you to reset your password! <br> 
  Here is the reset password link: <br>
  <a href='http://localhost/Reg/updatepass.php?email=$email&reset_token=$reset_token'>
  Reset Password
  </a>";
  

  $mail->send();
  return true;
  } 
  catch (Exception $e) {
    return false;
  }

}





if (isset($_POST['send-reset-link'])) {
  $email = $_POST['email'];
  $query = "SELECT * FROM `Userinfos` WHERE `email`='{$_POST['email']}'";
  $result = mysqli_query($conn, $query);

  if ($result) {
      if (mysqli_num_rows($result) == 1) {
          $reset_token = bin2hex(random_bytes(16));
          date_default_timezone_set('Asia/Kolkata');
          $date = date("Y-m-d");
          $expiration_date = date("Y-m-d H:i:s", strtotime($date . ' +1 day')); // Update expiration date
          
          $query = "UPDATE `Userinfos` SET `resettoken`='$reset_token', `resettokenexpire`='$expiration_date' WHERE `email`='{$_POST['email']}'";
          if (mysqli_query($conn, $query) && sendMail($_POST['email'], $reset_token)) {
              echo '<script>
                  alert("Password Reset Link Sent To Email");
                  window.location.href = "forgotpass.php";
              </script>';
          }
      } else {
          echo '<script>
              alert("Email Not Found");
              window.location.href = "forgotpass.php";
          </script>';
      }
  }
}
    

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Reset Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
<style>
 .popup-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.popup {
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.popup h2 {
  margin-bottom: 20px;
}

.popup h2 span {
  font-size: 18px;
}

.popup button {
  border: none;
  background: none;
  cursor: pointer;
  font-size: 18px;
  color: #555;
}

.popup button:hover {
  color: #333;
}

.popup input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.popup button.reset-btn {
  background-color: #FFC107;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 10px;
}

.popup button.reset-btn:hover {
  background-color: #FFA000;
}

</style>

</head>
  <body>
  <div class="popup-container" id="forgot-popup"> 
<div class="forgot popup">
<form method="POST" action="">
<h2>
<span>RESET PASSWORD</span>
</h2>
<input type="text" placeholder="E-mail" name="email">
<button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
<button type="button" class="reset-btn" onclick="window.location.href='Login.php'">Back To Login</button>
</form>
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>