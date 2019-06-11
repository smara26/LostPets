<?php



if (!empty($_POST['registerFName']) && !empty($_POST['registerLName']) && !empty($_POST['registerEmail']) && !empty($_POST['registerPassword']) && !empty($_POST['registerRepeatPassword']) &&  !empty($_POST['registerTerms'])) {
    $uname = $_POST['registerEmail'];

    if (!filter_var($uname, FILTER_VALIDATE_EMAIL) || ($_POST['registerPassword'] !== $_POST['registerRepeatPassword'])) {
        echo "<script>alert('Username or password is invalid!')</script>";
        echo "<script>location.href='../register.php'</script>";

    }
    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

    $user_check_email = "SELECT count(email) FROM users WHERE email=?";

    $stmt2 = $conn->prepare($user_check_email);
    $stmt2->bind_param("s", $uname);
    $stmt2->execute();
    $stmt2->bind_result($email);
    $stmt2->store_result();


    if($stmt2->fetch() && $email){
        echo "<p><b>" . $uname . "</b>, is already exist! </p>";
    }else
    {
        $fName=$_POST['registerFName'];
        $lName=$_POST['registerLName'];
        $pass=$_POST['registerPassword'];
        $gender=$_POST['registerGender'];
        $age=$_POST['registerAge'];

        $user_register = "INSERT INTO users (email, password, firstName,lastName,gender,age) VALUES (?,?,?,?,?,?);";

        $stmt2 = $conn->prepare($user_register);
        $stmt2->bind_param("sssssi", $uname,$pass,$fName,$lName,$gender,$age);
        $stmt2->execute();
        echo "<script>location.href='../login.php'</script>";

    }

}
mysqli_close($conn);
?>