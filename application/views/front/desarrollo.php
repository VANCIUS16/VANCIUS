<!-- <script>
  jQuery(function(){
    jQuery('#camera_wrap_1').camera({
    	height: '25%',
        time: 2000,
        transPeriod: 1000,
    	playPause: false,
    	pagination: false,
    	navigation: false
    });
  });
</script> -->

<div id="container" class="container-main">

	<div>
		<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">

                            <div data-src="<?php echo base_url();?>web-app/img/slides/scanslide.jpg">
                <div class="camera_caption fadeFromBottom">
                    SYE DECODIFICACIONES Soluciones de recolecci&oacute;n de datos y movilidad
                </div>
            </div>
            <div data-src="<?php echo base_url();?>web-app/img/slides/products.png">
                <div class="camera_caption fadeFromBottom">
                    Venta de equipos especializados en generación recolecci&oacute;n de datos
                </div>
            </div>

            <div data-src="<?php echo base_url();?>web-app/img/slides/industries.png">
                <div class="camera_caption fadeFromBottom">
                    SYE DECODIFICACIONES para todo tipo industrias
                </div>
            </div

        </div>
	</div>


    <div class="sidebar" >
        <div class="bordersh">            
            <h2 class="separator">Productos</h2>
            <br/>
        <?php foreach ($list as $item): ?>
            <div class="item-prod-column">
                <a href="<?php echo base_url().'productos/info/'.$item['refCat'] ?>">
                    <h4 >
                        <?php
                            if($item['descripcion_publica'] != null){
                                echo $item['descripcion_publica'];
                            }else {
                                echo "sin descripcion_publica";
                            }
                        ?>
                    </h4>

                    <?php
                        $imagen ="";
                        if($item['img_dir'] != null){
                            $imagen= base_url().$item['img_dir'];
                        }else {
                            $imagen= base_url()."web-app/img/productos/noimg.png";
                        }
                    ?>
                    <img class="imgloader itemImg" src="<?php echo $imagen?>" data-alignment data-portrait/>
                </a>
            </div>
        <?php endforeach ?>
        </div>
    </div>

	<div class="p10-cl">
		<h1>SYE DECODIFICACIONES</h1>
        <!-- <h2>Desarrollo de aplicaciones a la medida</h2> -->

	</div>

    <div class="container-block p10" >
        <span>
             Dichos desarrollos estan orientados a la captura de datos mediante código de barras atravéz de terminales fijas, terminales móviles, lectores, etc.<br><br>
             Estos desarrollos ofrecen a su empresa la oportunidad de obtener una ventaja importante sobre su competencia mediante el uso de la tecnología de una forma mas efectiva y/o eficiente y no tiene que ser necesariamente costoso.<br><br>
             Estas soluciones pueden ser un buen método de reducción de cóstos, cooperando asi a mantener una ventaja competitiva consistente en el tiempo.<br><br>
             Es nuestro compromiso desarrollar sus proyectos con los mas altos estandares de calidad y tecnologías de vanguardia.<br>
        </span>
    </div>

</div>