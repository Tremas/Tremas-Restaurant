<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

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
	
	

	
	public function resolve_user_login($username, $password) {
	
		$this->db->select('password');
		$this->db->from('usuarios');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	

	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('usuarios');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	public function comprobar_usuario($username){
		
		$this->db->select('category');
		$this->db->from('usuarios');
		$this->db->where('username', $username);

		return $this->db->get()->row('category');
		
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
		
		);
		
		return $this->db->insert('usuarios', $data);//users cambiado a usuarios (tabla)
		
	}
	// public function eliminar_usuario($id){
		
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('usuarios'); 
		
	// }
	
	// public function elegir_usuario($id){
	// 	/*$this->db->select('*');
	// 	$this->db->from('usuarios');
	// 	$this->db->where('id', $id);*/
		
	// 	$query = $this->db->select('*')->from('usuarios')->where('id',$id)->get();
		
	// 	if($query->num_rows() > 0) {
 //       $results = $query->result();
 //   }
	// 	return $results;
	// 	/*$dades=array(
	// 		'id'=> $this->db->get()->row('id'),
	// 		'username'=>$this->db->get()->row('username'),
	// 		'name'=>$this->db->get()->row('name'),
	// 		'lastname'=>$this->db->get()->row('lastname'),
	// 		'category'=>$this->db->get()->row('category'),
	// 		'telefono'=>$this->db->get()->row('telefono'),
	// 		'emai'=>$this->db->get()->row('email')
	// 	);
	// 	return $dades;*/
	// }
	
	// public function crear_tabla_usuario(){
	// 	$this->load->library('table');

	// $query = $this->db->select('*')->from('usuarios')->order_by("category", "asc")->get();
	// if($query->num_rows() > 0) {
 //       $results = $query->result();
 //   }
	// 	return $results;
	// }
	// public function crear_tabla_platos(){
	// 	$this->load->library('table');

	// 	$query = $this->db->select('*')->from('platos')->order_by("tipo", "asc")->get();
	// 	if($query->num_rows() > 0) {
	// 		$results = $query->result();
	// 	}else{$results="";}
	// 	return $results;
	// 	//echo $this->table->generate($query);
		
	// }
	
	// public function añadir_platos($nombre,$precio,$tipo){
	// 	$data = array(
	// 		'nombre'   => $nombre,
	// 		'precio'	 =>	$precio,
	// 		'tipo'   => $tipo,
		
	// 		//'created_at' => date('Y-m-j H:i:s'),
	// 	);
		
	// 	return $this->db->insert('platos', $data);//users cambiado a usuarios (tabla)
		
		
	// }
	
	// public function update_platos($id,$nombre,$precio,$tipo){
	// 	$data = array(
	// 		'nombre'   => $nombre,
	// 		'precio'	 =>	$precio,
	// 		'tipo'   => $tipo,
		
	// 		//'created_at' => date('Y-m-j H:i:s'),
	// 	);
	// 	$this->db->where('id', (int)$id);
	// 	$this->db->update('platos',$data);
	// 	return true;
		
		
	// }
	
	// public function elegir_platos($id) {
		
	// 	$query = $this->db->select('*')->from('platos')->where('id',$id)->get();
		
	// 	if($query->num_rows() > 0) {
 //       $results = $query->result();
 //   }else $results="";
	// 	return $results;
		
	// }

	// public function eliminar_platos($id){
		
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('platos'); 
		
	// }

	public function get_user($user_id) {
		
		$this->db->from('usuarios');
		$this->db->where('username', $user_id);
		return $this->db->get()->row();
		
	}
	
	
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	

	private function verify_password_hash($password, $hash) {
		/*var_dump($hash);
		var_dump($password);
		var_dump(md5($password));*/
		if (md5($password)==$hash){return true;}else{return false;}
		//return password_verify($password, $hash);
		
	}
	
	

	
}
