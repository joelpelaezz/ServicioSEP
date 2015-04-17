
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapa extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Load the library
		$this->load->library('googlemaps');
		// Load our model
		$this->load->model("emergencia_model");

	}

	function index()
	{
	
		// Initialize the map, passing through any parameters
		$config['center']='San Salvador de jujuy, jujuy, argentina';
		$config['zoom'] = "auto";
		$config['cluster'] = TRUE;
		$this->googlemaps->initialize($config);
		
		// Obtengo las emergencias  from the database 
		$listEmergencia = $this->emergencia_model->listar();
		
		// loop para marcar todas la emergencias
		if ($listEmergencia != false) {
			foreach ($listEmergencia as $emergencia) {
			$marker = array();
			$marker['position'] = $emergencia->LATITUD.','.$emergencia->LONGITUD;
			  // LA PROPIEDAD DE LA TABLA TIENE QUE ESTAR EN MAY O MINUSC SEGUN COMO FUE ESCRITO EN LA BD
			$marker['infowindow_content']= $emergencia->EID;
			$this->googlemaps->add_marker($marker);
			}	

		}

		// Create the map
		$data = array();
		$data['map'] = $this->googlemaps->create_map();
		$data['datos'] = $this->emergencia_model->listar();
		// Load our view, passing through the map data
		$this->load->view('mapa', $data);
	}
}