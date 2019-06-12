const host = 'localhost';
const port = 3000;
const hostname = 'http://' + host + ':' + port;

const method = hostname + '/user/' + getUserId() + '/saveLocation';

function getUserId() {
    const userIdElement = document.getElementById('user-id');
    const id = userIdElement.innerText
        .replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
    userIdElement.remove();
    return id;
}

function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(coordinates => {
            const coords = coordinates.coords;

            // const xhttp = new XMLHttpRequest();
            // xhttp.open('PUT', method, true);
            // xhttp.send(JSON.stringify(coords));
            // xhttp.onreadystatechange = function() {
            //     if (xhttp.readyState == XMLHttpRequest.DONE) {   
            //        if (xhttp.status == 200) {
            //        }
            //     }
            // }
        });
    } else {
    
    }
}

getUserLocation();