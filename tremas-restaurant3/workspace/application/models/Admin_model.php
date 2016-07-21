<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_model class.
 * 
 * @extends CI_Model
 */
class Admin_model extends CI_Model {

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
	public function create_user($username,$name,$lastname,$category,$telefono, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'name'		=>	$name,
			'lastname'	 =>	$lastname,
			'category'   => $category,
			'telefono'	 => $telefono,
			'email'      => $email,
			'password'   => md5($password),
			//'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('usuarios', $data);//users cambiado a usuarios (tabla)
		
	}
	public function update_user($id,$username,$name,$lastname,$category,$telefono, $email){
	
		$data = array(
				'username' => $username,
				'name' => $name,
				'lastname' => $lastname,
				'category'   => $category,
				'telefono' => $telefono,
				'email' => $email
	);
		$this->db->where('id', (int)$id);
		if($this->db->update('usuarios',$data)){
		return true;
		}else{return false;}
	}
	public function comprobar_usuario($username){
		
		$this->db->select('category');
		$this->db->from('usuarios');
		$this->db->where('username', $username);

		return $this->db->get()->row('category');
		
	}
	public function eliminar_usuario($id){
		
		$this->db->where('id', $id);
		$this->db->delete('usuarios'); 
		
	}
	
	public function elegir_usuario($id){
		$query = $this->db->select('*')->from('usuarios')->where('id',$id)->get();
		
		if($query->num_rows() > 0) {
        $results = $query->result();
    }
		return $results;
	
	}
	
	public function crear_tabla_usuario(){
		$this->load->library('table');

		$query = $this->db->select('*')->from('usuarios')->order_by("category", "asc")->get();
		if($query->num_rows() > 0) {
    	  $results = $query->result();
    	}
		return $results;
	}
	
	public function get_users_category($category){
	
		$this->load->library('table');

		$query = $this->db->select('*')->from('usuarios')->where('category', $category)->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		//	return $results;
		}
			return $results;
	}
	
}