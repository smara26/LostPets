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

    if (strlen($phone) != 10) {
        echo "<script>alert('Invalid phone!')</script>";
        echo "<script>location.href='../add.php'</script>";
    }
    $email = $_SESSION['uname'];
    $dissapear = $_POST['dissapearanceDate'];
    $lastSeen = $_POST['lastSeen'];
    $initialLat = $_POST['initialLat'];
    $initialLong = $_POST['initialLong'];
    $initialCoordinates = $_POST['initialLat'] . " " . $_POST['initialLong'];
    $lastPlace = $_POST['lat'] . " " . $_POST['long'];
    $details = $_POST['moreDetails'];
    $current_date = date("Y-m-d");

    if ($current_date < $dissapear || $lastSeen>$current_date ) {
        echo "<script>alert('Dissapearance date or last seen date is invalid!')</script>";
        echo "<script>location.href='../add.php'</script>";
    }

    else {
    $username = $_SESSION['uname'];
    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
    $check_admin = "SELECT firstName,lastName from users where email=?";
    $stmt = $conn->prepare($check_admin);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($last, $first);

    $stmt->store_result();
    if ($stmt->fetch()) {
        $owner = $last . " " . $first;
    }
    $register_ad = "INSERT INTO ads (`name`,breed,disappearance_date,marks,collar,last_seen_place,picture,details,owner,phone,mail,reward,last_modify_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $stmt = $conn->prepare($register_ad);
    
    if($_POST['changedLocation'] == 0) {
        $stmt->bind_param("sssssssssssis", $uname, $breed, $dissapear, $marks, $collar, $initialCoordinates, $image, $details, $owner, $phone, $email, $reward, $lastSeen);
    }else {
        $stmt->bind_param("sssssssssssis", $uname, $breed, $dissapear, $marks, $collar, $lastPlace, $image, $details, $owner, $phone, $email, $reward, $lastSeen);
    }
    $stmt->execute();

    // Get last notification id
    $statement = $conn->prepare("SELECT id from ads ORDER BY id desc LIMIT 1");
    $statement->execute();
    $statement->bind_result($last_ad_id);

    $statement->store_result();
    $statement->fetch();

    // Get locations and emails for users that are nearby locations.
    $emails = array();

    $location_stmt = "SELECT * from users where email NOT LIKE '$email'";
    if($result = mysqli_query($conn, $location_stmt)) {
        while ($row = mysqli_fetch_array($result)) {

            if($row[7] != null) {

                $user_lat = explode(" ", $row[7])[0];
                $user_lng = explode(" ", $row[7])[1];

                if($_POST['changedLocation'] == 0) {
                    if( $initialLat <= $user_lat + 0.045 && $initialLat >= $user_lat - 0.045
                        && $initialLong <= $user_lng + 0.045 && $initialLong >=  $user_lng - 0.045) {
                            array_push($emails, $row[1]);
                    }
                } else {
                    $lat = $_POST['lat'];
                    $lng = $_POST['long'];
                    if( $lat <= $user_lat + 0.0045 && $lat >= $user_lat - 0.0045
                        && $long <= $user_lng + 0.0045 && $long >=  $user_lng - 0.0045) {
                            array_push($emails, $row[1]);
                    }
                }
            }
        }
    }


    // Check if a notification already exists

    // Adding new notification
    foreach( $emails as $em) {
        $register_notification = "INSERT INTO notifications (user_email,pet_name,ad_id,seen) VALUES (?,?,?,0)";
        $stmt = $conn->prepare($register_notification);
        $stmt->bind_param("ssi", $em, $_POST['formPName'], $last_ad_id);
        $stmt->execute();
    }

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
        } else {
            echo "File not uploaded. Erorr";
        }
    }

    header("Location:../all-ads.php");
    mysqli_close($conn);

}}
