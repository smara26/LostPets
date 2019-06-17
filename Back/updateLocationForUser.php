<?php 

session_start();
$lat = $_REQUEST['lat'];
$long = $_REQUEST['long'];

$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
$session_email = $_SESSION['uname'];

$sql = "UPDATE users SET location='".$lat . " " . $long ."' WHERE email=?";

$query = $conn->prepare($sql);
$query->bind_param('s', $session_email);
$query->execute();

?>