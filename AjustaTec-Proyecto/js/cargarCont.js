window.onload = function() {
    cargarContenido('mainAdmin2.php');
};

function cargarContenido(url) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenido-derecho").innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", url, true);
    xhttp.send();
}

