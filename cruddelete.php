<?php
$conn = mysqli_connect("localhost", "root", "", "userdatas"); 
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
   
    $sql = "DELETE FROM `Userinfos` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:Cruddisplay.php');
        echo "Data deleted successfully";
    } else {
        echo "Data not deleted";
    }
}

?>