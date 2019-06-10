<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./add.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <title>Registration my ad</title>
</head>

<body>
<header class="header-wrap">
<nav class="topnav">
  <a href="../../../Back/logout.php" class="active">Log out</a>
  <div class="dropdown">
    <button class="dropbtn"><?=$_SESSION['uname'];?>
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
  <div class="formMessage">
    <h3>Let us help you find your animal! Give us some details!</h3>
  </div>
  <form id="form-wrap" action="../../../Back/add.php" method="POST" enctype="multipart/form-data">
    <div>
      <label for="formPName">Pet's Name*:</label>
      <br>
      <input type="text" required id="formPName" name="formPName" />
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
      <label for="lastPlaceC">City:</label>
      <input type="text" id="lastPlaceC" name="lastPlaceC" required>
      <label for="lastPlaceN">Neighborhood</label>
      <input type="text" id="lastPlaceN" name="lastPlaceN" required>
    </div>
    <br>
    <div>
      <label for="formSpecies">Species*:</label>
      <br>
      <input type="text" required id="formSpecies" name="formSpecies" />
    </div>
    <br>
    <div>
      <label for="formMarks">Personal marks:</label>
      <br>
      <input type="text" id="formMarks" name="formMarks" />
    </div>
    <br>
    <div>
      <label for="formCollar">Collar's details:</label>
      <br>
      <input type="text" id="formCollar" name="formCollar" />
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