<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$first_day = date("Y-m-01");
$last_day = date("Y-m-t", strtotime($first_day));
$sql = "SELECT * FROM ads where last_modify_date between '" . $first_day . "' and '" . $last_day . "'";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $namearr[] = $row['name'];
    $casearr[]=$row['details'];
}
$nm_array = json_encode($namearr);

$cs_array = json_encode($casearr);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <title>My chart.js Chart</title>
</head>

<body>


<div class="container4">
    <canvas id="myChart4"></canvas>

</div>

<script type="text/javascript">

    let myChart4 = document.getElementById('myChart4').getContext('2d');

    let massPopChart4 = new Chart(myChart4, {
        type: 'bar',//bar,horizontalBar,pie,line,doughnut,radar ,polarArea
        data: {
            labels: <?=$nm_array;?>,
            datasets: [{
                label: 'Case of lost pets',
                data: <?=$cs_array;?>,
                backgroundColor: [
                    'white', 'pink', 'red', 'blue', 'black', 'green', 'orange'
                ],
                borderWidth: 5,
                borderColor: '#777'
            }]
        },
        options: {}
    });
</script>


</body>


</html>
