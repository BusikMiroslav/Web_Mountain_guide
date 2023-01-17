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

function visibilityPassword() {
    $passw = document.getElementById("heslo");
    if ($passw.type === "password") {
        $passw.type = "text";
    } else {
        $passw.type = "password";
    }
}

function changePasswordButton() {
    $prve = document.getElementById("heslo").value;
    $druhe = document.getElementById("hesloopak").value;

    if($prve === $druhe) {
        document.getElementById("odoslat").disabled = false;
    } else {
        document.getElementById("odoslat").disabled = true;
    }
}

function emailUsedCheck(email) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET","?c=auth&a=emailExists&mail="+email, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.response === "true") {
                document.getElementById("mail").innerHTML = "Daný email sa už používa!"
                document.getElementById("ulozit").disabled = true;
            } else {
                document.getElementById("mail").innerHTML = "Email"
                document.getElementById("ulozit").disabled = false;
            }
        }
    }
}

function emailExists(email) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET","?c=auth&a=emailExists&mail="+email, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.response === "false") {
                document.getElementById("mail").innerHTML = "Daný email neexistuje!"
                document.getElementById("odoslat").style.visibility = "hidden";
            } else {
                document.getElementById("mail").innerHTML = "Email"
                document.getElementById("odoslat").style.visibility = "visible";
            }
        }
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
                document.getElementById("uloz").disabled = true;
            } else {
                document.getElementById("mobil").innerHTML = "Telefon"
                document.getElementById("uloz").disabled = false;
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
                document.getElementById("ulozit").disabled = true;
            } else {
                document.getElementById("ins").innerHTML = "Názov"
                document.getElementById("ulozit").disabled = false;
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

function trasaUsedCheck(trasa) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","?c=trasa&a=trasaExists&tr="+trasa, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.response === "true") {
                document.getElementById("ins").innerHTML = "Daná trasa už existuje!"
                document.getElementById("ulozit").disabled = true;
            } else {
                document.getElementById("ins").innerHTML = "Názov"
                document.getElementById("ulozit").disabled = false;
            }
        }
    }
}

function rovnakeHeslaCheck(password) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","?c=auth&a=samePassword&pass="+password+"/"+document.getElementById("heslo").value, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.response === "true") {
                document.getElementById("infosame").innerHTML = "Heslá sú rovnaké!"
            } else {
                document.getElementById("infosame").innerHTML = "Heslá sa nezhodujú!"
            }
        }
    }
}