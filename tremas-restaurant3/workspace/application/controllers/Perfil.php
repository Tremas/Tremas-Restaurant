<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
    
    
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->helper('form');
		$this->load->model('perfil_model');
		$this->load->library('table');
		
	}
    //muestra el perfil
    public function mostrar_perfil(){
    
    	$this->load->helper('form');
		$this->load->library('form_validation');
		
        if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
        	$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			
				
			if ($this->form_validation->run() === false) {
			    $data2['query'] = $this->perfil_model->elegir_usuario($_SESSION['username']); 
        		$this->load->view('header_empleado');
				$this->load->view('perfil/perfil/perfil', $data2);
				$this->load->view('footer');
				
			} else {
				
			
				$ida = $this->input->post('ida');
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$lastname = $this->input->post('lastname');
				$telefono = $this->input->post('telefono');
				$email    = $this->input->post('email');
				
				if ($this->perfil_model->update_perfil($ida,$username,$name,$lastname,$telefono, $email)) {
					$this->load->view('header_empleado');
    				$this->load->view('perfil/perfil/perfil_success');
    				$this->load->view('footer');
					$this->output->set_header('refresh:5; url='.base_url().'perfil');
					
				} else {
					
					$data2->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';
					
					$this->load->view('header_empleado');
    				$this->load->view('perfil/perfil/perfil', $data2);
    				$this->load->view('footer');
					
				}
			
			
			}
	         
            
        }else if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
            
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			
				
			if ($this->form_validation->run() === false) {
			    $data2['query'] = $this->perfil_model->elegir_usuario($_SESSION['username']); 
        		
            	$this->load->view('header_admin');
				$this->load->view('perfil/perfil/perfil', $data2);
				$this->load->view('footer');
				
			} else {
				
				$ida = $this->input->post('ida');
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$lastname = $this->input->post('lastname');
				$telefono = $this->input->post('telefono');
				$email    = $this->input->post('email');
				
				if ($this->perfil_model->update_perfil($ida,$username,$name,$lastname,$telefono, $email)) {
					$this->load->view('header_admin');
    				$this->load->view('perfil/perfil/perfil_success');
    				$this->load->view('footer');
					$this->output->set_header('refresh:5; url='.base_url().'perfil');
					
				} else {
					
					$data2->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';
					
					$this->load->view('header_admin');
    				$this->load->view('perfil/perfil/perfil', $data2);
    				$this->load->view('footer');
					
				}
			
			
			}		
				
            
        }else if(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){
            
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			
				
			if ($this->form_validation->run() === false) {
			    $data2['query'] = $this->perfil_model->elegir_usuario($_SESSION['username']); 
        		
            	$this->load->view('header_user');
				$this->load->view('perfil/perfil/perfil', $data2);
				$this->load->view('footer');
				
			} else {
				
				$ida = $this->input->post('ida');
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$lastname = $this->input->post('lastname');
				$telefono = $this->input->post('telefono');
				$email    = $this->input->post('email');
				
				if ($this->perfil_model->update_perfil($ida,$username,$name,$lastname,$telefono, $email)) {
					$this->load->view('header_user');
    				$this->load->view('perfil/perfil/perfil_success');
    				$this->load->view('footer');
					$this->output->set_header('refresh:5; url='.base_url().'perfil');
					
				} else {
					
					$data2->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';
					
					$this->load->view('header_user');
    				$this->load->view('perfil/perfil/perfil', $data2);
    				$this->load->view('footer');
					
				}
			
			
			}
        }else {
			$this->output->set_header('refresh:0; url='.base_url());
	    	}
        
        
        
        
    }


	
    public function cambiar_password(){
        $this->load->helper('form');
		$this->load->library('form_validation');
        if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
        
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        if ($this->form_validation->run() === false) {
			    
        		
            	$this->load->view('header_empleado');
				$this->load->view('perfil/password/password');
				$this->load->view('footer');
				
			} else {
				$pass = $this->perfil_model->select_password($_SESSION['username']);
				
				$password_antic = $this->input->post('password_antic');
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				
			    if(md5($password_antic)===$pass[0]->password){
			        if($password===$password_confirm){
    			        if ($this->perfil_model->update_password($_SESSION['username'], md5($password))) {
    					
        				    $this->load->view('header_empleado');
            				$this->load->view('perfil/password/password_success');
            				$this->load->view('footer');
        					$this->output->set_header('refresh:5; url='.base_url().'change_password');
    					
    			    	} else {
    					
    				    	$data2->error = 'Error al modificar la contraseña del usuario. Prueba otra vez.';
        			
        					$this->load->view('header_empleado');
            				$this->load->view('perfil/password/password', $data2);
            				$this->load->view('footer');
    					
    			    	}
			        }else{
			            
			            $data2  = new stdClass;
    					$data2->error = 'Error, las contraseñas deben coincidir. Prueba otra vez.';
    					
    					$this->load->view('header_empleado');
        				$this->load->view('perfil/password/password', $data2);
        				$this->load->view('footer');
			            
			        }
			    }else{
			       		$data2  = new stdClass;
    					$data2->error = 'Error en la contraseña actual del usuario. Prueba otra vez.';
    					
    					$this->load->view('header_empleado');
        				$this->load->view('perfil/password/password', $data2);
        				$this->load->view('footer');
			    }
				
			
			
			
			}    
        }else if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
        
	        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	        if ($this->form_validation->run() === false) {
			    
        		
            	$this->load->view('header_admin');
				$this->load->view('perfil/password/password');
				$this->load->view('footer');
				
			} else {
				$pass = $this->perfil_model->select_password($_SESSION['username']);
				
				$password_antic = $this->input->post('password_antic');
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				
			    if(md5($password_antic)===$pass[0]->password){
			        if($password===$password_confirm){
    			        if ($this->perfil_model->update_password($_SESSION['username'], md5($password))) {
    					
        				    $this->load->view('header_admin');
            				$this->load->view('perfil/password/password_success');
            				$this->load->view('footer');
        					$this->output->set_header('refresh:5; url='.base_url().'change_password');
    					
    			    	} else {
    					
    				    	$data2->error = 'Error al modificar la contraseña del usuario. Prueba otra vez.';
        			
        					$this->load->view('header_admin');
            				$this->load->view('perfil/password/password', $data2);
            				$this->load->view('footer');
    					
    			    	}
			        }else{
			            
			            $data2  = new stdClass;
    					$data2->error = 'Error, las contraseñas deben coincidir. Prueba otra vez.';
    					
    					$this->load->view('header_admin');
        				$this->load->view('perfil/password/password', $data2);
        				$this->load->view('footer');
			            
			        }
			    }else{
			       		$data2  = new stdClass;
    					$data2->error = 'Error en la contraseña actual del usuario. Prueba otra vez.';
    					
    					$this->load->view('header_admin');
        				$this->load->view('perfil/password/password', $data2);
        				$this->load->view('footer');
			    }
				
			
			}   
            
        }else if(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){
        
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        	if ($this->form_validation->run() === false) {
			    
        		
            	$this->load->view('header_user');
				$this->load->view('perfil/password/password');
				$this->load->view('footer');
				
			} else {
				$pass = $this->perfil_model->select_password($_SESSION['username']);
				
				$password_antic = $this->input->post('password_antic');
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				
			    if(md5($password_antic)===$pass[0]->password){
			        if($password===$password_confirm){
    			        if ($this->perfil_model->update_password($_SESSION['username'], md5($password))) {
    					
        				    $this->load->view('header_user');
            				$this->load->view('perfil/password/password_success');
            				$this->load->view('footer');
        					$this->output->set_header('refresh:5; url='.base_url().'change_password');
    					
    			    	} else {
    					
    				    	$data2->error = 'Error al modificar la contraseña del usuario. Prueba otra vez.';
        			
        					$this->load->view('header_user');
            				$this->load->view('perfil/password/password', $data2);
            				$this->load->view('footer');
    					
    			    	}
			        }else{
			            
			            $data2  = new stdClass;
    					$data2->error = 'Error, las contraseñas deben coincidir. Prueba otra vez.';
    					
    					$this->load->view('header_user');
        				$this->load->view('perfil/password/password', $data2);
        				$this->load->view('footer');
			            
			        }
			    }else{
			    		$data2  = new stdClass;
    					$data2->error = 'Error en la contraseña actual del usuario. Prueba otra vez.';
    					
    					// send error to the view
    					$this->load->view('header_user');
        				$this->load->view('perfil/password/password', $data2);
        				$this->load->view('footer');
			    }
				
			
			
			
			}   
            
        }
        else{
        		$this->output->set_header('refresh:0; url='.base_url());
        	
        }
    }
}