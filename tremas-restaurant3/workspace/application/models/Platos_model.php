<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Platos_model class.
 * 
 * @extends CI_Model
 */
class Platos_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}


    public function crear_tabla_platos(){
		$this->load->library('table');

		$query = $this->db->select('*')->from('platos')->order_by("tipo", "asc")->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}else{$results="";}
		return $results;
		
		
	}
	
	public function añadir_platos($nombre,$precio,$tipo){
		$data = array(
			'nombre'   => $nombre,
			'precio'	 =>	$precio,
			'tipo'   => $tipo,
		
		
		);
		
		return $this->db->insert('platos', $data);//users cambiado a usuarios (tabla)
		
		
	}
	
	public function update_platos($id,$nombre,$precio,$tipo){
		$data = array(
			'nombre'   => $nombre,
			'precio'	 =>	$precio,
			'tipo'   => $tipo,
		
			
		);
		$this->db->where('id', (int)$id);
		$this->db->update('platos',$data);
		return true;
		
		
	}
	
	public function elegir_platos($id) {
		
		$query = $this->db->select('*')->from('platos')->where('id',$id)->get();
		
		if($query->num_rows() > 0) {
    		 $results = $query->result();
    	}else $results="";
		return $results;
		
	}
	
	public function get_platos_category($tipo){
	
		$this->load->library('table');

		$query = $this->db->select('*')->from('platos')->where('tipo', $tipo)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		
		}
			return $results;
	}

	public function eliminar_platos($id){
		
		$this->db->where('id', $id);
		$this->db->delete('platos'); 
		
	}
	
}