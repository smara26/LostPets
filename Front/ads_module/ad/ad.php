<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LostPets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="ad.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
<header class="header-wrap">
    <nav class="topnav">
        <a href="../../../Back/logout.php" class="active">Log out</a>
        <div class="dropdown">
            <button class="dropbtn"><?=$_SESSION['uname']?>
                <i class="down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../ad/ad.php">My ad</a>
                <a href="../../statistics/statistics.php">Statistics</a>
                <a href="../add/add.php">New ad</a>

            </div>
        </div>
        <a href="../../page/page.php">Announcements</a>
        <a href="#" class="notification">Notif</a>
        <form action="http://google.com" method="GET">
            <input type="search" name="searchIn" id="searchIn" placeholder="Search">
        </form>
        <div class="content-wrap">
            <a href="../../home/home.html">
                <img src="../../images/logo.jpg" alt="logo" class="logo">
            </a>
        </div>
    </nav>
</header>
<div class="lost-pet">
    <div class="principle-details">
        <img src="../../images/charles-2.jpg" alt="Charles-The pug">
        <div class="first-details">

            <h2>Details about the lost pet:</h2>

            <div class="name">
                <p>Name:</p>
                <div class="name-pet">Charles</div>
            </div>

            <div class="breed">
                <p>Breed:</p>
                <div class="breed-pet">Pug</div>
            </div>

            <div class="date">
                <p>Date of Disparition:</p>
                <div class="date-disp">15/03/2019</div>
            </div>

            <h2>Contact:</h2>

            <div class="owner">
                <p>Owner:</p>
                <div class="owner-name">Sam Mendes</div>
            </div>

            <div class="phone">
                <p>Phone:</p>
                <div class="phone-owner">0749 032 155</div>
            </div>

            <div class="mail">
                <p>Mail:</p>
                <div class="mail-owner">sam.mendes@gmail.com</div>
            </div>
        </div>
    </div>

    <div class="description">
        <h2>More details:</h2>
        My poor pug responds at the name 'Charles'. He has just 5 months,
        and a blue dog-collar. Please, help me find him and, of course, the person that will
        find him will receive a reward.

        <div class="reward">
            <p>Reward:</p>
            <div class="reward-owner">200$</div>
        </div>
    </div>

    <div class="map">
        <img id="map" src="../../images/map.png" alt="The Map">
    </div>

</div>
<a class="btn btn-ghost" href="../edit/edit.php">Edit Ad</a>
</body>
</html>