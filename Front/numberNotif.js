function getNumber(){

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log('RASPUNS = ', this.responseText);
        document.getElementById("numberNotif").innerHTML = this.responseText;
     }
    };
        xmlhttp.open("POST", "../Back/notif_number.php", true);
        xmlhttp.send();
        return false;
    }
getNumber();
setInterval(getNumber, 1000);