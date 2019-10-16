<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <!--SideBar Title -->
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
            <?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
        </div>
        <!-- SideBar User info -->
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                <img src="<?php echo SERVERURL; ?>vistas/assets/img/avatar.png" alt="UserIcon">
                <figcaption class="text-center text-titles"><?php echo $_SESSION['usuario_sdo']; ?></figcaption> 
            </figure>
            <ul class="full-box list-unstyled text-center">
<!--                <li>
                        <a href="#!">
                                <i class="zmdi zmdi-settings"></i>
                        </a>
                </li>-->
                <li>
                    <a href="<?php echo $lc->encryption($_SESSION['token_sdo']);?>" class="btn-exit-system">
                        <span class="glyphicon glyphicon-log-out"></span>
                        
                        <!--<i class="zmdi zmdi-power zmdi-hc-lg"> Salir del Sistema</i>-->
                    </a>
                </li>
                <p>Salir del Sistema</p>
            </ul>
        </div>
        <!-- SideBar Menu -->
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            <li>
                    <a href="<?php echo SERVERURL; ?>home/">
                        <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
                    </a>
            </li>
             <?php if($_SESSION['tipo_sdo']=="administrador" || $_SESSION['tipo_sdo']=="captura"):?>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-folder zmdi-hc-fw"></i> Menús, Títulos y Contenidos<i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="<?php echo SERVERURL; ?>tiposecciones/"><i class="zmdi zmdi-file zmdi-hc-fw"></i> Registro de menús y títulos</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>contenidos/"><i class="zmdi zmdi-file zmdi-hc-fw"></i> Registro de contenidos</a>
                    </li>
                </ul>
            </li>
             <?php
                endif;
            ?>
            <?php if($_SESSION['tipo_sdo']=="administrador"): ?>
            <!--<li>-->
<!--                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registro de usuarios<i class="zmdi zmdi-caret-down pull-right"></i>
                </a>-->
                <!--<ul class="list-unstyled full-box">-->
                    <li>
                        <a href="<?php echo SERVERURL; ?>admin/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Ingreso de usuarios</a>
                    </li>
                    
                <!--</ul>-->
            <!--</li>-->
            <?php
                endif;
            ?>
            <?php if($_SESSION['tipo_sdo']=="administrador"): ?>
            <!--<li>-->
<!--                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-key zmdi-hc-fw"></i> Cambio de contraseña <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>-->
                <!--<ul class="list-unstyled full-box">-->
<!--                    <li>
                        <a href="<?php echo SERVERURL; ?>contrasenia/"><i class="zmdi zmdi-refresh zmdi-hc-fw"></i> Cambiar la contraseña</a>
                    </li>-->
                    <li>
                        <a href="<?php echo SERVERURL; ?>recuperar/"><i class="zmdi zmdi-key zmdi-hc-fw"></i> Recuperar Contraseñas</a>
                    </li>
                <!--</ul>-->
            <!--</li>-->
            <?php
                endif;
            ?>
        </ul>
    </div>
</section>