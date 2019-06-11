<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="Front/statistics/statistics.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <title>Statistics</title>
  <link rel="icon" href="Front/images/logo.jpg" style="width:5px;">
</head>

<body>
  <header class="header-wrap">
    <nav class="topnav">
        <a href="../Back/logout.php" class="active">Log out</a>
      <div class="dropdown">
        <button class="dropbtn"><?=$_SESSION['uname'];?>
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
  <div id="stt">
    <div id="ads-descript">
      <h2 id="title">Statistics</h2>
      <p class="description">Depending on the information we receive daily from you, you can see a detailed statistic
        from the last month. </p>

    </div>
    <ul id="statistics">
      <li class="stat">
        <div class="list-name">
          <h4>Cases of lost animals</h4>
        </div>
        <div class="list-descript">
          <p></p>
        </div>
        <div class="types">
            <form action="../Back/statisticscasepdf.php" method="post">
                <button type="submit" name="pdf" value="pdf">PDF</button>
            </form>
            <form action="../Back/statisticscasecsv.php" method="post">
                <button type="submit" name="csv" value="csv">CSV</button>
            </form>
            <form action="../Back/statisticscase.php" method="post">
                <button type="submit" name="html" value="html">HTML</button>
            </form>
        </div>
      </li>
      <li class="stat">
        <div class="list-name">
          <h4>Recovering lost animals</h4>
        </div>
        <div class="list-descript">
          <p></p>
        </div>
        <div class="types">
            <form action="../Back/statisticsfoundpdf.php" method="post">
                <button type="submit" name="pdf" value="pdf">PDF</button>
            </form>
            <form action="../Back/statisticsfoundcsv.php" method="post">
                <button type="submit" name="csv" value="csv">CSV</button>
            </form>
            <form action="../Back/statisticsfound.php" method="post">
                <button type="submit" name="html" value="html">HTML</button>
            </form>
        </div>
      </li>
      <li class="stat">
        <div class="list-name">
          <h4>The most vulnerable areas</h4>
        </div>
        <div class="list-descript">
          <p></p>
        </div>
        <div class="types">
            <form action="../Back/statisticsplacepdf.php" method="post">
                <button type="submit" name="pdf" value="pdf">PDF</button>
            </form>
            <form action="../Back/statisticsplacecsv.php" method="post">
                <button type="submit" name="csv" value="csv">CSV</button>
            </form>
            <form action="../Back/statisticsplace.php" method="post">
                <button type="submit" name="html" value="html">HTML</button>
            </form>
        </div>
      </li>
      <li class="stat">
        <div class="list-name">
          <h4>Rewards</h4>
        </div>
        <div class="list-descript">
          <p></p>
        </div>
        <div class="types">
            <form action="../Back/statisticsrewardpdf.php" method="post">
                <button type="submit" name="pdf" value="pdf">PDF</button>
            </form>
            <form action="../Back/statisticsrewardcsv.php" method="post">
                <button type="submit" name="csv" value="csv">CSV</button>
            </form>
            <form action="../Back/statisticsreward.php" method="post">
                <button type="submit" name="html" value="html">HTML</button>
            </form>
        </div>
      </li>
    </ul>
  </div>
</body>
</html>