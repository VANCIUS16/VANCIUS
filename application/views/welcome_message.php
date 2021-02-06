<script>
  jQuery(function(){
    jQuery('#camera_wrap_1').camera({
        height: '25%',
        //time: 2000,
        //transPeriod: 1000,
        playPause: false,
        pagination: false,
        navigation: false
    });
  });
</script>

<!--<script src="../jquery.js" type="text/javascript"></script>
<script>
   var posicion = 0;
   var imagenes = new Array();

   $(document).ready(function() {

     var numeroImatges = 4;
     if(numeroImatges<=3){
        $('.derecha_flecha').css('display','none');
        $('.izquierda_flecha').css('display','none');
      }

      $('.img_carrusel').live('click',function(){
         $('#bigimage').attr('src',$(this).attr('src'));
        return false;
      });

      $('.izquierda_flecha').live('click',function(){
        if(posicion>0){
          posicion = posicion-1;
        }else{
          posicion = numeroImatges-3;
        }

        $(".carrusel").animate({"left": -($('#imagen_'+posicion).position().left)}, 600);
          return false;
      });

      $('.izquierda_flecha').hover(function(){
        $(this).css('opacity','0.5');
      },function(){
        $(this).css('opacity','1');
      });

      $('.derecha_flecha').hover(function(){
        $(this).css('opacity','0.5');
      },function(){
        $(this).css('opacity','1');
      });

      $('.derecha_flecha').live('click',function(){
        if(numeroImatges>posicion+3){
          posicion = posicion+1;
        }else{
          posicion = 0;
        }

        $(".carrusel").animate({"left": -($('#imagen_'+posicion).position().left)}, 600);
          return false;
       });
   });
</script>-->

<div class="padding-menu" style="background: #230600;"></div>
<div class="container-fluid">
  <div class="row">
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
     <!--<div data-src="<?php echo base_url();?>web-app/img/fox_in_snow.jpg">
        <div class="camera_caption fadeFromBottom" style="background:  #0858f7">
          SYE DECODIFICACIONES Soluciones de recolecci&oacute;n de datos y movilidad
        </div>
      </div>-->
      <!--<div data-src="<?php echo base_url();?>web-app/img/huarache-divorciado.jpg">
        <div class="camera_caption fadeFromBottom" style="background:  #0858f7">
          Venta de equipos especializados en generación recolecci&oacute;n de datos
        </div>
      </div>-->
      <div data-src="<?php echo base_url();?>web-app/img/RedFox.jpeg">
        <!--<div class="camera_caption fadeFromBottom" style="background:  #0858f7">
          SYE DECODIFICACIONES para todo tipo industrias
        </div>-->
      </div>
    </div>
  </div>
</div>

<!--<div id="content">
    <img id="bigimage" src="<?php echo base_url('web-app/img/RedFox.jpeg');?>"/>
    <div id="carrusel">
        <a href="#"><img src="<?php echo base_url('web-app/img/ico/flecha_01.jpg');?>"/></a>
        <a href="#"><img src="<?php echo base_url('web-app/img/ico/flecha_02.jpg');?>"/></a>
        <div class="carrusel">
            <div id="imagen_0"><img class="img_carrusel" src="<?php echo base_url('web-app/img/RedFox.jpeg');?>" width="195px" height="100px" /></div>
            <div id="imagen_1"><img class="img_carrusel" src="<?php echo base_url('web-app/img/RedFox.jpeg');?>" width="195px" height="100px" /></div>
            <div id="imagen_2"><img class="img_carrusel" src="<?php echo base_url('web-app/img/RedFox.jpeg');?>" width="195px" height="100px" /></div>
            <div id="imagen_3"><img class="img_carrusel" src="<?php echo base_url('web-app/img/RedFox.jpeg');?>" width="195px" height="100px" /></div>
        </div>
    </div>
</div>-->

<div class=" marketing mainColor" style="background: #230600;">
  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4">
      <br>
      <img src="<?php echo base_url('web-app/img/nav/servicios1.jpg');?>" width="75%" alt="" />
      <div class="">
        <h2>Productos</h2>
        <p>Conoce nuestro catálogo de productos. Abarcamos todo lo que necesitas para construir una solución completa de optimización de tu proceso y mejora en tus almacenes</p>
        <p><a class="btn btn-sye" href="<?php echo base_url('productos');?>" role="button">Ver m&aacute;s</a></p>
      </div>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <br>
      <img src="<?php echo base_url('web-app/img/nav/servicios2.jpg');?>" width="90%" alt="" />
      <div class="">
        <h2>Servicios</h2>
        <p>Ofrecemos un servicio personalizado y especializado. Te acompañamos desde el nacimiento de tu proyecto hasta la implementación integral de tu idea.</p>
        <p><a class="btn btn-sye" href="<?php echo base_url('servicios');?>" role="button">Ver m&aacute;s</a></p>
      </div>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <br>
      <img src="<?php echo base_url('web-app/img/nav/soporte1.jpg');?>" width="80%" alt="" />
      <div class="">
        <h2>Soporte</h2>
        <p>Ofrecemos soporte de tus equipos de impresión y cómputo móvil, así como productos de software que requieras a lo largo de tu proceso</p>
        <p><a class="btn btn-sye" href="<?php echo base_url('soporte');?>" role="button">Ver m&aacute;s</a></p>
      </div>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Captura automática de datos </h2>
      <p class="">
          SYE DECODIFICACIONES es líder en la venta de equipo para la captura automática de datos. 
          Con el apoyo de nuestros asociados comerciales logramos que los negocios de nuestros clientes sean más eficientes en sus operaciones cotidianas.<br/><br/>
      Soluciones y Etiquetas maneja una amplia gama de productos para formar sistemas a las necesidades de cada cliente, puede integrar toda una solución con productos de las mejores marcas del mercado.</p>
    </div>
    <div class="col-md-5">
      <img src="<?php echo base_url('web-app/img/slides/1504210210792.jpg');?>" width="100%" alt="" />
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Servicio especializado</h2>
      <p class="">SYE DECODIFICACIONES ofrece un servicio especializado, a tal grado de acompañarte en todo tu proceso de integración, además de que contamos con personal certificado para el mantenimiento y reparación de sus equipos de impresión y cómputo móvil. Con nosotros tus equipos están totalmente respaldados.
      </p>
    </div>
    <div class="col-md-5 order-md-1">
      <img src="<?php echo base_url('web-app/img/slides/partner-nav.jpg');?>" width="100%" alt="" />
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Optimizaci&oacute;n de almacenes y procesos</h2>
      <p class="">SYE DECODIFICACIONES cuenta con la experiencia necesaria para poder optimizar el trabajo dentro de tus almacenes y sacar todo el provecho de tu personal operativo, brindando herramientas funcionales y fáciles de usar. Con SYE DECODIFICACIONES podrás explotar todo el potencial de tu almacén</p>
    </div>
    <div class="col-md-5">
      <img src="<?php echo base_url('web-app/img/slides/wh-img.jpg');?>" width="100%" alt="" />
    </div>
  </div>
  <br>
  <br>
  <!-- /END THE FEATURETTES -->
</div>
<!--<div>
  <img src="<?php echo base_url('web-app/img/slides/industries.png');?>" width="100%" alt="" />
</div>-->
  
  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.2217694692335!2d-103.45640258510858!3d20.660554686198886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ac7a68549ce7%3A0x8eb1cac05362fd65!2sSYE%20Decodificaciones%20S%20de%20RL%20de%20CV!5e0!3m2!1ses-419!2smx!4v1594676911170!5m2!1ses-419!2smx" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></iframe> -->