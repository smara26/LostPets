<?php

if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
    $uname = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    if (!filter_var($uname, FILTER_VALIDATE_EMAIL) || strlen($pass) < 6) {
        echo "<script>alert('Username or password is invalid!')</script>";
        echo "<script>location.href='../Front/login/login.html'</script>";
    } else {

        session_start();
        if (isset($_SESSION['uname'])) {
            $conn = mysqli_connect("localhost", "root", "", "lost_pets");
            $name = "SELECT lastName,firstName from users WHERE email=? AND password=?";

            $stmt2 = $conn->prepare($name);
            $stmt2->bind_param("ss", $uname, $pass);
            $stmt2->execute();
            $stmt2->bind_result($lastName, $firstName);
            $stmt2->store_result();

            if ($stmt2->fetch()) {
//                //initialization session
                $_SESSION['uname'] = $uname;
//                header("location:welcome.php");
                echo "<p>Welcome, " . $firstName . " " . $lastName . " !</p>";
                echo "<a href='../Front/home/home.html'><input type='button' value='Log out' name='logout'></a>";
            } else {
                echo "<script>alert('Username or password is invalid!')</script>";
                echo "<script>location.href='../Front/login/login.html'</script>";
            }
            mysqli_close($conn);
        }
    }
}