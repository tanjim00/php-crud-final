<?php
session_start();

  $conn = mysqli_connect("localhost", "root", "", "userdatas"); 
  if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
   
    $sql = "DELETE FROM `Userinfos` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data deleted successfully";
        header('location:Cruddisplay.php');
    } else {
        echo "Data not deleted";
    }
}

?>

<!doctype html>
<html lang="en">

<style>

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
        height: 60vh;
        margin-top:30px;
        justify-content: center;
        align-items: center;
        color: snow;
      }

      .button-container {
  display: flex;
  justify-content: center;
  margin-top: 18px; 
}



</style>
  <head>
    <title>Crud Database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <!-- Video.js CSS -->
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet">
  
  
  
  
  </head>
  <body>

  <video id="video-container" class="video-js vjs-default-skin" autoplay muted loop>
      <source src="images/3.mp4" type="video/mp4">
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



<div class="button-container">
    <a href="Crud.php" class="btn btn-success btn-lg text-light">Add User</a>
  </div>

<div class="container mt-5">

   <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php


  $sql = "SELECT * FROM `Userinfos`";
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
  while ($row = mysqli_fetch_assoc($result)){
$id=$row['id'];
$name=$row['username'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];
echo '<tr>
<th scope="row" class="text-white">' . $id . '</th>
<td class="text-white">' . $name . '</td>
<td class="text-white">' . $email . '</td>
<td class="text-white">' . $mobile . '</td>
<td class="text-white">' . $password . '</td>
<td class="text-white">
<button type="button" class="btn btn-primary">
  <a href="update.php? updateid='.$id.'" style="text-decoration: none; color: white;">Update</a>
</button>

<button type="button" class="btn btn-danger">
  <a href="cruddelete.php? deleteid='.$id.'" style="text-decoration: none; color: white;" class="text-light">Delete</a>
</button>
</tr>';

  }
  
}
?>

<table class="table">
<thead class="thead-light">
</table>
</div> 

<?php

  if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
   
    $sql = "DELETE FROM `crudinfos` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data deleted successfully";
        header('location:Cruddisplay.php');
    } else {
        echo "Data not deleted";
    }
}

?>
    
  </body>
</html>