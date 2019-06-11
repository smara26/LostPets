<?php
session_start();


$name = $_SESSION['uname'];
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
    $placearr[]=$row['last_seen_place'];
}
$nm_array = json_encode($namearr);
$pl_array = json_encode($placearr);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <title>My chart.js Chart</title>
</head>

<body>
<div class="container1">
    <canvas id="myChart1"></canvas>

</div>

<button type="button" id="download-pdf" >
    Download PDF
</button>

<script type="text/javascript">
    let myChart1 = document.getElementById('myChart1').getContext('2d');

    let massPopChart1 = new Chart(myChart1, {
        type: 'bar',//bar,horizontalBar,pie,line,doughnut,radar ,polarArea
        data: {
            labels: <?=$nm_array;?>,
            datasets: [{
                label: 'Most vulnerable areas',
                data: <?=$pl_array;?>,
                backgroundColor: [
                    'white', 'pink', 'red', 'blue', 'black', 'green', 'orange'
                ],
                borderWidth: 5,
                borderColor: '#777'
            }]
        },
        options: {}
    });

    document.getElementById('download-pdf').addEventListener("click", downloadPDF);

    function downloadPDF() {
        var canvas = document.querySelector('#myChart1');
        //creates image
        var canvasImg = canvas.toDataURL("image/jpeg", 1.0);

        //creates PDF from img
        var doc = new jsPDF('landscape');
        doc.setFontSize(20);
        doc.text(15, 15, "Cool Chart");
        doc.addImage(canvasImg, 'JPEG', 10, 10, 280, 150 );
        doc.save('place.pdf');
    }



</script>


</body>


</html>
