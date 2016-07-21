<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura_model extends CI_Model {
    
    
    	public function __construct() {
		
		parent::__construct();
		$this->load->database();
			
	}
	public function crear_tabla_factura(){
		$this->load->library('table');
		$query = $this->db->select('reserva.id_reserva, reserva.nombre, reserva.personas_max,reserva.fecha')->from('reserva')->join('lista_comandas', 'reserva.id_reserva=lista_comandas.id_reserva')->distinct()->or_where_not_in('pagado', 1)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}else{$results="";}
		
		return $results;
	
		
	}
	
	
	public function crear_tabla_factura_precio($id_reserva)	{
		$this->load->library('table');
		$query = $this->db->select('platos.nombre, platos.precio,lista_comandas.id_reserva,reserva.fecha')->from('platos')->join('lista_comandas', 'platos.id = lista_comandas.id_plato')->join('reserva', 'reserva.id_reserva=lista_comandas.id_reserva')->where('lista_comandas.id_reserva',$id_reserva)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}else{$results="";}
		
		return $results;
	}
	
	
	
	public function pagado($id_reserva){
		
		$data = array(
			'pagado'   => 1,
			
		
		);
		$this->db->where('id_reserva', (int)$id_reserva);
		$this->db->update('lista_comandas',$data);
		
		
	}
	

	
	public function insert_factura($id_reserva,$precio,$fecha){
		 
		 $data = array(
			'id_reserva'   				=> $id_reserva,
			'preu_total'				=>	$precio,
			'date'				=>	$fecha,
			
		
		);
		
		return $this->db->insert('factura', $data);//users cambiado a usuarios (tabla)
		
		 
		 
	 }
	 
 	public function crear_tabla_factura_admin()	{
		$this->load->library('table');
		$query = $this->db->select('id_reserva,preu_total,date')->from('factura')->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}else{$results="";}
		
		return $results;
	}
	

}