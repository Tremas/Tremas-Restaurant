<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin class.
 * 
 * @extends CI_Controller
 */
class Admin extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		//$this->load->driver('Session');
		$this->load->helper(array('url'));
		$this->load->model('admin_model');
		$this->load->library('table');
		
	}
	//funcion para mostrar usuarios
	public function mostrar_usuarios(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
		
				$category = $this->input->post('selectCategory');
				if($category == null){
					$data2['query'] = $this->admin_model->crear_tabla_usuario();
				}else if($category =="todos"){
					$data2['query'] = $this->admin_model->crear_tabla_usuario(); 
				}else if($category !="todos"){
					$data2['query'] = $this->admin_model->get_users_category($category);
				}
				
				$this->load->view('header_admin');
				$this->load->view('admin/tableuser/tableuser', $data2);
				$this->load->view('footer');
			 
		} else {
				$this->output->set_header('refresh:0; url='.base_url());
		}
		
	}
	//funcion para añadir empleado
	public function add_empleado(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			$category2='empleado';
			$data = new stdClass();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[usuarios.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
			$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			
			if ($this->form_validation->run() === false) {
				//Si no ha validacion (al cargar la pagina)
				$this->load->view('header_admin');
				$this->load->view('admin/add_empleado/register', $data);
				$this->load->view('footer');
				
			} else {
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$lastname = $this->input->post('lastname');
				$telefono = $this->input->post('telefono');
				$email    = $this->input->post('email');
				$password = $this->input->post('password');
													
				if ($this->admin_model->create_user($username,$name,$lastname,$category2,$telefono, $email, $password)) {
					$data2['query'] = $this->admin_model->crear_tabla_usuario();
					$this->load->view('header_admin');
					$this->load->view('admin/add_empleado/register_success');
					$this->load->view('admin/tableuser/tableuser', $data2);
					$this->load->view('footer');
					
				} else {
					
					$data->error = 'There was a problem creating your new account. Please try again.';
					$this->load->view('header_admin');
					$this->load->view('admin/add_empleado/register', $data);
					$this->load->view('footer');
					
				}
			}
		} else {
				$this->output->set_header('refresh:0; url='.base_url());
		}
	}
	
	//funcion para modificar empleado
	public function modificar_empleado(){
		
			if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			
				
				if ($this->form_validation->run() === false) {
					if($this->input->post('idid')){
						$id = $this->input->post('idid');
					}elseif($this->input->post('ida')){
						$id = $this->input->post('ida');
					}else{	redirect('/mostrar_usuarios');}
					$data2['query'] = $this->admin_model->elegir_usuario($id);
					$this->load->view('header_admin');
					$this->load->view('admin/modificar_empleado/register', $data2);
					$this->load->view('footer');
					
				} else {
					
					// set variables from the form
					$ida = $this->input->post('ida');
					$username = $this->input->post('username');
					$name = $this->input->post('name');
					$lastname = $this->input->post('lastname');
					$category = $this->input->post('category');
					$telefono = $this->input->post('telefono');
					$email    = $this->input->post('email');
					
					if ($this->admin_model->update_user($ida,$username,$name,$lastname,$category,$telefono, $email)) {
						
						$this->output->set_header('refresh:0; url='.base_url().'mostrar_usuarios');
						
					} else {
						$data=new stdClass();
						$data->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';
						$this->load->view('header_admin');
						$this->load->view('admin/modificar_empleados/register', $data);
						$this->load->view('footer');
						
					}
				
				
				}
			} else {
				$this->output->set_header('refresh:0; url='.base_url());
			}
		
	}
	
	public function borrar_usuario(){
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			$id = $this->input->post('idid');
			$this->admin_model->eliminar_usuario($id);
			$data2['query'] = $this->admin_model->crear_tabla_usuario(); 
			$this->load->view('header_admin');
			$this->load->view('admin/tableuser/tableuser', $data2);
			$this->load->view('footer');
				
			
		} else {
				$this->output->set_header('refresh:0; url='.base_url());
		}
	}
	
}