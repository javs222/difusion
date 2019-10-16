<body class="bg-3" style="background-image: url(<?php echo SERVERURL; ?>vistas/assets/img/Patron__Verdes2.png);">
    <nav class="navbar bg-3">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        </div>
        <br>
    </div>
    <div class="container">
        <img src="<?php echo SERVERURL; ?>vistas/assets/img/sacmexchico.png" width="400" height="80">
        <img src="<?php echo SERVERURL; ?>vistas/assets/img/cdmx.jpg" width="150" height="80" style="float: right;">
    </div>
    <br>
</nav>
    <form action="" method="POST" autocomplete="off" class="full-box logInForm">
        <p class="text-center text-muted" style="color:#000"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
        <p class="text-center text-muted text-uppercase" style="color:#000"><strong>Inicia sesión con tu cuenta</strong></p>
        <div class="form-group">
            <label class="control-label" style="font-size:18px; color:#000" for="User">Nombre de Usuario</label>
            <input class="form-control micolor" id="User" type="text" name="usuario" onkeyup="mayus(this);" autofocus>
          <!--<p class="help-block">Escribe tú Nombre de Usuario</p>-->
        </div>
        <div class="form-group ">
          <label class="control-label" style="font-size:18px; color:#000" for="UserPass">Contraseña</label>
          <input class="form-control" id="UserPass" type="password" name="clave">
          <!--<p class="help-block">Escribe tú contraseña</p>-->
        </div>
        <div class="form-group text-center">
                <input type="submit" value="Iniciar sesión" class="btn btn-raised btn-warning">
        </div>
    </form>
</body>
<?php   if(isset($_POST['usuario']) and isset($_POST['clave']))
        {
            require_once "./controladores/logincontrolador.php";
            $login= new loginControlador();
            echo $login->iniciar_sesion_controlador(); 
        } 
?>