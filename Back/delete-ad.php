<?php
session_start();
$uid=$_SESSION['uname'];
$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

$url = explode("id=",$_SERVER['REQUEST_URI']);
$id= explode("&",$url[1]);



$id=($id[0]);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM ads WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location:all-ads.php");
