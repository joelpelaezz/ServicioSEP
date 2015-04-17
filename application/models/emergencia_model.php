<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emergencia_model extends CI_Model {

  function __construct(){

  	parent:: __construct();
  	$this->load->database();
   
  }

  /**
   * 
   * @param type $data contendedor del curso
   * Agrega un curso 
   */
  function add($data){
  	$this->db->insert('emergencia',array(
            'usid' => $data['usid'],
            'sid' => $data['sid'],
            'longitud' => $data['longitud'],
            'latitud' => $data['latitud'],
            'estado' => $data['estado'],
            'comentariou' => $data['comentariou'],
            'comentarios' => $data['comentarios'],
           'imagen' => $data['imagen'],
           'fecha' =>  $data['fecha'],
            'hora' =>  $data['hora']
           )
            );
  }
  
  /**
   * 
   * @return lista todos los cursos cargados en la BD
   */
  function listar(){
      $query = $this->db->get('emergencia');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
    
  }


 /**
   * 
   * @return lista todos los cursos cargados en la BD
   */
  function listarByUser($usid){
      $this->db->where('usid',$usid);
      $query = $this->db->get('emergencia');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
    
  }



   /**
   * 
   * @return lista todos los cursos cargados en la BD
   */
  function listarP(){
      $retur= array();
      $query = $this->db->get('emergencia');
      if ($query->num_rows()>0){
        foreach ($query->result() as $row ) {
          # code...
          array_push($retur, $row);
        }

      }
    return $retur;
  }
  /**
   * 
   * @param type $idCurso identificador del curso
   * Obtiene el curso que posee el identificador pasaado como parametro
   */
  function get($idEmergencia){
      $this->db->where('eid',$idEmergencia);
      $query = $this->db->get('emergencia');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
      
  }
 
   
 function update($idEmergencia,$data){
   //$datos = array(
    //        'usid' => $data['usid'],
     //       'sid' => $data['sid'],
      //      'longitud' => $data['longitud'],
       //     'latitud' => $data['latitud'],
        //    'estado' => $data['estado'],
         //   'comentariou' => $data['comentariou'],
          //  'comentarios' => $data['comentarios'],
           // 'imagen' => $data['imagen']);
  $this->db->where('eid',$idEmergencia);
  $query = $this->db->update('emergencia',$datos);

 }

 function delete($idEmergencia){
      $this->db->where('eid',$idEmergencia);
      $this->db->delete('emergencia');
      
      
  }

}