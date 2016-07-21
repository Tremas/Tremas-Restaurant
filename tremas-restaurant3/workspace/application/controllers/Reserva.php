<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reserva extends CI_Controller {
    
    	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('reserva_model');
		$this->load->library('table');
		
	}
	//añade reserva empleado
	public function add_reserva(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
			$data = new stdClass();
			
			$data5['query'] = $this->reserva_model->construct_select_empleado('user');
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha_numeric|min_length[4]');
			
			if ($this->form_validation->run() === false) {
				$this->load->view('header_empleado');
				$this->load->view('reserva/reserva/reserva', $data5);
				$this->load->view('footer');
				
			} else {
				
				$nombre = $this->input->post('nombre');
				$telefono = $this->input->post('telefono');
				$personas_max = $this->input->post('personas_max');
				$fecha = $this->input->post('fecha');
				$hora    = $this->input->post('hora');
				$id_usuario = $this->input->post('id_usuario');
				
				if($this->input->post('is_not_client')){
					$is_not_client=true;
				}else{
					$is_not_client=false;
				}
												
				if ($this->reserva_model-> create_reserva($nombre,$telefono,$personas_max,$fecha,$hora,$is_not_client ,$id_usuario) ) {
					$data2['query'] = $this->reserva_model->crear_tabla_reservas();
					$this->load->view('header_empleado');
					$this->load->view('reserva/reserva/reserva', $data5);
					$this->load->view('footer');
					$this->output->set_header('refresh:1; url='.base_url('mostrar_reserva'));
					
				} else {
					
					$data->error = 'There was a problem creating your new account. Please try again.';
					
					$this->load->view('header_empleado');
					$this->load->view('reserva/reserva/reserva', $data);
					$this->load->view('footer');
					
				}
			}
		} else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
			
			
		
			 
		}
	//añade reserva user
	public function add_reserva_user(){
		
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){
			$data = new stdClass();
			
			$data5['query'] = $this->reserva_model->construct_select_empleado('user');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha_numeric|min_length[4]');
			
			if ($this->form_validation->run() === false) {
				$this->load->view('header_user');
				$this->load->view('reserva/reserva_user/reserva', $data5);
				$this->load->view('footer');
				
			} else {
				
				$nombre = $this->input->post('nombre');
				$telefono = $this->input->post('telefono');
				$personas_max = $this->input->post('personas_max');
				$fecha = $this->input->post('fecha');
				$hora    = $this->input->post('hora');
				$is_not_client=0;
				$id_usuario = $this->input->post('id_usuario');
				
				if ($this->reserva_model-> create_reserva($nombre,$telefono,$personas_max,$fecha,$hora,$is_not_client ,$id_usuario) ) {
				
					$data2['query'] = $this->reserva_model->crear_tabla_reservas();
					$this->load->view('header_user');
					$this->load->view('reserva/reserva_user/reserva', $data5);
					$this->load->view('footer');
					$this->output->set_header('refresh:1; url='.base_url('mostrar_reserva_user'));
					
				} else {
					
					$data->error = 'Ha habido un problema al crear la cuenta. Porfavor intentalo de nuevo.';
					
					$this->load->view('header_user');
					$this->load->view('reserva/reserva_user/reserva', $data);
					$this->load->view('footer');
					
				}
			}
		} else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
		
	}
  
    public function mostrar_reserva(){
    	
    		if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
				
					$data2['query'] = $this->reserva_model->crear_tabla_reservas(); 
					
					$this->load->view('header_empleado');
					$this->load->view('reserva/tablereserva/tablereserva', $data2);
					$this->load->view('footer');
				
			} else {
				$this->output->set_header('refresh:0; url='.base_url());
			}
    	
    }
	public function modificar_reserva(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
				$data=new stdClass();
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[4]');
			
			
				
				if ($this->form_validation->run() === false) {
					if($this->input->post('idid')){
						$id = $this->input->post('idid');
					}elseif($this->input->post('ida')){
						$id = $this->input->post('ida');
					}else{	redirect('/mostrar_reserva');}
					$data2['query'] = $this->reserva_model->elegir_reserva($id);
					$this->load->view('header_empleado');
					$this->load->view('reserva/modificar_reserva/modificar_reserva', $data2);// falta  acabar de cambiar la direccion
					$this->load->view('footer');
					
				} else {
					
					$id = $this->input->post('ida');
					$nombre = $this->input->post('nombre');
					$telefono = $this->input->post('telefono');
					$personas_max = $this->input->post('personas_max');
					$fecha = $this->input->post('fecha');
					$hora = $this->input->post('hora');
					
					
					if ($this->reserva_model->update_reserva($id,$nombre,$telefono,$personas_max,$fecha,$hora)) {
						$this->output->set_header('refresh:0; url='.base_url('mostrar_reserva'));
					} else {
						
						$data->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';
						$this->load->view('header_empleado');
						$this->load->view('reserva/modificar_reserva/modificar_reserva', $data);
						$this->load->view('footer');
						
					}
				
				
				}
		}else if(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){
					
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[4]');
				
					
				if ($this->form_validation->run() === false) {
					
					if($this->input->post('idid')){
						$id = $this->input->post('idid');
					}elseif($this->input->post('ida')){
						$id = $this->input->post('ida');
					}else{	redirect('/mostrar_reserva_user');}
					$data2['query'] = $this->reserva_model->elegir_reserva($id);
					
					$this->load->view('header_user');
					$this->load->view('reserva/modificar_reserva/modificar_reserva', $data2);// falta  acabar de cambiar la direccion
					$this->load->view('footer');
					
				} else {
					
				
					$id = $this->input->post('ida');
					$nombre = $this->input->post('nombre');
					$telefono = $this->input->post('telefono');
					$personas_max = $this->input->post('personas_max');
					$fecha = $this->input->post('fecha');
					$hora = $this->input->post('hora');
					
					
					if ($this->reserva_model->update_reserva($id,$nombre,$telefono,$personas_max,$fecha,$hora)) {
						$this->output->set_header('refresh:0; url='.base_url('mostrar_reserva_user'));
					
					} else {
					$data=new stdClass();
					
					$data->error = 'Error al modificar la reserva. Prueba otra vez.';
					$id = $this->input->post('ida');
					$data2['query'] = $this->reserva_model->elegir_reserva($id);
					$this->load->view('header_empleado');
					$this->load->view('reserva/modificar_reserva/modificar_reserva', $data,$data2);
					$this->load->view('footer');
						
					}
				
				
				}
		}else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
		
	}
	
	public function borrar_reserva(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
			$id = $this->input->post('idid');
			$this->reserva_model->eliminar_reserva($id);
			$this->output->set_header('refresh:0; url='.base_url('mostrar_reserva'));
			$tipo = $this->input->post('tipo');
		
		}  elseif(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){
			$id = $this->input->post('idid');
			$this->reserva_model->eliminar_reserva($id);
			$this->output->set_header('refresh:0; url='.base_url('mostrar_reserva_user'));
			$tipo = $this->input->post('tipo');
		
		}else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
	}
	
	public function mostrar_reserva_user(){
		
			if(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){
				
				
					$data2['query'] = $this->reserva_model->crear_tabla_reservas_user($_SESSION['username']); 
					$this->load->view('header_user');
					$this->load->view('reserva/tablereserva/tablereserva', $data2);
					$this->load->view('footer');
				
			 }else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
	}
		
	
    
}