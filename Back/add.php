<?php
if (!empty($_POST['formPName']) && !empty($_POST['lastPlaceC']) && !empty($_POST['dissapearanceDate']) && !empty($_POST['lastPlaceN']) && !empty($_POST['formSpecies']) && !empty($_POST['formPhone']) && !empty($_POST['formEmail']) && !empty($_POST['formTerms'])) {
    $uname = $_POST['formPName'];
    $image = $_FILES['formPImage']['name'][0];
    $lastPlace = $_POST['lastPlaceC'] . " " . $_POST['lastPlaceN'];
    $breed = $_POST['formSpecies'];
    $marks = $_POST['formMarks'];
    $collar = $_POST['formCollar'];
    $reward = $_POST['formReward'];
    $phone = $_POST['formPhone'];
    $email = $_POST['formEmail'];
    $dissapear = $_POST['dissapearanceDate'];
    $lastSeen = $_POST['lastSeen'];
    $details = $_POST['moreDetails'];
    $owner = $_POST['owner'];


    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
    $register_ad = "INSERT INTO ads (`name`,breed,disappearance_date,marks,collar,last_seen_place,picture,details,owner,phone,mail,reward) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";

    $stmt = $conn->prepare($register_ad);
    $stmt->bind_param("sssssssssssi", $uname, $breed, $dissapear, $marks, $collar, $lastPlace, $image, $details, $owner, $phone, $email, $reward);
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
}
mysqli_close($conn);
?>
