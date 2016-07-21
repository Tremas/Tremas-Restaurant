<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Platos class.
 * 
 * @extends CI_Controller
 */
class Platos extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('platos_model');
		$this->load->library('table');
		
	}
	
	//funcion para mostrar los platos
	public function mostrar_platos(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			
				$tipo = $this->input->post('tipo');
				if($tipo =="todos" or $tipo==null){
					$data2['query'] = $this->platos_model->crear_tabla_platos(); 
				}else{
					$data2['query'] = $this->platos_model->get_platos_category($tipo);
				}
			
				$this->load->view('header_admin');
				$this->load->view('platos/tableplatos/tableplatos', $data2);
				$this->load->view('footer');
			
		}
		else{	$this->output->set_header('refresh:0; url='.base_url());}
}

   
//funcion para añadir los platos
	public function add_platos(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			
			$data = new stdClass();
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]|is_unique[platos.nombre]', array('is_unique' => 'Este plato ya existe. Porfavor elige otro.'));
			
			if ($this->form_validation->run() === false) {
				
				$this->load->view('header_admin');
				$this->load->view('platos/add_platos/register', $data);
				$this->load->view('footer');
				
			} else {
				
				$nombre = $this->input->post('nombre');
				$precio = $this->input->post('precio');
				$tipo = $this->input->post('tipo');
			
													
				if ($this->platos_model->añadir_platos($nombre,$precio,$tipo)) {
					
					header("Location: ".base_url()."mostrar_platos");
					die();
					
				} else {
					
					$data->error = 'There was a problem creating your new account. Please try again.';
					
					$this->load->view('header_admin');
					$this->load->view('user/add_platos/register', $data);
					$this->load->view('footer');
					
				}
			}
		} else {
				$this->output->set_header('refresh:0; url='.base_url());
		}
	}
//funcion para modificar los platos	
	public function modificar_platos(){
			if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			
				$this->load->helper('form');
				$this->load->library('form_validation');
			
				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]');
			
				
				if ($this->form_validation->run() === false) {
					if($this->input->post('idid')){
						$id = $this->input->post('idid');
					}elseif($this->input->post('ida')){
						$id = $this->input->post('ida');
					}else{	redirect('/mostrar_platos');}
					$data2['query'] = $this->platos_model->elegir_platos($id);
					$this->load->view('header_admin');
					$this->load->view('platos/modificar_platos/register', $data2);
					$this->load->view('footer');
					
				} else {
					
					// set variables from the form
					$ida = $this->input->post('ida');
					$nombre = $this->input->post('nombre');
					$stock = $this->input->post('stock');
					$precio = $this->input->post('precio');
					$tipo = $this->input->post('tipo');
					
					
					if ($this->platos_model->update_platos($ida,$nombre,$precio,$tipo)) {
						//$a= new stdClass();
						// user creation ok
					//echo"si update_platos";
					$this->mostrar_platos();
					$tipo = $this->input->post('tipo');	
					} else {
						//echo"no update_platos";
						// user creation failed, this should never happen
						/*$data->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';*/
						$id = $this->input->post('idid');
						$data2['query'] =$this->input->post('ida');
						// send error to the view
						$this->load->view('header_admin');
						$this->load->view('user/modificar_platos/register', $data2);
						$this->load->view('footer');
						
					}
				
				
				}
		} else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
		
	}
	//funcion para borrar los platos
	public function borrar_platos(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			$id = $this->input->post('idid');
			$this->platos_model->eliminar_platos($id);
			$this->output->set_header('refresh:0; url='.base_url('mostrar_platos'));	
		
	
		} else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
	}

}