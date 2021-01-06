<div id="header-wrap"><header>        
        <div>
            <a class="brand" href="/index.php"><img src="/web-app/images/mediumeben.png" /></a>
        </div>

        <div id="cssmenu">
            <ul class="nav">
                <li><a class="active" href="/admin">Inicio</a></li>
                <li class="has-sub"><a>Predicaciones</a>
                    <ul>
                        <li><?php echo anchor('gestor/predicaciones/create', 'Nuevo') ?></li>
                        <li><?php echo anchor('gestor/predicaciones/listData', 'Lista') ?></li>
                    </ul>
                </li>
                <li class="has-sub"><a>Avisos</a>
                    <ul>
                        <li><?php echo anchor('gestor/avisos/create', 'Nuevo') ?></li>
                        <li><?php echo anchor('gestor/avisos/listData', 'Lista') ?></li>
                    </ul>
                </li>
                <li class="has-sub"><a>Frases</a>
                    <ul>
                        <li><?php echo anchor('gestor/frases/create', 'Nuevo') ?></li>
                        <li><?php echo anchor('gestor/frases/listData', 'Lista') ?></li>
                    </ul>
                </li>
                <li class="has-sub"><a>Documentos</a>
                    <ul>
                        <li><?php echo anchor('gestor/documentos/create', 'Nuevo') ?></li>
                        <li><?php echo anchor('gestor/documentos/listData', 'Lista') ?></li>
                    </ul>
                </li>
                <li class="has-sub"><a>Visitas</a>
                    <ul>
                        <li><?php echo anchor('gestor/visitas/listData', 'Lista') ?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav" style="float: right;">
                <?php
                    if(isset($role)){
                        echo '<li style=" float:left;">'. anchor('admin/logout', 'Salir') .'</li>';
                    }else{
                        echo '<li style=" float:left;">'. anchor('admin/index', 'Ingresar') .'</li>';
                    }
                ?>
            </ul>
        </div>
</header></div>

<!-- content-wrap -->
<div id="content-wrap">