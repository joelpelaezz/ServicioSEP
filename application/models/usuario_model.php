<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

 
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
  	$this->db->insert('usuario',array(
            'usuario' => $data['usuario'],
            'telefono' => $data['telefono'],
            'domicilio' => $data['domicilio'],
            'comentario' => $data['comentario']
            )
    );
  }
  
  /**
   * 
   * @return lista todos los cursos cargados en la BD
   */
  function listar(){
      $query = $this->db->get('usuario');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
    
  }
  /**
   * 
   * @param type $idCurso identificador del curso
   * Obtiene el curso que posee el identificador pasaado como parametro
   */
  function get($idUsuario){
      $this->db->where('usid',$idUsuario);
      $query = $this->db->get('usuario');
      if ($query->num_rows()>0)return $query->result(); 
      else false;    
      
  }
 
   
 function update($idUsuario,$data){
  
  $this->db->where('usid',$idUsuario);
  $query = $this->db->update('usuario',$datos);

 }

 function delete($idUsuario){
      $this->db->where('usid',$idUsuario);
      $this->db->delete('usuario');
      
      
  }

}