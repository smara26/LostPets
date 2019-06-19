<?php
session_start();
$admin = $_SESSION['uname'];
$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

$url = explode("id=", $_SERVER['REQUEST_URI']);
$id = explode("&", $url[1]);

$id = ($id[0]);

$edit_ad = "select `name`,breed,disappearance_date,marks,collar,last_seen_place,last_modify_date,picture,details,owner,phone,mail,reward,`found` from ads where id=?";
$stmt = $conn->prepare($edit_ad);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($name, $breed, $disappearance_date, $marks, $collar, $last_seen_place, $last_modify_date, $picture, $details, $owner, $phone, $mail, $reward, $found);
$stmt->store_result();

if ($stmt->fetch()) {
    $image = 'Front/images/' . $picture;
}
$latlong=explode(" ",$last_seen_place);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit your ad</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Front/header.css"/>
    <link rel="stylesheet" type="text/css" href="Front/ads_module/edit/edit.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
    crossorigin=""></script>
    <script src="Front/numberNotif.js"></script>
    <script src="Front/updateBD.js"></script>
    <link rel="icon" href="../../images/logo.jpg" style="width:5px;">
</head>

<body>
<header class="header-wrap">
    <nav class="topnav">
        <a href="Back/logout.php" class="active">Log out</a>
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

<?php
if ($admin == $mail) {
    ?>

    <form id="form-wrap" action="Back/edited.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="id">Id:</label>
            <br>
            <input type="text" required id="id" name="id" readonly value="<?= $id; ?>"/>
        </div>
        <div>
            <label for="formPName">Pet's Name*:</label>
            <br>
            <input type="text" required id="formPName" name="formPName" value="<?= $name; ?>"/>
        </div>
        <br>
        <div>
            <label for="file">Choose a photo of your buddy:*</label>
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
                let position = [<?php echo $latlong[0]; ?>, <?php echo $latlong[1]; ?>];

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
                        copyToFakeInputs(coords.latitude, coords.longitude);
                        map.setView(position, 13);
                        marker.setLatLng(position);

                    });

                }

                map.on('click', event => {
                    //alert("You clicked the map at " + event.latlng);
                    marker.setLatLng(event.latlng);
                    const latitude = JSON.parse(JSON.stringify(event.latlng))['lat'];
                    const longitude = JSON.parse(JSON.stringify(event.latlng))['lng'];
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
            <label for="formSpecies">Species*:</label>
            <br>
            <input type="text" required id="formSpecies" name="formSpecies" value="<?= $breed; ?>"/>
        </div>
        <br>
        <div>
            <label for="formMarks">Personal marks:</label>
            <br>
            <input type="text" id="formMarks" name="formMarks" value="<?= $marks; ?>"/>
        </div>
        <br>
        <div>
            <label for="formCollar">Collar's details:</label>
            <br>
            <input type="text" id="formCollar" name="formCollar" value="<?= $collar; ?>"/>
        </div>
        <br>
        <div>
            <label for="formReward">Reward:</label>
            <br>
            <input type="number" id="formReward" name="formReward" value="<?= $reward; ?>"/>€
        </div>
        <br>
        <div>
            <label for="formPhone">Phone*:</label>
            <br>
            <input type="number" id="formPhone" name="formPhone" required value="<?= $phone; ?>"/>
        </div>
        <br>
        <div>
            <label for="dissapearanceDate">Disappearance date*:</label>
            <br>
            <input type="hidden" id="long" name="long">
            <input type="hidden" id="lat" name="lat">
            <input type="date" required id="dissapearanceDate" name="dissapearanceDate"
                   value="<?= $disappearance_date; ?>"/>
        </div>
        <br>
        <div>
            <label for="lastSeen">Last date seen*:</label>
            <br>
            <input type="date" required id="lastSeen" name="lastSeen" value="<?= $last_modify_date; ?>"/>
        </div>
        <br>
        <div>
            <label for="moreDetails">More Details:</label>
            <br>
            <input type="text" id="moreDetails" name="moreDetails" value="<?= $details; ?>"/>
        </div>
        <div>
            <label for="found">Found:</label>
            <br>
            <select name="found" required>
                <option value="0" selected>Not found</option>
                <option value="1">Found</option>
            </select>
        </div>
        <br>
        <div id="terms">
            <input type="checkbox" value="terms" required id="formTerms" name="formTerms"/>
            <label for="formTerms">I have read and accepted the Terms & Conditions</label>
        </div>
        <button class="button" type="submit">Edit Your Announce</button>
    </form>
<?php
} else { ?>

<form action="Back/editedAsUser.php" method="POST" enctype="multipart/form-data">
    <div class="lost-pet">
        <div class="principle-details">
            
        <input type="hidden" required id="id" name="id" readonly value="<?= $id; ?>"/>

            <img src="<?= $image ?>" alt="image">
            <div class="first-details">

                <h2>Details about the lost pet:</h2>

                <div class="name">
                    <p>Name:</p>
                    <div class="name-pet"><?= $name; ?></div>
                </div>

                <div class="breed">
                    <p>Breed:</p>
                    <div class="breed-pet"><?= $breed; ?></div>
                </div>

                <div class="date">
                    <p>Disappearance date:</p>
                    <div class="date-disp"><?= $disappearance_date; ?></div>
                </div>

                <h2>Contact:</h2>

                <div class="owner">
                    <p>Owner:</p>
                    <div class="owner-name"><?= $owner ?></div>
                </div>

                <div class="phone">
                    <p>Phone:</p>
                    <div class="phone-owner"><?= $phone ?></div>
                </div>

                <div class="mail">
                    <p>Mail:</p>
                    <div class="mail-owner"><?= $mail ?></div>
                </div>
            </div>
        </div>
        <div class="down">
                <input type="hidden" id="long" name="long">
                       <input type="hidden" id="lat" name="lat">
            <div class="description">
                <h2>More details:</h2>
                <?= $details ?>

                <div class="reward">
                    <p>Reward:</p>
                    <div class="reward-owner"><?= $reward; ?></div>
                </div>
            </div>
            
            <?php 
                $latlong=explode(" ",$last_seen_place);
            ?>

            <div id="mapdiv"></div>
            <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
            <script>
              let position = [<?php echo $latlong[0]; ?>, <?php echo $latlong[1]; ?>];
                
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
                        copyToFakeInputs(coords.latitude, coords.longitude);
                        map.setView(position, 13);
                        marker.setLatLng(position);

                    });

                }

                map.on('click', event => {
                    //alert("You clicked the map at " + event.latlng);
                    marker.setLatLng(event.latlng);
                    const latitude = JSON.parse(JSON.stringify(event.latlng))['lat'];
                    const longitude = JSON.parse(JSON.stringify(event.latlng))['lng'];
                    copyToFakeInputs(latitude, longitude);
                });

                function copyToFakeInputs(latitude, longitude) {
                    document.getElementById("lat").value=latitude;
                    document.getElementById("long").value=longitude;
                }


            </script>
                <button class="button" type="submit">Edit the last place where you see pet</button>

            
        </div>
    </div>
    </form>
<?php } ?>
</body>

</html>