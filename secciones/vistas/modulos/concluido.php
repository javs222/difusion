<script>
$(document).ready(function(){
    $('.concluido').on('keypress', function(e){
        e.preventDefault();
        var token=$(this).attr('href');//guardamos lo que viene en el atributo href

//                var volante= document.getElementsByTagName("volante");
//                var $volante = $('$volante');http://localhost/SistemaCorrespondencia/

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
               url:'<?php echo SERVERURL; ?>ajax/concluidoAjax.php?token='+token,
               success:function (data){
                   if(data=="TRUE"){
                       window.location.reload();

                   }else{
                       swal(
                               "Ocurrio un ERROR",
                               "No se Pudo Actualizar la Información",
                               "error"
                            );
                   }
               }
            });
        });
    });
});
</script>