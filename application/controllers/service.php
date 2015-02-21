<?php
require(APPPATH.'libraries/REST_Controller.php');
 
class Service extends REST_Controller
{

    function __construct()
    {
        // Construct our parent class
        parent::__construct();
         $this->load->model("emergencia_model");
          $this->load->model("usuario_model");
           $this->load->model("tservicio_model");
            $this->load->model("servicio_model");
        
       
        
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
    }
    


// -------------------INICIO DE SERVICIOS PARA LA EMERGENIAS-----------------------
    function emergencia_get()
    {
        
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->emergencia_model->get( $this->get('id') );
       
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    
    function emergencia_delete()
    {    
        $this->emergencia_model->delete( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        $this->response($message, 200); // 200 being the HTTP response code
      // $this->load->view('miview/header');
         //$dato ='hola';    
       // $this->load->view('miview/enviadoRest', $dato);
    }


    
    function emergencia_put()
    {
        $result = $this->emergencia_model->update( $this->uri->segment(4), 
        	array(
            'usid' => $data['usid'],
            'sid' => $data['sid'],
            'longitud' => $data['longitud'],
            'latitud' => $data['latitud'],
            'estado' => $data['estado'],
            'comentariou' => $data['comentariou'],
            'comentarios' => $data['comentarios'],
            'imagen' => $data['imagen'])

        );
         
        if($result === FALSE)
        {
         //   $this->response(array('status' => 'failed'));
            $this->response(FALSE);
        }
         
        else
        {
           // $this->response(array('status' => 'success'));
            $this->response(TRUE);
        }
         
    }

   
    function emergencia_post()
    {
        $result = $this->emergencia_model->add(array(
            'usid' => $this->post('usid'),
            'sid' => $this->post('sid'),
            'longitud' => $this->post('longitud'),
            'latitud' => $this->post('latitud'),
            'estado' => $this->post('estado'),
            'comentariou' => $this->post('comentariou'),
            'comentarios' => $this->post('comentarios'),
            'imagen' => $this->post('imagen')
        ));
         
       if($result === FALSE)
       {
            $this->response(0);
        }
         
        else
       {
           $this->response($this->db->insert_id());
       }
        
    }

 // transaccion

 //   function add_post($post_data) {
  //  $this->db->insert('posts',$post_data);
   // return $this->db->insert_id();
//}
   
     
    function emergencias_get()
    {
        $emergencias = $this->emergencia_model->listar();
         
        if($emergencias)
        {
            $this->response($emergencias, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
//////////--------------FIN DE LOS SERVICIOS EMERGENCIAS-------------------------------------/////////


// -------------------INICIO DE SERVICIOS PARA USUARIO -----------------------
    function usuario_get()
    {
        
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->usuario_model->get( $this->get('id') );
       
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    
    function usuario_delete()
    {    
        $this->usuario_model->delete( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        $this->response($message, 200); // 200 being the HTTP response code
      // $this->load->view('miview/header');
         //$dato ='hola';    
       // $this->load->view('miview/enviadoRest', $dato);
    }


    
    function usuario_put()
    {
        $result = $this->usuario_model->update( $this->uri->segment(4), 
           array(
            'usuario' => $data['usuario'],
            'telefono' => $data['telefono'],
            'domicilio' => $data['domicilio'],
            'comentario' => $data['comentario'])

        );
         
        if($result === FALSE)
        {
         //   $this->response(array('status' => 'failed'));
            $this->response(FALSE);
        }
         
        else
        {
           // $this->response(array('status' => 'success'));
            $this->response(TRUE);
        }
         
    }

   
    function usuario_post()
    {
        $result = $this->usuario_model->add(array(
            'usuario' => $this->post('usuario'),
            'telefono' => $this->post('telefono'),
            'domicilio' => $this->post('domicilio'),
            'comentario' => $this->post('comentario')
          ));
         
       if($result === FALSE)
       {
            $this->response(0);
        }
         
        else
       {
           $this->response($this->db->insert_id());
       }
        
    }

 // transaccion

 //   function add_post($post_data) {
  //  $this->db->insert('posts',$post_data);
   // return $this->db->insert_id();
//}
   
     
    function usuarios_get()
    {
        $emergencias = $this->usuario_model->listar();
         
        if($emergencias)
        {
            $this->response($emergencias, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }

//  ---------------------FIN DE USUARIO ----------------

// -------------------INICIO DE SERVICIOS PARA USUARIO -----------------------
    function tservicio_get()
    {
        
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->tservicio_model->get( $this->get('id') );
       
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    
    function tservicio_delete()
    {    
        $this->tservicio_model->delete( $this->get('id') );
        $message = array('tsid' => $this->get('id'), 'message' => 'DELETED!');
        $this->response($message, 200); // 200 being the HTTP response code
      // $this->load->view('miview/header');
         //$dato ='hola';    
       // $this->load->view('miview/enviadoRest', $dato);
    }


    
    function tservicio_put()
    {
        $result = $this->tservicio_model->update( $this->uri->segment(4), 
           array(
            'denominacion' => $data['denominacion']
            )

        );
         
        if($result === FALSE)
        {
         //   $this->response(array('status' => 'failed'));
            $this->response(FALSE);
        }
         
        else
        {
           // $this->response(array('status' => 'success'));
            $this->response(TRUE);
        }
         
    }

   
    function tservicio_post()
    {
        $result = $this->tservicio_model->add(array(
            'denominacion' => $this->post('denominacion')
            )
          );
         
       if($result === FALSE)
       {
            $this->response(0);
        }
         
        else
       {
           $this->response($this->db->insert_id());
       }
        
    }

 // transaccion

 //   function add_post($post_data) {
  //  $this->db->insert('posts',$post_data);
   // return $this->db->insert_id();
//}
   
     
    function tservicios_get()
    {
        $emergencias = $this->tservicio_model->listar();
         
        if($emergencias)
        {
            $this->response($emergencias, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }


// -------------------INICIO DE SERVICIOS PARA USUARIO -----------------------
    function servicio_get()
    {
        
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->servicio_model->get( $this->get('id') );
       
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    
    function servicio_delete()
    {    
        $this->tservicio_model->delete( $this->get('id') );
        $message = array('sid' => $this->get('id'), 'message' => 'DELETED!');
        $this->response($message, 200); // 200 being the HTTP response code
      // $this->load->view('miview/header');
         //$dato ='hola';    
       // $this->load->view('miview/enviadoRest', $dato);
    }


    
    function servicio_put()
    {
        $result = $this->servicio_model->update( $this->uri->segment(4), 
           array(
            'tsid' => $data['tsid'],
            'denominacion' => $data['denominacion'],
            'domicilio' => $data['domicilio'],
            'latitiud' => $data['latitiud'],
            'longitud' => $data['longitud'],
            'telefono' => $data['telefono']
            )

        );
         
        if($result === FALSE)
        {
         //   $this->response(array('status' => 'failed'));
            $this->response(FALSE);
        }
         
        else
        {
           // $this->response(array('status' => 'success'));
            $this->response(TRUE);
        }
         
    }

   
    function servicio_post()
    {
        $result = $this->servicio_model->add(array(
            'tsid' => $this->post('tsid'),
            'denominacion' =>  $this->post('denominacion'),
            'domicilio' =>  $this->post('domicilio'),
            'latitiud' =>  $this->post('latitiud'),
            'longitud' =>  $this->post('longitud'),
            'telefono' =>  $this->post('telefono')
            )
          );
         
       if($result === FALSE)
       {
            $this->response(0);
        }
         
        else
       {
           $this->response($this->db->insert_id());
       }
        
    }

 // transaccion

 //   function add_post($post_data) {
  //  $this->db->insert('posts',$post_data);
   // return $this->db->insert_id();
//}
   
     
    function servicios_get()
    {
        $emergencias = $this->servicio_model->listar();
         
        if($emergencias)
        {
            $this->response($emergencias, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }


}
?>