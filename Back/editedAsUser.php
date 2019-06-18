<?php


$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');


if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $_POST['id'];
$lastPlace=$_POST['lat'] . " ".$_POST['long'];

$edit_ad = "select last_seen_place from ads where id=?";
$stmt = $conn->prepare($edit_ad);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($last_seen_place);
$stmt->fetch();
$stmt->close();

$sql = "UPDATE ads SET last_seen_place='" . $lastPlace . "' WHERE id=?";
            $query = $conn->prepare($sql);
            $query->bind_param('s', $id);
            $query->execute();

            $query->close();
            $url = '../ad.php?id=' . $id;

            header("Location:$url");

?>