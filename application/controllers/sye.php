<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sye extends CI_Controller {


	public function __construct()
    {
	    parent::__construct();
	    
	    if (! isset ( $_SESSION )) {
			session_start ();
		}

		$this->load->model(array('productosModel'));
		$this->load->library(array('actions'));
    }

    public function loadPage($title='VANCIUS´S MOVIES',$view='welcome_message')
    {
    	$data = array ();
		$data['view'] = "front/".$view;
		$data['title'] = $title." - VANCIUS";
		$this->actions->render($data);
    }

	public function index()
	{
		$data = array ();
		$data['title'] = "VANCIUS´S MOVIES";
		//$data = $data + $this->_basicData();
		$data['view'] = "welcome_message";
		
		$this->actions->render($data);
	}

		public function info()
	{		
		$this->load->view("productos/barcode/info");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */