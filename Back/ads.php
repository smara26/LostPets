<?php


class ads
{
    function adsNumber()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
        $allAds = "SELECT count(*) from ads";
        $stmt = $conn->prepare($allAds);

        $stmt->execute();
        $stmt->bind_result($number);
        $stmt->store_result();
        if ($stmt->fetch()) {
            return $number;
        }
    }
}