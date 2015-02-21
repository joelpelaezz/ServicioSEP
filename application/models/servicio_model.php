<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio_model extends CI_Model {

 
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
    $this->db->insert('servicio',array(
            'tsid' => $data['tsid'],
            'denominacion' => $data['denominacion'],
            'domicilio' => $data['domicilio'],
            'latitiud' => $data['latitiud'],
            'longitud' => $data['longitud'],
            'telefono' => $data['telefono']
            )
    );
  }
  
  /**
   * 
   * @return lista todos los cursos cargados en la BD
   */
  function listar(){
      $query = $this->db->get('servicio');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
    
  }
  /**
   * 
   * @param type $idCurso identificador del curso
   * Obtiene el curso que posee el identificador pasaado como parametro
   */
  function get($idservicio){
      $this->db->where('sid',$idservicio);
      $query = $this->db->get('servicio');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
      
  }
 
   
 function update($idservicio,$data){
  
  $this->db->where('sid',$idservicio);
  $query = $this->db->update('servicio',$datos);

 }

 function delete($idservicio){
      $this->db->where('sid',$idservicio);
      $this->db->delete('servicio');
      
      
  }

}