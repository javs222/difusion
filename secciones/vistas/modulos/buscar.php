<!--<script>
$(document).ready(function(){
    $('.buscar').on('click',function(){
        swal({
                title:'¡Debes Elejir una Opción!',
                html :'<label><input type="checkbox" id="input1" value="Número de Oficio" class="checkBoxGroup"> Número de Oficio <label/> ' + 
                       ' <label> <input type="checkbox" id="input2" value="Procedencia" class="checkBoxGroup"> Procedencia <label/> ' +
                       ' <label><input type="checkbox" id="input3" value="Fecha del Oficio" class="checkBoxGroup"> Fecha del Oficio<label/> ' ,
                showCancelButton: true                
        }).then(function() {
            $.ajax({
                success:function (){
                   $("input:checkbox:checked").each(   
                        function() {
//                            alert("El checkbox con valor " + $(this).val() + " está seleccionado");
                                swal({
                                      type: 'success',
                                      html: 'Seleccionaste la busqueda por:' + $(this).val()
                                });
                        }
                    );
                }
            });
        });
    });
});
</script>-->
<script>
//$(document).ready(function(){
//    $('.buscar').on('click',function(){
//        swal({
//          title: 'Selecciona una opción',
//          html:'<input type="text" id="input1" class="swal2-input">',
//          inputPlaceholder:'.....',
//          input: 'select',
//          inputOptions: {
//            'n_oficio': 'Número de Oficio',
//            'procedencia': 'Procedencia',
//            'fecha_oficio': 'Fecha del Oficio'
//          },
//          inputPlaceholder: 'Selecciona una Opción',
//          
//          showCancelButton: true,
//          
//          inputValidator: function (value) {
//            return new Promise(function (resolve, reject) {
//              if (value !== '') {
//                resolve();
//              } else {
//                reject('Necesitas Seleccionar una Opción de la Lista');
//              }
//            });
//          }
//          
//        }).then(function(value) {
//            $.ajax({
//                            
//                            url:'http://localhost/SistemaCorrespondencia/controladores/buscadorControlador.php?opcion='+value+'&busqueda='+$('#input1').val(),
//                            success:function (data){
//                            if(data=="TRUE"){
//                               window.location.reload();
////                                console.log(data);
//                               
//                                       
//                           }else{
//                               swal(
//                                       "Ocurrio un ERROR",
//                                       "No se Realizo la Busqueda",
//                                       "error"
//                                    );
//                           }
//                       }
//                    });
////          if (value) {
////            swal({
////              type: 'success',
////              html: 'Seleccionaste: ' +value
////            });
////          }
//        });
//    });
//});
 $('.archivo').on('click',function(e){
                e.preventDefault();
                 
//                var  sigob = $('#folio').val();
//                var archivorespuesta=document.getElementById('res').files[0];
//
//                var respuesta="respuestas/" + archivorespuesta.name;             
//                
                var token=$(this).attr('token');//guardamos lo que viene en el atributo href
                var volante=$(this).attr('volante');
                                
                const {value: file} = swal({
                    title: '!Selecciona un Archivo¡',
                    input: 'file',
                    type: 'warning',
                    
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Actualizar Datos!',
                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!',
                    inputValidator: function (value) {
                    return new Promise(function (resolve, reject) {
                      if (value !== null) {
                        resolve();
                      } else {
                        reject('Debes Seleccionar un Archivo');
                      }
                    });
                  }
                }).then(function () {
                    $.ajax({
                       url:'http://localhost/correspondencia/ajax/respuestaAjax.php?token='+token+'&sigob='+volante+'&pdfrespuesta='+file.name,

                       success:function (data){
                           if(data=="TRUE"){
                               window.location.reload();
//                               pdfnombre.;
//                               document.move(destino);
//                               document.save();
//                               console.log(destino);
                                       
                           }else{
                               swal(
                                       "Ocurrio un ERROR",
                                       "No se Pudo Actualizar la Información a CONCLUIDO",
                                       "error"
                                    );
                           }
                       }
                    });
                });
//                const {value: file} = swal({
//                  title: 'Selecciona Un Archivo!',
//                  input: 'file',
//                  
//                  inputAttributes: {
//                    'accept': 'application/pdf',
//                    'arial-label': 'Tú Archivo Se Cargo'
//                  },
//                  showCancelButton: true,
//                  inputValidator: function (value) {
//                    return new Promise(function (resolve, reject) {
//                      if (value !== null) {
//                        resolve();
//                      } else {
//                        reject('Debes Seleccionar un Archivo');
//                      }
//                    });
//                  }
//                }).then(function(value) {
//                         if (value) {
//                            swal({
////                                url:'http://localhost/SistemaCorrespondencia/controladores/administradorControlador.php?nombre='+file.name,
//                              title:'Archivo Cargado!',  
//                              type: 'success',
//                              html: 'Seleccionaste el Archivo:' + value.name
//                            });
//                          }
//                });
            });
</script>

