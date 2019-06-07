<?php
if (!empty($_POST['formPName']) && !empty($_POST['lastPlaceC']) && !empty($_POST['dissapearanceDate']) && !empty($_POST['lastPlaceN']) && !empty($_POST['formSpecies']) && !empty($_POST['formPhone']) && !empty($_POST['formEmail']) && !empty($_POST['formTerms'])) {
    $uname = $_POST['formPName'];
    $image=$_FILES['file']['name'];
    $lastPlace=$_POST['lastPlaceC'] . ", " . $_POST['lastPlaceN'];
    $breed=$_POST['formSpecies'];
    $marks=$_POST['formMarks'];
    $collar=$_POST['formCollar'];
    $reward=$_POST['formReward'];
    $phone = $_POST['formPhone'];
    $email = $_POST['formEmail'];
    $dissapear = $_POST['dissapearanceDate'];
    $lastSeen = $_POST['lastSeen'];
    $details = $_POST['moreDetails'];
    $owner=$_POST['owner'];


    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
    $register_ad = "INSERT INTO ads (`name`,breed,disappearance_date,marks,collar,last_seen_place,picture,details,owner,phone,mail,reward) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";

    $stmt2 = $conn->prepare($register_ad);
    $stmt2->bind_param("sssssssssssi", $uname, $breed,$dissapear, $marks, $collar, $lastPlace, $image,$details,$owner,$phone,$email,$reward);
    $stmt2->execute();



}
mysqli_close($conn);
?>
