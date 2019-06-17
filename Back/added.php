<?php
session_start();

if (!empty($_POST['formPName'])  && !empty($_POST['dissapearanceDate']) && !empty($_POST['formSpecies']) && !empty($_POST['formPhone'])  && !empty($_POST['formTerms'])) {
    $uname = $_POST['formPName'];
    $image = $_FILES['formPImage']['name'][0];
    $breed = $_POST['formSpecies'];
    $marks = $_POST['formMarks'];
    $collar = $_POST['formCollar'];
    $reward = $_POST['formReward'];
    $phone = $_POST['formPhone'];
    if (strlen($phone)!=10){
        echo "<script>alert('Invalid phone!')</script>";
        echo "<script>location.href='../add.php'</script>";
    }
    $email = $_SESSION['uname'];
    $dissapear = $_POST['dissapearanceDate'];
    $lastSeen = $_POST['lastSeen'];
    $lastPlace=$_POST['lat'] . " ".$_POST['long'];
    $details = $_POST['moreDetails'];
    $current_date=date("Y-m-d");

    if($current_date<$dissapear){
        echo "<script>alert('Invalid date!')</script>";
        echo "<script>location.href='../add.php'</script>";
    }
    $username=$_SESSION['uname'];
    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
    $check_admin="SELECT firstName,lastName from users where email=?";
    $stmt = $conn->prepare($check_admin);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($last, $first);
    $stmt->store_result();
if ($stmt->fetch()) {
    $owner=$last ." ". $first;}
    $register_ad = "INSERT INTO ads (`name`,breed,disappearance_date,marks,collar,last_seen_place,picture,details,owner,phone,mail,reward,last_modify_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";

    echo 'da';
    $stmt = $conn->prepare($register_ad);
    $stmt->bind_param("sssssssssssis", $uname, $breed, $dissapear, $marks, $collar, $lastPlace, $image, $details, $owner, $phone, $email, $reward,$lastSeen);
    $stmt->execute();


    $uploads_dir = "../Front/images";
    foreach ($_FILES["formPImage"]["error"] as $key => $value) {
        if ($value == UPLOAD_ERR_INI_SIZE) {
            echo "Uploaded file is too big.";
            die;
        }
        if ($value == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["formPImage"]["tmp_name"][$key];
            $name = basename($_FILES["formPImage"]["name"][$key]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
        }
        else {
            echo "File not uploaded. Erorr";
        }
    }

    header("Location:../all-ads.php");
    mysqli_close($conn);
}
?>
