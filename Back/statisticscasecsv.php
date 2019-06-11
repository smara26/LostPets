<?php

session_start();



$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$first_day = date("Y-m-01");
$last_day = date("Y-m-t", strtotime($first_day));
$sql = "SELECT * FROM ads where last_modify_date between '" . $first_day . "' and '" . $last_day . "'";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $namearr[] = $row['name'];
    $casearr[]=$row['details'];

}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="sample.csv"');
$fp = fopen('php://output', 'wb');
$data[0] = $namearr;
$data[1] = $casearr;

foreach ( $data as $line ) {
//    $val = implode(",", $line);
    fputcsv($fp, $line);
}
fclose($fp);