$(document).ready(function(){
	$('.btn-sideBar-SubMenu').on('click', function(){
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	
	$('.btn-menu-dashboard').on('click', function(){
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});
        
$(document).ready(function(){
            $('.edicion').on('click', function(e){
                e.preventDefault();

                var id=$(this).attr('href');//guardamos lo que viene en el atributo href
                                
//                swal({
//                    title: '¿Estás Seguro?',
//                    text: "Actualizaras el estatus del documento a: TRAMITADO",
//                    type: 'warning',
//                    showCancelButton: true,
//                    confirmButtonColor: '#03A9F4',
//                    cancelButtonColor: '#F44336',
//                    confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Actualizar Datos!',
//                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
//                }).then(function () {
                    $.ajax({
                            
                            url:'http://10.11.24.69/contenido/vistas/contenidos/edicionseccionesAjax.php?id='+id,
                            success:function (data){
                            if(data=="TRUE"){
                               window.location.reload();
//                                console.log(data);
                               
                                       
                           }else{
                               swal(
                                       "Ocurrio un ERROR",
                                       "No se Pudo Actualizar la Información",
                                       "error"
                                    );
                           }
                       }
                    });
//                });
            });
});

$(document).ready(function(){
            $('.eliminarcuenta').on('click', function(e){
                e.preventDefault();

                var cuenta=$(this).attr('href');//guardamos lo que viene en el atributo href
                                
//                swal({
//                    title: '¿Estás Seguro?',
//                    text: "Actualizaras el estatus del documento a: TRAMITADO",
//                    type: 'warning',
//                    showCancelButton: true,
//                    confirmButtonColor: '#03A9F4',
//                    cancelButtonColor: '#F44336',
//                    confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Actualizar Datos!',
//                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
//                }).then(function () {
                    $.ajax({
                            
                            url:'http://10.11.24.69/contenido/ajax/eliminarAjax.php?cuenta='+cuenta,
                            success:function (data){
                            if(data=="TRUE"){
                                swal({
                                        title:"Eliminado",
                                        text:"La cuenta se elimino del sistema",
                                        type:"success",
                                        confirmButtonText: 'Aceptar'
                                        }).then(function(){
                                             window.location.reload();
                                        });
//                               window.location.reload();      
                           }else{
                               swal(
                                       "Ocurrió algo inesperado",
                                       "No se elimino la cuenta de usuario",
                                       "error"
                                    );
                           }
                       }
                    });
//                });
            });
});

$(document).ready(function(){
            $('.correspondencia').on('click', function(e){
                e.preventDefault();

                var codigo=$(this).attr('href');//guardamos lo que viene en el atributo href
//                var accion_implementar=$(this).attr('input.accion_implementar');
//                var accion_implementar=document.getElementsByName('accion_implementar').val;
//                var persona=document.getElementById('persona').value;
//                var persona=document.getElementsByName("checkbox").checked;
//                var persona=$('#persona:checked').val();//correcto
                var accion_implementar;
                var persona = new Array();
                var instruccion = new Array();
                
                accion_implementar= $('input:text[name=accion_implementar]').val()
                
                $("input[name='checkbox[]']:checked").each(function() {
                    persona.push($(this).val());
                });
                
                $("input[name='instruccion[]']:checked").each(function() {
                    instruccion.push($(this).val());
                });
                                
                var volante = new Array();
 
                $("input[name='radio']:checked").each(function() {
                    volante.push($(this).val());
                });
                                
                swal({
                    title: '¿Estás Seguro?',
                    text: "Estas apunto de asignar la correspondencia",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Enviar!',
                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
                }).then(function () {
                    $.ajax({
                            
                            url:'http://10.11.24.69/correspondencia/ajax/envioAjax.php?token='+codigo+'&persona='+persona+'&volante='+volante+'&instruccion='+instruccion+'&accion_implementar='+accion_implementar,
                            success:function (data){
                            if(data=="TRUE"){
//                               window.location.reload();
//                                console.log(codigo,volante,persona);
                                swal({
                                        title:"Enviado",
                                        text:"Correspondencia Enviada Correctamente",
                                        type:"success",
                                        confirmButtonText: 'Aceptar'
                                        }).then(function(){
                                             window.location.reload();
                                            });
//                                    });      
                           }else{
                                swal(
                                       "Ocurrio un ERROR",
                                       "No se Asigno la Correspondencia",
                                       "error"
                                    );
                           }
                       }
                    });
                });
            });
});

$(document).ready(function(){
    $('.desactivar').on('click', function(e){
        e.preventDefault();

        var desactivar=$(this).attr('href');//guardamos lo que viene en el atributo href
        var valor = desactivar.split(' ');

        swal({
            title: '¿Estás Seguro?',
            text: "Estas apunto de desactivar el Título con su contenido",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Desactivar!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
        }).then(function () {
            $.ajax({
                    url:'http://10.11.24.69/contenido/ajax/desactivarAjax.php?titulo='+valor[0]+'&idtisecc='+valor[1],
                    success:function (data){
                    if(data=="TRUE"){
//                                console.log(codigo,volante,persona);
                        swal({
                                title:"Actualización",
                                text:"El título y el contendio se desactivo",
                                type:"success",
                                confirmButtonText: 'Aceptar'
                                }).then(function(){
                                     window.location.reload();
                                    });    
                   }else{
                        swal(
                               "Ocurrio un ERROR",
                               "No se realizo ningun cambio",
                               "error"
                            );
                   }
               }
            });
        });
    });
});

$(document).ready(function(){
    $('.activar').on('click', function(e){
        e.preventDefault();

        var activar=$(this).attr('href');//guardamos lo que viene en el atributo href
        var valor = activar.split(' ');

        swal({
            title: '¿Estás Seguro?',
            text: "Estas apunto de activar el Título con su contenido",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Activar!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
        }).then(function () {
            $.ajax({
                    url:'http://10.11.24.69/contenido/ajax/activarAjax.php?titulo='+valor[0]+'&idtisecc='+valor[1],
                    success:function (data){
                    if(data=="TRUE"){
//                                console.log(codigo,volante,persona);
                        swal({
                                title:"Actualización",
                                text:"El título y el contenido se activo",
                                type:"success",
                                confirmButtonText: 'Aceptar'
                                }).then(function(){
                                     window.location.reload();
                                    });    
                   }else{
                        swal(
                               "Ocurrio un ERROR",
                               "No se realizo ningun cambio",
                               "error"
                            );
                   }
               }
            });
        });
    });
});

$(document).ready(function(){
    $('.recuperar').on('click', function(e){
        e.preventDefault();

        var usuario= new Array();

        usuario= $('input:text[name=nom_usuario]').val();

        swal({
            title: '¡Recuperar Contraseña!',
            text: "Estas a un paso de recuperar la contraseña",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Recuperar!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
        }).then(function (){
            $.ajax({
                url:'http://10.11.24.69/contenido/ajax/recuperarAjax.php?usuario='+usuario,
                success:function (data)
                {
                    var datos = eval(new String('' + data + ''));
                    if(data=="FALSE")
                    {
                        swal(
                               "¡Oh, No!",
                               "El usuario ingresado no existe en la base de datos",
                               "warning"
                            );
                   }else
                   {
                    swal({
                            title:"Tú contraseña es: ",
//                                        text:"Correspondencia Enviada Correctamente",
                            type:"success",
                            html:'<pre><code>' +
                                  JSON.stringify(datos) +
                                 '</code></pre>',
                            confirmButtonText: 'Aceptar'
                        })
                   }
               }
            });
        });
    });
});

        $(document).ready(function(){
                    $('.concluido').on('click', function(e){
                        e.preventDefault();

                        var  sigob = $('#folio').val();
                        var archivorespuesta=document.getElementById('res').files[0];
        //                $destino="adjuntos/";
                        var respuesta="respuestas/" + archivorespuesta.name;
        //                var pdfnombre=archivorespuesta.name;
        //                var destino="..respuestas/"+pdfnombre;
                        
        //                var carpetaDestino=companyhome.childByNamePath(destino);//Calculas la referencia a la carpeta destino
        //                var pdfnombre=$('input[type=file]').val();
        //              var pdfnombre=document.getElementsByTagName("input")[0].value;
                        
                        
                        var token=$(this).attr('href');//guardamos lo que viene en el atributo href
                                        
                        swal({
                            title: '¿Estás Seguro?',
                            text: "Estas apunto de de actualizar el estatus del documento a: CONCLUIDO",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#03A9F4',
                            cancelButtonColor: '#F44336',
                            confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Actualizar Datos!',
                            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
                        }).then(function () {
                            $.ajax({
                               url:'http://10.11.24.69/correspondencia/ajax/concluidoAjax.php?token='+token+'&sigob='+sigob+'&pdfrespuesta='+respuesta,

                               success:function (data){
                                   if(data=="TRUE"){
                                       window.location.reload();
                                               
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
                    });
        });

        $(document).ready(function(){
            $('.concluircomentario').on('click', function(e){
                e.preventDefault();                
                
                var token=$(this).attr('href');//guardamos lo que viene en el atributo href
                                
                swal({
                    title: '¿Estás Seguro?',
                    text: "Estas apunto de concluir el oficio",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Concluir Oficio!',
                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
                }).then(function () {
                    $.ajax({
                       url:'http://10.11.24.69/correspondencia/ajax/comentarioconcluidoAjax.php?token='+token,

                       success:function (data){
                           if(data=="TRUE"){
                               window.location.reload();
                                       
                           }else{
                               swal(
                                       "Ocurrio un ERROR",
                                       "No se Pudo Concluir el Oficio",
                                       "error"
                                    );
                           }
                       }
                    });
                });
            });
        });
        
        $(document).ready(function(){
            $('.modificar').on('click', function(e){
                e.preventDefault();                
                
                var token=$(this).attr('href');//guardamos lo que viene en el atributo href
                                
                swal({
                    title: '¿Estás Seguro?',
                    text: "Estas apunto de concluir el oficio",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: '<i class="zmdi zmdi-refresh"></i> Sí, Concluir Oficio!',
                    cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
                }).then(function () {
                    $.ajax({
                       url:'http://10.11.24.69/correspondencia/vistas/contenidos/modificar-vistas.php?token='+token,

                       success:function (data){
                           if(data=="TRUE"){
                               window.location.reload();
                                       
                           }else{
                               swal(
                                       "Ocurrio un ERROR",
                                       "No se Pudo Concluir el Oficio",
                                       "error"
                                    );
                           }
                       }
                    });
                });
            });
        });
        
        $('.formularioajax').submit(function(e){
            e.preventDefault();

            var form=$(this);

            var tipo=form.attr('data-form');
            var accion=form.attr('action');
            var metodo=form.attr('method');
            var respuesta=form.children('.RespuestaAjax');

            var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
            var formdata = new FormData(this);


            var textoAlerta;
            if(tipo==="save"){
                textoAlerta='Los datos que enviaras quedaran almacenados en el sistema';
            }else if(tipo==="delete"){
                textoAlerta="Los datos serán eliminados completamente del sistema";
            }else if(tipo==="update"){
                    textoAlerta="Los datos del sistema serán actualizados";
            }else if(tipo==="recuperar"){
                    textoAlerta="Estas a un paso de recuperar tu contraseña!";
            }else{
                textoAlerta="Quieres realizar la operación solicitada";
            }
            
            swal({
                title: '¿Estás seguro?',   
                text: textoAlerta,   
                type: 'question',   
                showCancelButton: true, 
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then(function () {
//              if (result.value) 
//               {
                    $.ajax({
                        type: metodo,
                        url: accion,
                        data: formdata?formdata:form.serialize(),
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function(){
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                              if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                if(percentComplete<100){
                                        respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
                                }else{
                                        respuesta.html('<p class="text-center"></p>');
                                }
                              }
                            }, false);
                            return xhr;
                        },
                        success: function (data) {
                            respuesta.html(data);
                        },
                        error: function() {
                            respuesta.html(msjError);
                        }
                    });
//                }
                return false;
            });
        });
        
	$('.btn-Notifications-area').on('click', function(){
		var NotificationsArea=$('.Notifications-area');
		if(NotificationsArea.css('opacity')=="0"){
			NotificationsArea.addClass('show-Notification-area');
		}else{
			NotificationsArea.removeClass('show-Notification-area');
		}
	});
        
        $('.btn-Notifications-asignar').on('click', function(){
		var NotificationsArea=$('.Notifications-area-asignar');
		if(NotificationsArea.css('opacity')=="0"){
			NotificationsArea.addClass('show-Notification-asignar');
		}else{
			NotificationsArea.removeClass('show-Notification-asignar');
		}
	});
        
$(document).ready(function(){    
    $('.btn-search').on('click', function(e){
            e.preventDefault();
            swal({
              title: '¿Qué estas buscando?',
              confirmButtonText: '<i class="zmdi zmdi-search"></i>  Buscar',
              confirmButtonColor: '#03A9F4',
              showCancelButton: true,
              cancelButtonColor: '#F44336',
              cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cancelar',
              html: '<div class="form-group label-floating">'+
                                    '<label class="control-label" for="InputSearch">Escribe aquí</label>'+
                                    '<input class="form-control" id="InputSearch" type="text">'+
                            '</div>'
            }).then(function () {
                var busqueda=$('#InputSearch').val();
                $.ajax({
                    url:'http://10.11.24.69/correspondencia/vistas/contenido/pdfbusqueda.php?busqueda='+busqueda,
                });
              swal(
                'Escribiste',
                ''+$('#InputSearch').val()+''+busqueda,
                'success'
              )
            });
            
    });
});
              
                
	$('.btn-modal-help').on('click', function(){
		$('#Dialog-Help').modal('show');
	});
        
});
(function($){
    $(window).on("load",function(){
        $(".dashboard-sideBar-ct").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);