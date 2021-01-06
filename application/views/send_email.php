<div class="padding-menu"></div>
<div style="text-align: center; font-size: 50px">
    <strong>
      <p>Contacto</p>
  </strong>
</div>
    <hr class="featurette-divider">
<div class="container">
<div class="row">
  <div class="col-lg-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.2217694692335!2d-103.45640258510858!3d20.660554686198886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ac7a68549ce7%3A0x8eb1cac05362fd65!2sSYE%20Decodificaciones%20S%20de%20RL%20de%20CV!5e0!3m2!1ses-419!2smx!4v1594676911170!5m2!1ses-419!2smx" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></iframe> 
  </div>

  <div class="col-lg-6">
   <div>
      <h1><?php echo $title;?></h1>
      <p>Rellene el formulario y un asesor se pondr&aacute; en contacto con usted.</p>

      <?php if(validation_errors()){ ?>
        <div id="error"><?php echo validation_errors();?></div>
      <?php  } // fin del if que evalua los errores del formulario

      $attributes = array('id' => 'form_email');
      
      if($msg===NULL){
            
        echo form_open('email_controller', $attributes);
             $name = array('name'=>'name', 'id'=>'name','placeholder'=>'Nombre','value'=>set_value('name'), 'required'=>'required','class'=>'form-control');
             $phone = array('name'=>'phone', 'id'=>'phone','placeholder'=>'Teléfono','value'=>set_value('phone'), 'size'=> '35', 'required'=>'required','class'=>'form-control');
             $address = array('name'=>'address','id'=>'address','placeholder'=>'Ciudad y dirección','value'=>set_value('address'), 'size'=> '35', 'required'=>'required','class'=>'form-control');
             $email = array('name'=>'email', 'id'=>'email','placeholder'=>'Email', 'value'=>set_value('email'), 'size'=> '35', 'required'=>'required','class'=>'form-control');  
             $message =array('name'=>'message', 'cols'=>'50', 'id'=>'message','placeholder'=>'Mensaje...','value'=>set_value('message'), 'required'=>'required','class'=>'form-control');
       ?> 
        <div><?php echo form_label('* Nombre');?></div>
                
        <div><?php echo form_input($name);?></div> 
        <div><?php echo form_label('* Teléfono');?></div>   
        <div><?php echo form_input($phone);?></div> 
        <div><?php echo form_label('* Direccción');?></div>  
        <div><?php echo form_input($address);?></div> 
        <div><?php echo form_label('* Email');?></div> 
        <div><?php echo form_input($email);?></div> 
        <div><?php echo form_label('* Mensaje');?></div>
        <div><?php echo form_textarea($message)?></div>
        <br>
        <div ><?php echo form_submit('submit', 'Enviar','class="btn btn-sye"');?> </div> 
      <?php echo form_close();?>  

      <?php }else
               { echo '<a href="'.base_url().'contacto">Enviar otro mensaje</a>
               <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
               <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
               <br/><br/>'; 
           }?>
    </div>
    <br>
    <br>
    <br>

    <!--
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.2217694692335!2d-103.45640258510858!3d20.660554686198886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ac7a68549ce7%3A0x8eb1cac05362fd65!2sSYE%20Decodificaciones%20S%20de%20RL%20de%20CV!5e0!3m2!1ses-419!2smx!4v1594676911170!5m2!1ses-419!2smx" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></iframe> 
    -->
 </div>
</div>
</div>
 
