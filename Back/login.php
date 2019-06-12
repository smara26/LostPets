<?php

if (!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])) {
    $uname = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    if (!filter_var($uname, FILTER_VALIDATE_EMAIL) || strlen($pass) < 6) {
        echo "<script>alert('Username or password is invalid!')</script>";
        echo "<script>location.href='../login.php'</script>";
    } else {
        session_start();
            $sql = mysqli_connect("localhost", "root", "", "lost_pets");
            $name = "SELECT id, lastName, firstName from users WHERE email=? AND password=?";

            $stmt = $sql->prepare($name);
            $stmt->bind_param("ss", $uname, $pass);
            $stmt->execute();
            $stmt->bind_result($id, $lastName, $firstName);
            $stmt->store_result();

            if ($stmt->fetch()) {
//                //initialization session
                $_SESSION['uname'] = $uname;
                $_SESSION['uid'] = $id;
                header("Location:../all-ads.php");

            } else {
                echo "<script>alert('Username or password is invalid!')</script>";
                header("Location:../login.php");
            }
            mysqli_close($conn);
        }


}