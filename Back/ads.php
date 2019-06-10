<?php


class ads
{
    function adsNumber()
    {
        $mysqli = mysqli_connect('localhost', 'root', '', 'lost_pets');
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        if ($result = $mysqli->query("SELECT id FROM ads")) {
            $row_cnt = $result->num_rows;
            $result->close();
        }
        $mysqli->close();
        return $row_cnt;
    }
    function adsNumberP($email)
    {
        $mysqli = mysqli_connect('localhost', 'root', '', 'lost_pets');
        $name = "SELECT count(*) from ads WHERE mail=?";

        $stmt = $mysqli->prepare($name);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($number);
        $stmt->store_result();

        if ($stmt->fetch()) {
//                //initialization session
            echo $number;
        }
    }
}