<div>
  <?php foreach ($productos as $producto):?>  
    <div class="row">

      <div class="col-md-3" id="detalle-$produ">
        <a href="<?php echo base_url('/productos/detalle/'.$producto['NProducto']);?>">
          <img src="<?php echo base_url('web-app/img/productos/'.$producto['UrlImg'])?>" width="90%" alt=""/>
        </a>
      </div>

      <div class="col-md-8">  
        <a href="<?php echo base_url('/productos/detalle/'.$producto['NProducto']);?>"class="resultListDetalle">
          <p style="font-size: 20px; color: #020c46; font-weight: bold;">
            <?php echo $producto['Producto']?></p>
        </a>
        <p><?php echo $producto['Descripcion']?></p>  
      </div>

      <div class="col-md-1 text-right">  
        <a class="btn btn-sye" href="<?php echo base_url('/productos/detalle/'.$producto['NProducto']);?>" role="button">Detalle</a>
      </div>
    </div>
    <hr class="featurette-divider"> 
  <?php endforeach ?>

  <!--<div id="pagination" class="pagination">
    <?php echo isset($paginacion) ? $paginacion : '<a id="listar" class="btn" href="#">Lista</a>';?>
  </div>  -->
</div>