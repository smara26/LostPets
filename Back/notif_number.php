<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
    $email = $_SESSION['uname'];

    $number = 0;
    $sql = "SELECT * FROM notifications WHERE user_email LIKE '$email'";

    if($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
            if($row[4] == 1) {
                $number = $number + 1;
            }
        }
    }  


    echo $number;
?>
