<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tservicio_model extends CI_Model {

 
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
  	$this->db->insert('tservicio',array(
            'denominacion' => $data['denominacion']
             )
    );
  }
  
  /**
   * 
   * @return lista todos los cursos cargados en la BD
   */
  function listar(){
      $query = $this->db->get('tservicio');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
    
  }
  /**
   * 
   * @param type $idCurso identificador del curso
   * Obtiene el curso que posee el identificador pasaado como parametro
   */
  function get($idtservicio){
      $this->db->where('tsid',$idtservicio);
      $query = $this->db->get('tservicio');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
      
  }
 
   
 function update($idtservicio,$data){
  
  $this->db->where('tsid',$idtservicio);
  $query = $this->db->update('tservicio',$datos);

 }

 function delete($idtservicio){
      $this->db->where('tsid',$idtservicio);
      $this->db->delete('tservicio');
      
      
  }

}