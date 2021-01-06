<div id="checkgroupParams">
  	<?php foreach ($Parametros as $key => $param):?>  
  		<div class="row ">
			<div class="col-1"><!-- Titulo -->
			<strong>
				<p style="font-size: 20px; "><?php echo $key?></p>
			</strong>
			</div>
		</div>
		
		<?php
			$i = 0;
			$display="";
			$groupClass="";
			foreach ($param as $param):
				if($i> 7){
					$display = 'style="display:none;"';
					$groupClass = "toggle_".$key;
				}$i++;?>
		
			<div class="row group_<?php echo $key.' '.$groupClass;?>"<?php echo $display; ?>>
				<div class="col-7"> 
					<label><?php echo $param['Valor']?></label>
				</div>
				<div class="col-1" > 
					<input type="checkbox" id="Param_<?php echo $key?>_<?php echo $param['Valor']?>"
						class="Param" name="Param">
				</div>
			</div>
		<?php endforeach ?> 
		
		<div>
			<?php if($i > 6) {?>
            <a class="hideg" id="hide_<?php echo $key?>" href="#">Mostrar Más...</a>
        <?php } ?>
		</div>
		<hr class="featurette-divider">
	<?php endforeach ?>
</div>

	<!--<?php foreach ($unidades as $unidad):?>  
		<div class="row">        
		  <div class="col-7"> 
		    <label><?php echo $unidad['unidades']?></label>   
		  </div>
		  <div class="col-1" > 
		    <input type="checkbox" id="checkbox-<?php echo $unidad['clsId']?>"
	    		class="checkbox" name="checkbox">
		  </div>
		</div>
	<?php endforeach ?> -->