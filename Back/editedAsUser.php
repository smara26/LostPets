<?php


$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');


if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $_POST['id'];
$lastPlace=$_POST['lat'] . " ".$_POST['long'];

$edit_ad = "select last_seen_place,mail,name from ads where id=?";
$stmt = $conn->prepare($edit_ad);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($last_seen_place, $email, $pet_name);
$stmt->fetch();
$stmt->close();

$sql = "UPDATE ads SET last_seen_place='" . $lastPlace . "' WHERE id=?";

            $query = $conn->prepare($sql);
            $query->bind_param('s', $id);
            $query->execute();

            $query->close();


$seenPositive = 1;
$sql2 = "UPDATE notifications SET seen='" . $seenPositive . "' WHERE ad_id=?";
$query = $conn->prepare($sql2);
$query->bind_param('s', $id);
$query->execute();

$query->close();

$register_notification = "INSERT INTO notifications (user_email,pet_name,ad_id,seen) VALUES (?,?,?,1)";
$stmt = $conn->prepare($register_notification);
$stmt->bind_param("ssi", $email, $pet_name, $id);
$stmt->execute();
$stmt->close();




            $url = '../ad.php?id=' . $id;

            header("Location:$url");

?>