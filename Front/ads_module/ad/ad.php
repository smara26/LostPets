<?php
session_start();
$uid=$_SESSION['uname'];
$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

$url = explode("id=",$_SERVER['REQUEST_URI']);
$id= explode("&",$url[1]);



$id=($id[0]);

$one_ad = "select name,breed,disappearance_date,marks,collar,last_seen_place,last_modify_date,picture,details,owner,phone,mail,reward,`found` from ads where id=?";
$stmt = $conn->prepare($one_ad );
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($name,$breed,$disappearance_date,$marks,$collar,$last_seen_place,$last_modify_date,$picture,$details,$owner,$phone,$mail,$reward,$found);
$stmt->store_result();

if ($stmt->fetch()) {
    $image='Front/images/'.$picture;
}
$urledit='../edit.php?id='.$id;
$urldel='../delete.php?id='.$id;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LostPets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Front/ads_module/ad/ad.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
<header class="header-wrap">
    <nav class="topnav">
        <a href="Back/logout.php" class="active">Log out</a>
        <div class="dropdown">
            <button class="dropbtn"><?=$_SESSION['uname']?>
                <i class="down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../personal-ads.php">My personal ads</a>
                <a href="../statistics.php">Statistics</a>
                <a href="../add.php">New ad</a>

            </div>
        </div>
        <a href="../all-ads.php">Announcements</a>
        <a href="#" class="notification">Notif</a>
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
<div class="lost-pet">
    <div class="principle-details">
        <img src="<?=$image?>" alt="Charles-The pug">
        <div class="first-details">

            <h2>Details about the lost pet:</h2>

            <div class="name">
                <p>Name:</p>
                <div class="name-pet"><?=$name;?></div>
            </div>

            <div class="breed">
                <p>Breed:</p>
                <div class="breed-pet"><?=$breed;?></div>
            </div>

            <div class="date">
                <p>Disappearance date:</p>
                <div class="date-disp"><?=$disappearance_date;?></div>
            </div>

            <h2>Contact:</h2>

            <div class="owner">
                <p>Owner:</p>
                <div class="owner-name"><?=$owner?></div>
            </div>

            <div class="phone">
                <p>Phone:</p>
                <div class="phone-owner"><?=$phone?></div>
            </div>

            <div class="mail">
                <p>Mail:</p>
                <div class="mail-owner"><?=$mail?></div>
            </div>
        </div>
    </div>

    <div class="description">
        <h2>More details:</h2>
        <?=$details?>

        <div class="reward">
            <p>Reward:</p>
            <div class="reward-owner"><?=$reward;?></div>
        </div>
    </div>

    <div class="map">
        <img id="map" src="Front/images/map.png" alt="The Map">
    </div>

</div>
<a class="btn btn-ghost" href="<?=$urledit;?>">Edit Ad</a>

<?php
if($mail==$uid) {
    ?>
    <form action="delete-ad.php">
        <a class="btn btn-ghost" href="<?=$urldel;?>">Delete my ad</a>
        
    </form>


    <?php
}?>

</body>
</html>