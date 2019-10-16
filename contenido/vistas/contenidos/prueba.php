<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>jQuery UI Datepicker - Entrada de texto</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<!--<script>
$(function () {
    function addZero(x,n) {
      while (x.toString().length < n) {
        x = "0" + x;
      }
      return x;
    }
$.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        onSelect: function () {
            
//            alert(date)
            var valor = $("#datepicker").val();
//            console.log(valor);
            var f = new Date();
            var actual=addZero(f.getDate(), 2) + "/" + (f.getMonth() +1) + "/" + f.getFullYear()
//            console.log(actual);
            if(valor < actual){
//                swal({
//                    title: '¿Estás Seguro?',
//                    text: "Estas Apunto de Cerrar la Sesión Actual",
//                    type: 'warning',
//                    showCancelButton: true,
//                    confirmButtonColor: '#03A9F4',
//                    cancelButtonColor: '#F44336',
//                    confirmButtonText: '<i class="zmdi zmdi-run"></i> Sí, Cerrar Sesión!',
//                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
//                }).then(function () {
//                    $.ajax({
//                       url:'<?ph echo SERVERURL; ?>ajax/loginAjax.php?token='+token,
//                       success:function (data){
//                           if(data=="TRUE"){
//                               window.location.href="<?ph echo SERVERURL; ?>login/";
//                           }else{
//                               swal(
//                                       "Ocurrio un ERROR",
//                                       "No se Pudo Cerrar la Sesión",
//                                       "error"
//                                    );
//                           }
//                       }
//                    });
//                });
                    Swal.fire({
//                      position: 'top-end',
                      type: 'warning',
                      title: 'Selecciona una fecha posterior a la actual',
                      showConfirmButton: true
//                      timer: 1500
                    })
            }
        },
        
        
        
    });
    
//    var valor = $("#datepicker").val();
//    console.log(valor);
});
</script>
</head>

<body>
Fecha:
<input type="text" id="datepicker" />-->
<!--<script>
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

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}
</script>



<input type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
</body>
</html>-->
<!--<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>jQuery UI Datepicker - onSelect</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
firstDay: 1,
onSelect: function (date) {
alert(date)
},
});
});
</script>
</head>

<body>
Fecha:
<div id="datepicker"></div>
</body>
</html>-->
<HTML>
<body>
<FORM>
<input name="fecha" type="text" size="10" maxlength="10" onKeyUp = "this.value=formateafecha(this.value);"> 
</FORM>
<SCRIPT>
function IsNumeric(valor) 
{ 
var log=valor.length; var sw="S"; 
for (x=0; x<log; x++) 
{ v1=valor.substr(x,1); 
v2 = parseInt(v1); 
//Compruebo si es un valor numérico 
if (isNaN(v2)) { sw= "N";} 
} 
if (sw=="S") {return true;} else {return false; } 
} 
var primerslap=false; 
var segundoslap=false; 
function formateafecha(fecha) 
{ 
var long = fecha.length; 
var dia; 
var mes; 
var ano; 
if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
else { fecha=""; primerslap=false;} 
} 
else 
{ dia=fecha.substr(0,1); 
if (IsNumeric(dia)==false) 
{fecha="";} 
if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
} 
if ((long>=5) && (segundoslap==false)) 
{ mes=fecha.substr(3,2); 
if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
else { fecha=fecha.substr(0,3);; segundoslap=false;} 
} 
else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
if (long>=7) 
{ ano=fecha.substr(6,2); 
if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } } 
} 
if (long>=8) 
{ 
fecha=fecha.substr(0,8); 
dia=fecha.substr(0,2); 
mes=fecha.substr(3,2); 
ano=fecha.substr(6,2); 
console.log(fecha);
// Año no viciesto y es febrero y el dia es mayor a 28 
if ( (ano%2 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
} 
return (fecha); 
}
</SCRIPT>
</body>
</html>