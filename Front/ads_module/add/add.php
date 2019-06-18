<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');
$mail = $_SESSION['uname'];

$all_notifications = "SELECT * from notifications WHERE user_email='$mail'";
if($notifs = mysqli_query($conn, $all_notifications)) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Front/header.css"/>
    <link rel="stylesheet" type="text/css" href="Front/ads_module/add/add.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin=""></script>
    <title>Registration my ad</title>
    <link rel="icon" href="../../images/logo.jpg" style="width:5px;">
</head>

<body>
<header class="header-wrap">
    <nav class="topnav">
        <a href="../logout.php" class="active">Log out</a>
        <div class="dropdown">
            <button class="dropbtn"><?= $_SESSION['uname']; ?>
                <i class="down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../personal-ads.php">My personal ads</a>
                <a href="../statistics.php">Statistics</a>
                <a href="../add.php">New ad</a>
            </div>
        </div>
        <a href="../all-ads.php">Announcements</a>
        <div class="dropdown-notification">
            <button class="notification">
                <span></span>
                <span class="badge">3</span>
            </button>
            <div class="dropdown-content-notification">
            <?php  while ($row = mysqli_fetch_array($notifs)) { ?>
                <a href="#"><?= $row['pet_name'] ?></a>
            <?php }
                }
            ?>
            </div>
        </div>
        <form action="http://google.com" method="GET">
            <input type="search" name="searchIn" id="searchIn" placeholder="Search">
        </form>
        <div class="content-wrap">
            <a href="../home.php">
                <img src="Front/images/logo.jpg" alt="logo" class="logo">
            </a>
        </div>
    </nav>
</header>
<div class="formMessage">
    <h3>Let us help you find your animal! Give us some details!</h3>
</div>
<form id="form-wrap" action="Back/added.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="formPName">Pet's Name*:</label>
        <br>
        <input type="text" required id="formPName" name="formPName"/>
    </div>
    <br>
    <div>
        <label for="file">Choose a photo of your buddy:</label>
        <br>
        <input type="file" id="file" name="formPImage[]"/>
    </div>
    <br>
    <div>
        <span>Place where you saw him/her last time*:</span>

        <br>
        <div id="mapdiv"></div>
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script>
            let position = [51.505, -0.09];
           map = L.map('mapdiv').setView(position, 13);

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic21hcmEwNyIsImEiOiJjandveDV4N3AwYTBnNDlxaWFuNWgyaTlnIn0.am9BJtDWhxI0ScNEotpthw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1Ijoic21hcmEwNyIsImEiOiJjandveDV4N3AwYTBnNDlxaWFuNWgyaTlnIn0.am9BJtDWhxI0ScNEotpthw'
            }).addTo(map);

            var marker = L.marker(position).addTo(map);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(coordinates => {
                    const coords = coordinates.coords;
                    position = [coords.latitude, coords.longitude];
                    document.getElementById("changedLocation").value = 0;
                    document.getElementById("initialLat").value = coords.latitude;
                    document.getElementById("initialLong").value = coords.longitude;
                    map.setView(position, 13);
                    marker.setLatLng(position);

                });

            }

            map.on('click', event => {
                marker.setLatLng(event.latlng);
                const latitude = JSON.parse(JSON.stringify(event.latlng))['lat'];
                const longitude = JSON.parse(JSON.stringify(event.latlng))['lng'];
                document.getElementById("changedLocation").value = 1;
                copyToFakeInputs(latitude, longitude);
            });

            function copyToFakeInputs(latitude, longitude) {
                document.getElementById("lat").value=latitude;
                document.getElementById("long").value=longitude;
            }

        </script>
    </div>
    <br>
    <div>
        <input type="hidden" id="long" name="long">
        <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="changedLocation" name="changedLocation">

        <input type="hidden" id="initialLong" name="initialLong">
        <input type="hidden" id="initialLat" name="initialLat">
        <label for="formSpecies">Species*:</label>
        <br>
        <input type="text" required id="formSpecies" name="formSpecies"/>
    </div>
    <br>
    <div>
        <label for="formMarks">Personal marks:</label>
        <br>
        <input type="text" id="formMarks" name="formMarks"/>
    </div>
    <br>
    <div>
        <label for="formCollar">Collar's details:</label>
        <br>
        <input type="text" id="formCollar" name="formCollar"/>
    </div>
    <br>
    <div>
        <label for="formReward">Reward:</label>
        <br>
        <input type="number" id="formReward" name="formReward"/>€
    </div>
    <br>
    <div>
        <label for="formPhone">Phone*:</label>
        <br>
        <input type="number" id="formPhone" name="formPhone" required/>
    </div>
    <br>
    <div>
        <label for="dissapearanceDate">Disappearance date*:</label>
        <br>
        <input type="date" required id="dissapearanceDate" name="dissapearanceDate"/>
    </div>
    <br>
    <div>
        <label for="lastSeen">Last date seen*:</label>
        <br>
        <input type="date" required id="lastSeen" name="lastSeen"/>
    </div>
    <br>
    <div>
        <label for="moreDetails">More Details:</label>
        <br>
        <input type="text" id="moreDetails" name="moreDetails"/>
    </div>
    <br>
    <div id="terms">
        <input type="checkbox" value="terms" required id="formTerms" name="formTerms"/>
        <label for="formTerms">I have read and accepted the Terms & Conditions</label>
    </div>
    <button class="button" type="submit">Add Missing Pet</button>
    <!--    <a class="button" href="../page/page.html">Add Missing Pet</a>-->
</form>
</body>

</html>