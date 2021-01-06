<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terminales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		

		if (! isset ( $_SESSION )) {
			session_start ();
		}

		$this->load->model(array('productosModel'));
		$this->load->library(array('actions'));

		//Activa la pesataña del menu de navecación
		$this->active[0] = '';
		$this->active[1] = 'active';
		$this->active[2] = '';
		$this->active[3] = '';
		$this->active[4] = '';
		$this->active[5] = '';
	}
	
	/**
	 * Descripción general de la empresa
	 */
	public function index() {
		$data = array();
		$data['view'] = "productos/terminales";
		$data['active'] = $this->active;

		$data['list'] = $this->productosModel->showMainListTer();
		
		$this->actions->render($data);
		
	}
}


