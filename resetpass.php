<?php
$conn = mysqli_connect("localhost", "root", "", "userdatas");
if(isset($_POST['send-reset-link']))
{
    $email = $_POST['email'];
    $query = "SELECT * FROM `userinfos` WHERE `email`='$_POST[email]'"; 
    $result = mysqli_query($conn, $query);
    
    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            // Email Found, display the popup window here
            echo '<script>
                alert("Reset password link sent!"); // Replace this with your custom popup code
                </script>';
        }
        else
        {
            echo '<script>
                alert("Invalid Email Entered");
                window.location.href = "forgotpass.php";
                </script>';
        }
    }
    else
    {
        echo '<script>
            alert("Cannot run query");
            window.location.href = "forgotpass.php";
            </script>';
    }
}
?>