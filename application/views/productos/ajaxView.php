<script>
  //Ejecuta el script cuando el doumento esta cargado
  $(document).ready(function(){
    $("#productsTable").load("<?php echo base_url("productos/lista")?>");
    //$("#productsUnits").load("<?php echo base_url("productos/unidades")?>");

    var clearValues = $('#clearValues');

    $(clearValues).click(function(){

      var filterValues = [];
      $('.checkbox').filter(':checked').each(function() {
        filterValues.push($(this));
      });

      $(".checkbox").prop("checked",false);
      $(".Param").prop("checked",false);

      if (filterValues.length > 0){
        $("#productsTable").load("<?php echo base_url("productos/lista")?>");
        clearValues.fadeOut(500);
        $("#dinamicBox").html('');
      }

    });

    //Escucha el click del checkbox y manda los valores seleccionados
    $(document).on("click", "#checkgroupProdu .checkbox", function(e){
      var filterValues = [];

      $('.checkbox').filter(':checked').each(function() {
        $(this).prop("checked", false);
      });

      $(this).prop("checked", true);

      filterValues.push($(this).attr('id').split("-")[1]);

      if(clearValues.css('display') == 'none'){
        clearValues.fadeIn(500);
      }


      if (filterValues == 'undefined' || filterValues.length == 0) {
        $("#productsTable").load("<?php echo base_url("productos/lista")?>");
        //$("#productsUnits").load("<?php echo base_url("productos/unidades")?>");
        return;
      }
  
      //Manda el post a listaCheckbox 
      $.ajax({
        url:'<?php echo base_url('productos/listaCheckbox')?>',
        type: 'POST',
        dataType:'html',
        data:{unidades: filterValues},
        async:true,
        success: function(data){
          $("#productsTable").html(data);
        }
      });

      //Manda el post a dinamicCheckbox 
      $.ajax({
        url:'<?php echo base_url('productos/dinamicCheckbox')?>',
        type: 'POST',
        dataType:'html',
        data:{tipoProdu: filterValues},
        async:true,
        success: function(data){
          $("#dinamicBox").html(data);
        }
      });
    });

    //Menu Dinamico de Valores y Parametros
    $(document).on("click", "#checkgroupParams .Param", function(e){
      var filterValuesParam = [];

      $('.Param').filter(':checked').each(function() { 
        var checkid = $(this).attr('id').split("_");
        var pValue = {
          Param : checkid[1], 
          Value : checkid[2],
        }
        filterValuesParam.push(pValue);
      });

      filterValuesParam;

      var _grupcheck; 

      $('.checkbox').filter(':checked').each(function() {
          _grupcheck = $(this);
      });

      var _grupVal = _grupcheck.attr('id').split("-")[1];

      //Manda el post a listaCheckbox 
      $.ajax({
        url:'<?php echo base_url('productos/filterByParamsValues')?>',
        type: 'POST',
        dataType:'html',
        data:{filters: filterValuesParam, grupVal: _grupVal},
        async:true,
        success: function(data){
          $("#productsTable").html(data);
        }
      });
    });

    //Buscador Catálogo de Etiquetas
    $('#searchForm').submit(function(e){
      var elementoABuscar = $('#txt_buscar').val();
      if(elementoABuscar != undefined && elementoABuscar !=''){
        jQuery.ajax({
          url:'<?php echo base_url('productos/buscar')?>',
          type: 'POST',
          dataType:'html',
          data:{busqueda: elementoABuscar},
          async:true,
          success: function(data){
            $("#productsTable").html(data);
          }
        });
      }
      return false;
    }); 

    //Boton hide y show de los parametros
    $(document).on("click", ".hideg", function(e){
      e.preventDefault();

      var grupo = $(this).attr('id').split("_")[1];

      $(".toggle_"+grupo).toggle(500);

      $(this).text($(this).text() == 'Mostrar Más...' ? 'Mostrar Menos...' : 'Mostrar Más...');      
    });

    //Boton que sube la pantalla
    var btt = $('.top');

    btt.on('click', function(e){
      $('html, body').animate({
        scrollTop: 0, 
      }, 1000);
      e.preventDefault();
    });

    $(window).on('scroll', function(){

      var self = $(this),
      height = self.height(),
      top = self.scrollTop();

      if(top > height){
        if(btt.css('display') == 'none'){
          btt.fadeIn(500);
        }
      }else{
          btt.fadeOut(500);
        }
      });
  });  
</script>

<?php
  if(isset($error)) echo '<div class="alert-error">'.$error.'</div>';
?>
<!-- Data Section -->
<div class="container" id="main">
  <br>
  <div class="container">
    <?php echo form_open('#',array('id' => 'searchForm'))?>
      <span><?php echo validation_errors(); ?></span>
      <div class="row">
        <div class="col-md-2">
          <h3>Productos</h3>
        </div>
        <div class="col-md-8">
              <input type="text" name="busqueda" id="txt_buscar" class="form-control "/>
        </div>
        <div class="col-md-2 text-right">
          <input type="submit" value="Buscar" id="btn-buscar"class="btn btn-sye"/>
        </div>
      </div>
    <?php echo form_close()?>
  </div>
  <br>
  <!-- estructura -->
  <div class="container" >
    <hr class="featurette-divider"/> 
    <div class="row">
      <div class="col-3">
        <!-- units -->
        <div id="checkgroup">
          <div id="checkgroupProdu">
            <div class="row ">
              <div class="col-1"><!-- Titulo -->
                <strong>
                  <p style="font-size: 20px; ">Grupo</p>
                </strong>
              </div>
            </div>
            <div class="row">        
                <div class="col-7"> 
                  <label>Etiquetas</label>
                </div>
                <div class="col-1" > 
                  <input type="checkbox" id="checkbox-ETI" class="checkbox" name="checkbox">
                </div>
            </div>
            <div class="row">        
                <div class="col-7"> 
                  <label>Ribbon</label>
                </div>
                <div class="col-1" > 
                  <input type="checkbox" id="checkbox-RIB" class="checkbox" name="checkbox">
                </div>
            </div>
            <div class="row">        
                <div class="col-7"> 
                  <label>Impresoras</label>
                </div>
                <div class="col-1" > 
                  <input type="checkbox" id="checkbox-IMP" class="checkbox" name="checkbox">
                </div>
            </div>
            <div class="row">        
              <div class="col-7"> 
                  <label>Terminales</label>
              </div>
              <div class="col-1" > 
                <input type="checkbox" id="checkbox-TER" class="checkbox" name="checkbox">
              </div>
            </div>
          </div>
            <a href="#" id="clearValues" class="btn btn-sye clear-values">Limpriar filtros</a>
            <hr class="featurette-divider">
            <!-- /units -->
            <div id="dinamicBox"></div>          
        </div>
      </div>
      <div class="col-8">
        <!-- productsTable -->
        <br>
        <br>
        <div id="productsTable"></div>
        <div id="resultList"></div>
        <div id="resultListDetalle"></div>
        <!-- /productsTable -->
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula tincidunt pretium. Nulla non iaculis tellus, ut viverra libero. Phasellus aliquet metus justo, non lacinia odio auctor a. Maecenas ultrices neque eu iaculis tincidunt. Phasellus fringilla, arcu nec bibendum eleifend, felis dolor semper dolor, eu porttitor felis enim eu libero. Ut tristique gravida augue a dictum. Sed dignissim orci in tincidunt pharetra.
        </p>
      </div>
    </div>
    <hr class="featurette-divider"> 
  </div>
  <a href="#" class="top btn btn-sye">Regresar</a>
  <!-- /estructura -->
</div>
