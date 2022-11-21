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


function visibilityPassword() {
    $passw = document.getElementById("heslo");
    if ($passw.type === "password") {
        $passw.type = "text";
    } else {
        $passw.type = "password";
    }
}