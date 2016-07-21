<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comanda_model extends CI_Model {
    
    
    	public function __construct() {
		
		parent::__construct();
		$this->load->database();
			
	}
	
 		public function crear_tabla_reservas(){
			$this->load->library('table');
			$query = $this->db->select('reserva.id_reserva, reserva.nombre, reserva.personas_max')->from('reserva')->join('lista_comandas', 'lista_comandas.id_reserva=reserva.id_reserva', 'left outer')->Distinct()->or_where_not_in('pagado', 1)->or_where('id_comanda',null)->get();
			if($query->num_rows() > 0) {
				$results = $query->result();
			}else{$results="";}
			return $results;
		
	
	  }
    
		public function crear_tabla_reservas2($reserva){
			$this->load->library('table');
			$query = $this->db->select('lista_comandas.id_comanda,lista_comandas.id_reserva, platos.nombre')->from('lista_comandas')->join('platos', 'lista_comandas.id_plato=platos.id')->where('id_reserva',$reserva)->get();
			if($query->num_rows() > 0) {
				$results = $query->result();
			}else{$results="";}
			return $results;
		
		 }
		public function select_name_primer_platos(){
			$plato='primer plato';
			$query = $this->db->select('*')->from('platos')->where('tipo',$plato)->get();	
				if($query->num_rows() > 0) {
			        $results = $query->result();
				 }
			return $results;
			}
		//contruct select||options
		public function  construct_select_primer_plato($reser){
		
			$data= $this->select_name_primer_platos();
			
		
			$cadena='';
			if( !empty($data) ) {
					$cadena .= '<input type="hidden" value="'.$reser.'" name="id_reservar" />';
				$cadena .= '<select  name="primer_plato">';
				
				foreach($data as $row): 
					$cadena .= '<option value='. $row->id . '>'. $row->nombre . '</option>';
				endforeach;
				$cadena .= '</select>';
			}else{$cadena = "No hay platos";}
				
			return $cadena;
		}
		
		public function select_name_segon_platos(){
			$plato='segundo plato';
			$query = $this->db->select('*')->from('platos')->where('tipo',$plato)->get();	
			if($query->num_rows() > 0) {
		        $results = $query->result();
			 }
			return $results;
		}
		
		public function  construct_select_segon_plato($reser){
		
			$data= $this->select_name_segon_platos();
			$cadena='';
			if( !empty($data) ) {
				$cadena .= '<input type="hidden" value="'.$reser.'" name="id_reservar" />';
				$cadena .= '<select  name="segundo_plato">';
				
				foreach($data as $row): 
					$cadena .= '<option value='. $row->id . '>'. $row->nombre . '</option>';
				endforeach;
				$cadena .= '</select>';
			}else{$cadena = "No hay platos";}
				
			return $cadena;
		}
		
		public function select_name_postres(){
			$plato='postre';
			$query = $this->db->select('*')->from('platos')->where('tipo',$plato)->get();	
			if($query->num_rows() > 0) {
		        $results = $query->result();
			 }
			return $results;
			}
		
		public function  construct_select_postres($reser){
		
			$data= $this->select_name_postres();
			$cadena='';
			if( !empty($data) ) {
				$cadena .= '<input type="hidden" value="'.$reser.'" name="id_reservar" />';
				$cadena .= '<select  name="postres">';
				foreach($data as $row): 
					$cadena .= '<option value='. $row->id . '>'. $row->nombre . '</option>';
				endforeach;
				$cadena .= '</select>';
			}else{$cadena = "No hay platos";}
				
			return $cadena;
		}
		public function select_name_bebidas(){
			$plato='bebida';
			$query = $this->db->select('*')->from('platos')->where('tipo',$plato)->get();	
			if($query->num_rows() > 0) {
		        $results = $query->result();
			 }
			return $results;
			}
		
		public function  construct_select_bebidas($reser){
		
			$data= $this->select_name_bebidas();
			$cadena='';
			if( !empty($data) ) {
				$cadena .= '<input type="hidden" value="'.$reser.'" name="id_reservar" />';
				$cadena .= '<select  name="bebidas">';
				foreach($data as $row): 
					$cadena .= '<option value='. $row->id . '>'. $row->nombre . '</option>';
				endforeach;
				$cadena .= '</select>';
			}else{$cadena = "No hay platos";}
				
			return $cadena;
		}
		public function select_name_complementos(){
			$plato='complementos';
			$query = $this->db->select('*')->from('platos')->where('tipo',$plato)->get();	
			if($query->num_rows() > 0) {
		        $results = $query->result();
			 }
			return $results;
			}
		
		public function  construct_select_complementos($reser){
		
			$data= $this->select_name_complementos();
			
			$cadena='';
			if( !empty($data) ) {
				$cadena .= '<input type="hidden" value="'.$reser.'" name="id_reservar" />';
				$cadena .= '<select  name="complementos">';
				foreach($data as $row): 
					$cadena .= '<option value='. $row->id . '>'. $row->nombre . '</option>';
				endforeach;
				$cadena .= '</select>';
			}else{$cadena = "No hay platos";}
				
			return $cadena;
		}
		
		public function insert_platos_comandas($id_reserva,$id_plato){
			$data = array(
					'id_reserva'   				=> $id_reserva,
					'id_plato'				=>	$id_plato,
					
					
				
				);
				
				return $this->db->insert('lista_comandas', $data);
			}
		
		public function eliminar_platos_reserva($id_comanda){
				
				$this->db->where('id_comanda',$id_comanda);
				$this->db->delete('lista_comandas'); 
			
			
		}
		public function select_comensals_totals($reserva){
			$query = $this->db->select('personas_max')->from('reserva')->where('id_reserva',$reserva)->get();	
			if($query->num_rows() > 0) {
		        $results = $query->result();
			 }
			return $results;
			}
			
		public function select_comanda(){
			$query = $this->db->select('personas_max')->from('reserva')->where('id_reserva',$reserva)->get();	
			if($query->num_rows() > 0) {
		        $results = $query->result();
			 }
			return $results;
			
			
		}
		
			
}

