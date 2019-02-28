<header class="navbar navbar-default navbar-fixed-top" role="navigation">  
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="?op=profile" class="navbar-brand">
            Administrador
        </a>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href='?op=profile'>Bienvenido: <i class="mdi-action-account-circle"></i> <b class="userName">user</b></a></li>

            <?php
                if ($_SESSION['perfil'] == 5) 
                {
            ?>
            <li class='dropdown'>
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi-maps-place"></i> Módulo Localización
                </a>
                <ul class="dropdown-menu">
                    <li><a href="?op=list_pais">Países</a></li>
                    <li><a href="?op=list_departamento">Departamentos</a></li>
                    <li><a href="?op=list_ciudad">Ciudades</a></li>
                    <li><a href="?op=list_filial">Filiales</a></li>
                </ul> 
            </li>
            <li class='dropdown'>
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi-action-dashboard"></i> Módulo Registro y control
                </a>
                <ul class="dropdown-menu">
                    <li><a href="?op=list_titular">Titulares</a></li>
                    <li><a href="?op=list_estudiante">Estudiantes</a></li>
                </ul> 
            </li>
            <li class='dropdown'>
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi-action-settings"></i> Módulo Administrativo
                </a>
                <ul class="dropdown-menu">
                    <li><a href="?op=list_plan">Planes</a></li>
                </ul> 
            </li>
            <?php
                }
            ?>
            <li><a href="?op=home"><i class="mdi-action-settings"></i> Reportes</a></li>
            <li><a href="?op=logout"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
        </ul>
    </div>
</header>