<?php

/**
 * Description of Gactions
 *
 * @author Abraham Chan
 */

class Actions extends CI_Controller{
	
	private static $errorMessaje = array(
        1062 => "Se encontró un Id duplicado",
        //1265 => "Error en el formato de fecha",
        //1366
        0 => "Ocurrió un error al momento de procesar la solicitud"
    );
    
    public function render($data)
    {
        $view = $data['view'];
        
        //Manejo de mensajes de error
        if(isset($data['errorNum'])){
			if(isset(self::$errorMessaje[$data['errorNum']])){
				$data['error'] = self::$errorMessaje[$data['errorNum']];
			}else{
				$data['error'] = 'Ocurrió un error al momento de procesar la solicitud (error code '.$data['errorNum'].', error message '.$data['errorMessage'].')';
			}
		}
        
		$this->load->view('common/_head',$data);		
		$this->load->view($view,$data);
		/*if($this->centinela->getAuth()){
			$this->load->view($view,$data);
		}
		else{
			$this->load->view('Main/login');
		}*/
	
		$this->load->view('common/_footer');
		
    }
    
}
