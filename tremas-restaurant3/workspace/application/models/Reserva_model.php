<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_model extends CI_Model {
    
    
    	public function __construct() {
		
		parent::__construct();
		$this->load->database();
			
	}
    
	public function create_reserva($nombre,$telefono,$personas_max,$fecha,$hora, $is_not_client,$id_usuario) {
		
		$data = array(
			'nombre'   			=> $nombre,
			'telefono'			=>	$telefono,
			'personas_max'		=>	$personas_max,
			'fecha'  			=> $fecha,
			'hora'	 			=> $hora,
			'is_not_client'		=> $is_not_client,
			'id_usuario'      => $id_usuario,
			
			//'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('reserva', $data);//users cambiado a usuarios (tabla)
		
	} 
	 
    public function add_list_comanda($id_reserva,$id_plato){
		 
		 $data = array(
			'id_reserva'   				=> $id_reserva,
			'id_plato'				=>	$id_plato,
			
			
		
		);
		
		return $this->db->insert('lista_comandas', $data);//users cambiado a usuarios (tabla)
		
		 
		 
	 }
 	public function  construct_select_empleado($category){
	
		$data= $this->get_users_category($category);
		
		$cadena='';
		if( !empty($data) ) {
			$cadena .= '<select  name="id_usuario">';
			
			foreach($data as $row): 
				$cadena .= '<option value='. $row->id . '>'. $row->username . '</option>';
			endforeach;
			$cadena .= '</select>';
		}else{$cadena = "No hay usuarios";}
			
		return $cadena;
	}
	public function get_users_category($category){
	
		$this->load->library('table');

		$query = $this->db->select('*')->from('usuarios')->where('category', $category)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
			return $results;
		}
		
		
	}

    
    public function crear_tabla_reservas(){
		$this->load->library('table');
	$query = $this->db->select('reserva.id_reserva, reserva.nombre,reserva.telefono,reserva.hora,reserva.is_not_client, reserva.personas_max,reserva.fecha,usuarios.username')->from('reserva')->join('usuarios', 'reserva.id_usuario = usuarios.id')->join('lista_comandas', 'reserva.id_reserva=lista_comandas.id_reserva','left')->distinct()->where_not_in('pagado', 1)->or_where('id_comanda',null)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}else{$results="";}
		return $results;
		
    }
    
	public function elegir_reserva($id) {
		
		$query = $this->db->select('*')->from('reserva')->where('id_reserva',$id)->get();
		
		if($query->num_rows() > 0) {
            $results = $query->result();
         }else $results="";
	    	return $results;
	    	
	}
   

	public function update_reserva($id,$nombre,$telefono,$personas_max,$fecha,$hora){
		$data = array(
			'nombre'   => $nombre,
			'telefono'		=>	$telefono,
			'personas_max'	 =>	$personas_max,
			'fecha'   => $fecha,
			'hora'   => $hora,
			//'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_reserva', (int)$id);
		if($this->db->update('reserva',$data)){
			return true;
		}else{return false;}
		
	}
	
	public function eliminar_reserva($id){
		
		$this->db->where('id_reserva', $id);
		$this->db->delete('reserva'); 
		
	}
	
	
	public function crear_tabla_reservas_user($username){
		$this->load->library('table');
		$query = $this->db->select('reserva.id_reserva,reserva.nombre,reserva.telefono,reserva.personas_max,reserva.fecha,reserva.hora,usuarios.username')->from('reserva')->join('usuarios', 'reserva.id_usuario = usuarios.id')->where('usuarios.username',$username)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}else{$results="";}
		return $results;
		
    }


}