<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_controller extends CI_Controller {

    function __construct() { 
        parent::__Construct();
        $this->load->library(array('form_validation','email','actions'));
        $this->load->helper(array('url','html'));

        //Activa la pesataña del menu de navecación
        $this->active[0] = '';
        $this->active[1] = '';
        $this->active[2] = '';
        $this->active[3] = '';
        $this->active[4] = '';
        $this->active[5] = 'active';

       }

function index(){
        
       $data['title'] = 'Formulario de Contacto'; 
       $data['msg'] = NULL;
       $data['view'] = "send_email";
       $data['active'] = $this->active;
      
       $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[3]');
       $this->form_validation->set_rules('phone', 'Celular', 'required');
       $this->form_validation->set_rules('address', 'Ciudad y dirección', 'required');
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
       $this->form_validation->set_rules('message', 'Mensaje', 'required');   
      
       $this->form_validation->set_message('required', 'el campo %s es requerido');
       $this->form_validation->set_message('valid_email', 'El email no es válido');
          
           $this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
      
       $this->form_validation->set_message('required', 'el campo %s es requerido');
       $this->form_validation->set_message('valid_email', 'El email no es válido');
          
           $this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
       
       
    if ($this->form_validation->run() == FALSE)
        {
            //$this->load->view('send_email', $data);  
            $this->actions->render($data);

           
            }else{
                       
            $name = $this->input->post('name');
            $mobil = $this->input->post('phone');
            $email = $this->input->post('email');
            $message = $this->input->post('message');
            $address = $this->input->post('address');
            

            $contacto = "<br/><br/><b>Datos de Contacto:</b><br/>Nombre: $name<br/>Teléfono: $mobil<br/>Email: $email<br/>dirección: $address<br/>";
                       
        // Datos para enviar el correo
            $this->email->from('appweb@sye.com.mx', 'Contacto Web');
            $this->email->to('solucionesyetiquetas@sye.com.mx,sistemas@sye.com.mx');
            $this->email->subject('sye.com.mx mail de contacto ' . date('d/m/Y H:i:s'));


            $order   = array("\r\n", "\n", "\r");
            $replace = '<br />';

            // Procesa primero \r\n así no es convertido dos veces.
            $message = str_replace($order, $replace, $message);


            $message .= $contacto;
$pos = strpos($message, "http://");

if($pos !== false){
 $data['title']='El mensaje no se pudo enviar por contener contenido inadecuado para el contacto';
                //$this->load->view('send_email', $data); 
                $this->actions->render($data);
}


            $this->email->message($message); 
           
            if($this->email->send()){
           
            $data['title']='Mensaje Enviado';
            $data['msg'] = 'Mensaje enviado a su email';
                     // echo $this->email->print_debugger(); exit;                             
            //$this->load->view('send_email', $data); 
            $this->actions->render($data);
           
             }else{
                $data['title']='El mensaje no se pudo enviar';
                //$this->load->view('send_email', $data); 
                $this->actions->render($data);
             
             } 
                         
           } 
        } 
    }