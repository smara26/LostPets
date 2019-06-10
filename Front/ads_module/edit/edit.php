<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit your ad</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="Front/ads_module/edit/edit.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
<header class="header-wrap">
  <nav class="topnav">
      <a href="Back/logout.php" class="active">Log out</a>
    <div class="dropdown">
      <button class="dropbtn"><?=$_SESSION['uname'];?>
        <i class="down"></i>
      </button>
      <div class="dropdown-content">
        <a href="../ad.php">My ad</a>
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
        <a href="#">A new lost pet is near your area!</a>
        <a href="#">John Mayer has just seen your pet recently.</a>
        <a href="#">Maria Petrei has just seen your pet recently.</a>
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



  <div class="lost-pet">
    <div class="principle-details">
      <img src="Front/images/charles-2.jpg" alt="Charles-The pug">

      <div class="first-details">
        <h2>Details about the lost pet:</h2>

        <p>
          <label for="name-pet">Name: </label>
          <input id="name-pet" name="name" placeholder="Charles">
        </p>

        <p>
          <label for="breed-pet">Breed: </label>
          <input id="breed-pet" name="breed" placeholder="Pug">
        </p>

        <p>
          <label for="date-disp">Date of Disparition: </label>
          <input id="date-disp" name="date" placeholder="15/03/2019">
        </p>

        <h2>Contact:</h2>

        <p>
          <label for="owner-pet">Owner: </label>
          <input id="owner-pet" name="owner" placeholder="Sam Mendes">
        </p>

        <p>
          <label for="owner-phone">Phone: </label>
          <input id="owner-phone" name="phone" placeholder="0749 032 155">
        </p>

        <p>
          <label for="owner-mail">Mail: </label>
          <input id="owner-mail" name="mail" placeholder="sam.mendes@gmail.com">
        </p>

      </div>
    </div>

    <div class="description">
      <h2>More details:</h2>
      My poor pug responds at the name 'Charles'. He has just 5 months,
      and a blue dog-collasr. Please, help me find him and, of course, the person that will
      find him will receive a reward.

      <p>
        <label for="reward-pet">Reward: </label>
        <input id="reward-pet" name="reward" placeholder="200$">
      </p>
    </div>

    <div class="map">
      <img id="map" src="Front/images/map.png" alt="The Map">
    </div>
  </div>

  <a class="btn btn-ghost" href="#popup1">Save Changes</a>

  <div id="popup1" class="overlay">
    <div class="popup">
      <h4>Do you want to save the changes?</h4>
      <a id="close" href="#">&times;</a>
      <div class="contentPU">
        <a href="../ad/ad.php" class="button" id="cancel">Cancel</a>
        <a href="../ad/ad.php" class="button" id="allow">Save</a>
      </div>
    </div>
  </div>
</body>

</html>