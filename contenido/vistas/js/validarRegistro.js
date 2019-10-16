function val(e) {
//    event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    tecla = (document.all) ? e.keyCode : e.which ? e.which : e.charCode;
    if (tecla==9) return true;
    if (tecla==8) return true;
//    if (tecla==44) return false;
//    if (tecla==46) return false;
    if (tecla==188) return false;
    if (tecla==190) return false;
    if (tecla>=97 & tecla<=105) return false;
    if (tecla==106) return false;
    if (tecla==107) return false;
    if (tecla==109) return false;
    if (tecla==110) return false;
    if (tecla==111) return false;
    patron =/[A-Za-z-áéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ?\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
//    especiales = [8, 37, 39, 46];
    especiales = [8];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function soloLetras2(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
//    especiales = [8, 37, 39, 46];
    especiales = [8, 46, 44, alt+33, alt+173, alt+63, alt+168, alt+64];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
//    especiales = [8, 37, 39, 46];
    especiales = [8];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function nada(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " ";
//    especiales = [8, 37, 39, 46];
    especiales = [8];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}

