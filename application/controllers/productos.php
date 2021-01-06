<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		

		if (! isset ( $_SESSION )) {
			session_start ();
		}

		$this->load->model('ProductosModel');
		$this->load->library(array(/*'pagination',*/'actions'));
		$this->_pagination = 10;
	}

	/*private function _pagination($offset='') {

		//Parametros para paginacion
		$config['base_url'] = site_url('productos/lista');
		$config['total_rows'] = $this->db->get('productosGenerales')->num_rows();
		include(APPPATH.'controllers/common/gpag.php');
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}*/

	// Descripción general de la empresa	 
	public function index(){
	 	$data = array();
	 	$data['view'] = "productos/ajaxView";
	 	$this->actions->render($data);
	 }

	public function info($nparte){
		$data = array();
		$data['view'] = "productos/productos";

		$data['item'] = $this->actions->ProductosModel->getinfo($nparte);
		$data['npartes'] = $this->actions->ProductosModel->showNPartes($nparte);

		if($data['item'] == null){
			$data['item'] = new undefProd();
		}

		$this->actions->render($data);		
	}

	public function lista(){	

		$data['productos'] = $this->ProductosModel->topGeneral();
		//$data['unidades'] = $this->ProductosModel->unidadesGeneral();
		$this->load->view('productos/produLista',$data);
	}

	public function unidades(){
		/*$data['unidades'] 	 = $this->ProductosModel->SoloImp();
		$data['unidadesEti'] = $this->ProductosModel->SoloEti();
		$data['unidadesRib'] = $this->ProductosModel->SoloRib();
		$data['unidadesTer'] = $this->ProductosModel->SoloTer();*/
		$this->load->view('productos/produUnits');
	}

	public function listaCheckbox(){

		$unidades = $this->input->post('unidades');
		$strFilterIn = "";

		foreach ($unidades as $item){
			$pList = $this->ProductosModel->productosGenerales($item);
			
			foreach ($pList as $product){
				$data['productos'][] = $product;
			}
 		}
		$strFilterIn = substr($strFilterIn,0,-1);
		$this->load->view('productos/produLista',$data);
	}

	public function dinamicCheckbox(){	
		$tipoProdu = $this->input->post('tipoProdu');
		$strFilterIn = "";
		
		foreach ($tipoProdu as $dinamic){
			$dList = $this->ProductosModel->dinamicBox($dinamic);
		}

		$resultList= array();

		foreach ($dList as $param){
			$dValues = $this->ProductosModel->getValuesByParam($param['Parametros']);
			$resultList[$param['Parametros']] = $dValues;
		}

		$data['Parametros'] = $resultList;
		//$strFilterIn = substr($strFilterIn,0,-1);
		$this->load->view('productos/produUnits',$data);
	}

	public function dinamicValues(){
		$tipoProdu = $this->input->post('values');
		$strFilterIn = "";
		
		foreach ($tipoProdu as $dinamic){ 
			$dList = $this->ProductosModel->dinamicBox($dinamic);
			//$vList = $this->ProductosModel->dinamicBoxValues($dinamic);
		}
		$resultList= array();

		foreach ($dList as $param){
			//$dValues = $this->ProductosModel->getValuesByValues($param['Parametros']);
			$dValues = $this->ProductosModel->dinamicBoxValues($param['Parametros']);
			$resultList[$param['Parametros']] = $dValues;
		}

		$data['Parametros'] = $resultList;
		//$strFilterIn = substr($strFilterIn,0,-1);
		$this->load->view('productos/produUnits',$data);
	}

	public function filterByParamsValues(){

		$filters = $this->input->post('filters');
		$unidades = $this->input->post('grupVal');
		$Filters = isset($filters);

		if($Filters != empty($filters)){
			$p = $filters[0]['Param'];
			$v = "";
			$resultArray = array();
			foreach ($filters as $filter){ 
				if($p == $filter['Param']){
					$v .= "'".$filter['Value']."',";
				}else{
					$resultArray[$p] = substr($v, 0, -1);
					$v ="'".$filter['Value']."',";
					$p = $filter['Param'];
				}
	        }
	        $resultArray[$p] = substr($v, 0, -1);
	        
			$data['productos'] = $this->ProductosModel->getValuesByFilters($resultArray,$unidades);
			$this->load->view('productos/produLista',$data);
		}else{
			$data['productos'] = $this->ProductosModel->productosGenerales($unidades);
			$this->load->view('productos/produLista',$data);
		}
	}

	public function buscar(){
        $searchData = $this->input->post('busqueda');
        
		$data['productos'] = $this->ProductosModel->searchList($searchData);
		$this->load->view('productos/produLista',$data);
	}

	public function detalle($value) {
		$data = array();
		$data['view'] = 'productos/produDetalle';

		$data['detalle'] = $this->ProductosModel->produDetalle($value);
		$data['param'] = $this->ProductosModel->produParam($value);
		$this->actions->render($data);
	}
}

class undefProd {
	public function __construct()
	{
		$this->refCat = 'No Def';
	    $this->Titulo = "Indefinido";
	    $this->Contenido = 'No cuenta con descripci&oacute;n';
	    $this->Contenido_2 = 'No cuenta con descripci&oacute;n';
	    $this->img_dir = 'web-app/img/productos/noimg.png';
	}
}
	