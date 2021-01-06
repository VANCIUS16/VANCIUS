<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		

		if (! isset ( $_SESSION )) {
			session_start ();
		}

		$this->load->library(array('actions'));
	}
	
	/**
	 * Descripción general de la empresa
	 */
	public function index() {
		$data = array ();
		$active[0] = '';
		$active[1] = '';
		$active[2] = '';
		$active[3] = '';
		$active[4] = 'active';
		$active[5] = '';
		//$data = $data + $this->_basicData();
		$data['view'] = "about/index";
		$data['active'] = $active;

		
		$this->actions->render($data);
		
	}
}
