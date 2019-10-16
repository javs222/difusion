<script>
$(document).ready(function(){
    $('.btn-exit-system').on('click', function(e){
        e.preventDefault();
        var token=$(this).attr('href');//guardamos lo que viene en el atributo href
        swal({
            title: '¿Estás Seguro?',
            text: "Estas Apunto de Cerrar la Sesión Actual",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-run"></i> Sí, Cerrar Sesión!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
        }).then(function () {
            $.ajax({
               url:'<?php echo SERVERURL; ?>ajax/loginAjax.php?token='+token,
               success:function (data){
                   if(data=="TRUE"){
                       window.location.href="<?php echo SERVERURL; ?>login/";
                   }else{
                       swal(
                               "Ocurrio un ERROR",
                               "No se Pudo Cerrar la Sesión",
                               "error"
                            );
                   }
               }
            });
        });
    });
});
</script>
