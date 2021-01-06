<hr class="featurette-divider"> 
<?php foreach ($detalle as $detalles):?>  
  <div id="Detalle-<?php $detalles['NProducto']?>" class="resultListDetalle container">
        <div class="row">
          <div class="col-md-3">
            <img src="<?php echo base_url('web-app/img/productos/'.$detalles['UrlImg'])?>" width="90%" alt=""/>
          </div>
          <div class="col-md-6">  
            <p style="font-size: 20px; color: #020c46; font-weight: bold;">
            <?php echo $detalles['Producto']?></p>
            <p><?php echo $detalles['Descripcion']?></p>
          </div>
          <div class="col-md-3">
            <button class="btn btn-sye col-md-12">Cotizar</button> 
          </div>
        </div>
        <?php endforeach ?>
        <hr class="featurette-divider"> 
        <h1 class="text-center"><strong> Características </strong></h1>
          <div class="row">
            <div class="col-md-3">
              <button class="btn btn-sye col-md-12">Documento 1</button>
              <br>
              <br>
              <button class="btn btn-sye col-md-12">Documento 2</button>
              <br>
              <br>
              <button class="btn btn-sye col-md-12">Documento 3</button>
              <br>
              <br>
              <button class="btn btn-sye col-md-12">Documento 4</button>
            </div>
            <div class="col-md-9">
              <table class="table table-bordered">
                  <body>
                    <?php foreach ($param as $parametro):?>  
                    <tr>
                      <th scope="row"><?php echo $parametro['Parametro']?></th>
                      <td scope="row"><?php echo $parametro['Valor']?></td>
                    </tr>
                    <?php endforeach ?>
                  </body>
                </table>
            </div>            
          </div>
    <hr class="featurette-divider"> 
  </div>