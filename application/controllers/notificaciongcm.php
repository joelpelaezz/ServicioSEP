<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/GCMPushMessage.php');


class NotificacionGCM extends CI_Controller {

   function __construct()
	{
		parent::__construct();

		
		$this->load->view('home');
		$this->load->model("usuario_model");

	}
	
	public function index()
	{

		echo "No se envio nada...jeje";	
	}


// envia mensaje a todos los dispositivos del dispositivos

	public function sendAll()
	{

		// mensaje
		$msj = 'qeu haces mauu..  ';
		$usuarios = $this->usuario_model->listar();
		if ($usuarios){
			// envio la notificacion a todos los uusarios registrados
			foreach ($usuarios as $usuario ) {

				$idGCMUser = $usuario->IDGCM; // el atributo  debe ir con mayuscula xq en la bd esta asi

				// indico el key de la aplicacion
				$an = new GCMPushMessage('AIzaSyCJGgncqAh3-SNjw1adBIR74Qi_CsUXlnA');
						
				// indico los dispositivos que quiero enviar 
				//$an->setDevices('APA91bE0uGT3nZ9CpD0Pq8nAhcz2Mpk4kpxBsGNJKjJk6KXeR_Ssv5adQeBFhnnY0iL8qE7__lxJVym8BMiZvwUSfiDuCHVDALiqCghHIFwvU4cv3ccIVPhHA6905zDLEWK_lOvKCI5AWdV-hNfWpACUUmAmVWcEbA');
				$an->setDevices($idGCMUser);
		
				// indico el mje a enviar
				$response = $an->send($msj);
			}
		}
	}


// envia mensaje a todos los dispositivos cercanos segun la aplicacion.
	public function sendToCercanos()
	{

		// mensaje
		$msj = 'qeu haces mauu..  ';
		$usuarios = $this->usuario_model->listar();
		
		// envio la notificacion a todos los uusarios registrados
		foreach ($usuarios as $usuario ) {

			$idGCMUser = $usuario->IDGCM; // el atributo  debe ir con mayuscula xq en la bd esta asi

			// indico el key de la aplicacion
			$an = new GCMPushMessage('AIzaSyCJGgncqAh3-SNjw1adBIR74Qi_CsUXlnA');
					
			// indico los dispositivos que quiero enviar 
			//$an->setDevices('APA91bE0uGT3nZ9CpD0Pq8nAhcz2Mpk4kpxBsGNJKjJk6KXeR_Ssv5adQeBFhnnY0iL8qE7__lxJVym8BMiZvwUSfiDuCHVDALiqCghHIFwvU4cv3ccIVPhHA6905zDLEWK_lOvKCI5AWdV-hNfWpACUUmAmVWcEbA');
			$an->setDevices($idGCMUser);
	
			// indico el mje a enviar
			$response = $an->send($msj);
		}

	}



}
