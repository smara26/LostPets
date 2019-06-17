<?php
session_start();

spl_autoload_register(function ($className) {
    require_once 'Back/' . $className . '.php';
});
$ads = new ads();
$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

$all_ads = "select * from ads ORDER BY last_modify_date desc";
if ($result = mysqli_query($conn, $all_ads)) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Front/header.css"/>
    <link rel="stylesheet" type="text/css" href="Front/page/page.css"/>
    <script src="Front/updateBD.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Announcements</title>
</head>

<body>
<header class="header-wrap">
    <nav class="topnav">
        <a href="../Back/logout.php" class="active">Log out</a>
        <div class="dropdown">
            <button class="dropbtn"><?= $_SESSION['uname'] ?>
                <i class="down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../personal-ads.php">My personal ads</a>
                <a href="../statistics.php">Statistics</a>
                <a href="../add.php">New ad</a>

            </div>
        </div>
        <a href="../all-ads.php">Announcements</a>
        <button onclick="updateDB()">Update Location</button>
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
            <input type="search" name="searchIn" id="searchIn" placeholder="Search" onkeyup="getFiltered()">
        </form>
        <div class="content-wrap">
            <a href="../home.php">
                <img src="Front/images/logo.jpg" alt="logo" class="logo">
            </a>
        </div>
    </nav>

</header>
<div id="ads">
    <div id="ads-descript">
        <h2 id="title">Announcements</h2>
        <p class="description">Here at petapp we love animals and we are dedicated to helping reunite lost pets with
            their
            families as quickly as possible. Since our pets are not able to speak for themselves it is very important
            that
            when they go missing we get the word out as quickly as possible. To help we offer FREE list with all pets
            lost
            in Romania added by desperate masters. </p>
        <div class="number"><?= $ads->adsNumber() ?> lost pets</div>
    </div>
    <ul id="manyads">
        <?php while ($row = mysqli_fetch_array($result)) {?>
            <li class="ad">
                <div class="list-image">
                    <?php
                    $source="Front/images/".$row['picture'];
                    ?>
                    <img src="<?=$source;?>" alt="image">
                </div>
                <div class="text">
                    <div class="list-name">
                        <?php
                        $id=$row['id'];
                        $url="../ad.php?id=".$id;
                        ?>
                        <h4><a href="<?=$url?>"><?= $row['name'];?>
                            </a></h4>
                    </div>
                    <div class="list-descript">
                        <p><?= $row['breed'];?></p>
                    </div>
                    <div class="list-location">
                        <p><a href="location"><?= $row['last_seen_place'];?></a></p>
                    </div>
                    <div class="list-date date">
                        <p><?= $row['disappearance_date'];?></p>
                    </div>
                    <div class="last-date date">
                        <p><?= $row['last_modify_date'];?></p>
                    </div>
                </div>
            </li>

            <?php
            //mysqli_free_result($result);
        }
        ?>
    </ul>
    <?php
    mysqli_close($conn);
    }

    ?>
</div>
<div id="user-id" style="display: none">
    <?php echo $_SESSION['uid']; ?>
</div>

<script src='Front/js/getUserLocation.js'></script>

<script> function getFiltered()
{
	var input, ad_list_element, title, filter, len;
	input = document.getElementById("searchIn");
	filter = input.value.toUpperCase();
	len = document.getElementsByClassName("ad").length;
    
    for(i = 0; i < len; i++)
	{
        ad_list_element = document.getElementsByClassName("ad")[i];
        title = ad_list_element.getElementsByTagName("h4")[0];
        
		if(title.innerHTML.toUpperCase().indexOf(filter) > -1)
		{
			console.log(filter);
			ad_list_element.style.display = "";
		}
		else
		{
			ad_list_element.style.display = "none";
		}
	}
}
</script>

</body>

</html>