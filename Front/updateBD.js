function updateDB(){

    var c = function(pos){
    var lat = pos.coords.latitude,
        long= pos.coords.longitude,
        coords = lat + ', ' + long;
        console.log(coords);

        console.log('test')
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
     }
    };
        xmlhttp.open("POST", "../Back/updateLocationForUser.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("lat=" + lat + "&long="+ long);
    }

    navigator.geolocation.watchPosition(c);
    return false;
}