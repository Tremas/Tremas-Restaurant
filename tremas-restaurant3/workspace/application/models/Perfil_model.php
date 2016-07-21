<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Perfil_model class.
 * 
 * @extends CI_Model
 */
class Perfil_model extends CI_Model {

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
	
		public function elegir_usuario($username){
	    
    	    $query = $this->db->select('*')->from('usuarios')->where('username',$username)->get();
    		
    		if($query->num_rows() > 0) {
                $results = $query->result();
            }
	        return $results;
		}
		public function update_perfil($id,$username,$name,$lastname,$telefono, $email){
				$data = array(
					'username' => $username,
					'name' => $name,
					'lastname' => $lastname,
					'telefono' => $telefono,
					'email' => $email
	            );
        		$this->db->where('id', (int)$id);
        		$this->db->update('usuarios',$data);
        		return true;
    	}
    	
    	
    	public function select_password($username){
    	    $query = $this->db->select('password')->from('usuarios')->where('username',$username)->get();
    		
    		if($query->num_rows() > 0) {
                $results = $query->result();
            }
	        return $results;
    	    
    	}
    	
    	public function update_password($username,$password){//<-- id o username
    	    	$data = array(
					'password' => $password,
	            );
        		$this->db->where('username', $username);
        		if($this->db->update('usuarios',$data)){
        			return true;
        		}else{return false;}
    	}
    	
}
