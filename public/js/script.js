function changeText() {
    $na = document.getElementById("nazov").value;
    $ce = document.getElementById("cena").value;
    $po = document.getElementById("popis").value;

    if ($na == null ||$na.length == 0) {
        document.getElementById("txtnazov").innerHTML="Zadaj názov vrcholu";
    } else {
        document.getElementById("txtnazov").innerHTML="Názov vrcholu:";
    }
    if ($ce.length == 0) {
        document.getElementById("txtcena").innerHTML="Zadaj cenu:";
    } else {
        document.getElementById("txtcena").innerHTML="Cena:";
    }
    if ($po == null || $po.length == 0) {
        document.getElementById("txtpopis").innerHTML="Zadaj popis";
    } else {
        document.getElementById("txtpopis").innerHTML="Popis:";
    }
    event.preventDefault();
}

function changeNadpis() {
    $na = document.getElementById("id").value;

    if ($na == null ||$na.length == 0) {
        document.getElementById("txtnadpis").innerHTML="Nový výstup";
    } else {
        document.getElementById("txtnadpis").innerHTML="Zmena výstupu";
    }
    event.preventDefault();
}

function upozornenie() {
    let btnShow = document.querySelector('button');

    btnShow.addEventListener('click', () => {
        swal( {
            title: 'my title',
            text: 'text',
            icon: 'success',
            button: 'ok'
        })
    })
}

function visibilityPassword() {
    $passw = document.getElementById("heslo");
    if ($passw.type === "password") {
        $passw.type = "text";
    } else {
        $passw.type = "password";
    }
}

function numberUsedCheck(number) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","?c=vodca&a=numberExists&telefon="+number, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.response === "true") {
                document.getElementById("mobil").innerHTML = "Dané číslo sa už používa!"
            } else {
                document.getElementById("mobil").innerHTML = "Telefon"
            }
        }
    }
}

function poistenieUsedCheck(insurance) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","?c=poistenie&a=insuranceExists&poistenie="+insurance, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.response === "true") {
                document.getElementById("ins").innerHTML = "Dané poistenie už existuje!"
            } else {
                document.getElementById("ins").innerHTML = "Názov"
            }
        }
    }
}

function ulozPoistenie() {
    $na = document.getElementById("nazov").value;

    if ($na != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","?c=poistenie&a=store&nazov="+$na, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                if (this.response === "true") {
                    document.getElementById("info").innerHTML = "Poistenie pridané!"
                }
            }
        }
    }
}