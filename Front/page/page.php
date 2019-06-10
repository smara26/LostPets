<?php
session_start();

spl_autoload_register(function ($className) {
    require_once '../../Back/' . $className . '.php';
});
$ads = new ads();
$number = $ads->adsNumber();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="page.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <title>Announcements</title>
</head>

<body>
<header class="header-wrap">
<nav class="topnav">
    <a href="../../Back/logout.php" class="active">Log out</a>
  <div class="dropdown">
    <button class="dropbtn"><?=$_SESSION['uname']?>
      <i class="down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../ads_module/ad/ad.php">My ad</a>
      <a href="../statistics/statistics.php">Statistics</a>
        <a href="../ads_module/add/add.php">New ad</a>

    </div>
  </div>
  <a href="../page/page.php">Announcements</a>
  <a href="#" class="notification">Notif</a>
  <form action="http://google.com" method="GET">
    <input type="search" name="searchIn" id="searchIn" placeholder="Search">
  </form>
  <div class="content-wrap">
    <a href="../home/home.html">
      <img src="../images/logo.jpg" alt="logo" class="logo">
    </a>
  </div>
</nav>

</header>
  <div id="ads">
    <div id="ads-descript">
      <h2 id="title">Announcements</h2>
      <p class="description">Here at petapp we love animals and we are dedicated to helping reunite lost pets with their
        families as quickly as possible. Since our pets are not able to speak for themselves it is very important that
        when they go missing we get the word out as quickly as possible. To help we offer FREE list with all pets lost
        in Romania added by desperate masters. </p>
      <div class="number"><?=$number;?> lost pets</div>
    </div>
    <ul id="manyads">
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">Lost Dog RAM</a></h4>
          </div>
          <div class="list-descript">
            <p>Lost my sweetdog!!!</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Alexandru cel Bun,Iasi</a></p>
          </div>
          <div class="list-date date">
            <p> March 18</p>
          </div>
          <div class="last-date date">
            <p> March 18</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image1.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">Lost Dog RAM</a></h4>
          </div>
          <div class="list-descript">
            <p>Lost my sweetdog!!!</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Alexandru cel Bun,Iasi</a></p>
          </div>
          <div class="list-date date">
            <p> March, 18</p>
          </div>
          <div class="last-date date">
            <p> March, 18</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image3.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">Lost Cat Cherry</a></h4>
          </div>
          <div class="list-descript">
            <p>My mother's cat, Cherry !</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Copou,Iasi</a></p>
          </div>
          <div class="list-date date">
            <p> March 17</p>
          </div>
          <div class="last-date date">
            <p> March 18</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image1.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">My Star</a></h4>
          </div>
          <div class="list-descript">
            <p>Lost my dog!!!</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Dristor,Ilfov</a></p>
          </div>
          <div class="list-date date">
            <p> March 17</p>
          </div>
          <div class="last-date date">
            <p> March 17</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image2.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">Lost Dog RAM</a></h4>
          </div>
          <div class="list-descript">
            <p>Lost my sweetdog!!!</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Galata,Galati</a></p>
          </div>
          <div class="list-date date">
            <p> March, 15</p>
          </div>
          <div class="last-date date">
            <p> March, 17</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image4.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">Lost Cat Cherry</a></h4>
          </div>
          <div class="list-descript">
            <p>My mother's cat, Cherry !</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Copou,Iasi</a></p>
          </div>
          <div class="list-date date">
            <p> March 16</p>
          </div>
          <div class="last-date date">
            <p> March 17</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image1.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">My Star</a></h4>
          </div>
          <div class="list-descript">
            <p>Lost my dog!!!</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Dristor,Ilfov</a></p>
          </div>
          <div class="list-date date">
            <p> March 15</p>
          </div>
          <div class="last-date date">
            <p> March 16</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image4.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">Lost Cat Cherry</a></h4>
          </div>
          <div class="list-descript">
            <p>My mother's cat, Cherry !</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Copou,Iasi</a></p>
          </div>
          <div class="list-date date">
            <p> March 16</p>
          </div>
          <div class="last-date date">
            <p> March 17</p>
          </div>
        </div>
      </li>
      <li class="ad">
        <div class="list-image">
          <img src="../../images/image1.jpg" alt="image">
        </div>
        <div class="text">
          <div class="list-name">
            <h4><a href="../ad/ad.html">My Star</a></h4>
          </div>
          <div class="list-descript">
            <p>Lost my dog!!!</p>
          </div>
          <div class="list-location">
            <p><a href="location"> Dristor,Ilfov</a></p>
          </div>
          <div class="list-date date">
            <p> March 15</p>
          </div>
          <div class="last-date date">
            <p> March 16</p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</body>

</html>