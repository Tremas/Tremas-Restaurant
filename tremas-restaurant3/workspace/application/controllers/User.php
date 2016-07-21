<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

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
		$this->load->model('user_model');
		$this->load->library('table');
		
	}

	
	
	public function register() {
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){ 	redirect('/');}
		elseif(isset($_SESSION['category']) && $_SESSION['category'] == 'user'){ 	redirect('/');}
		elseif(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){	redirect('/'); }
		
		$category2='user';
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[usuarios.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			$this->load->view('header');
			$this->load->view('user/register/register');
			$this->load->view('footer');
			
		} else {
			
			$username = $this->input->post('username');
			$name = $this->input->post('name');
			$lastname = $this->input->post('lastname');
			$telefono = $this->input->post('telefono');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
																														/*category2 esta con valor user*/
			if ($this->user_model->create_user($username,$name,$lastname,$category2,$telefono, $email, $password)) {
				
				$this->load->view('header');
				$this->load->view('user/register/register_success');
				$this->load->view('user/home/home');
				$this->load->view('footer');
				$this->output->set_header('refresh:5; url='.base_url());
				
			} else {
				
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				$this->load->view('header');
				$this->load->view('user/register/register');
				
				$this->load->view('user/home/home');
				$this->load->view('footer');
				
			}
			
		}
		
	}
	public function home() {
		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
			$this->load->view('header_admin');
			$this->load->view('user/home/home');
			$this->load->view('footer');
		} else if (isset($_SESSION['category']) && $_SESSION['category'] == 'empleado') {
			$this->load->view('header_empleado');
			$this->load->view('user/home/home');
			$this->load->view('footer');
		}else if (isset($_SESSION['category']) && $_SESSION['category'] == 'user') {
			$this->load->view('header_user');
			$this->load->view('user/home/home');
			$this->load->view('footer');
		} else {
			$this->load->view('header');
			$this->load->view('user/home/home');
			$this->load->view('footer');
		}
	}
	
	// public function mostrar_usuarios(){
	// 	if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 		//$id = $this->input->post('idid');
				
				
	// 			$category = $this->input->post('selectCategory');
	// 		//	var_dump($category);
	// 			if($category == null){
	// 					$data2['query'] = $this->user_model->crear_tabla_usuario();
					
	// 			}else if($category =="todos"){
				
	// 				$data2['query'] = $this->user_model->crear_tabla_usuario(); 
					
	// 			}else if($category !="todos"){
	// 			$data2['query'] = $this->user_model->get_users_category($category);
	// 							}
				
	// 			$this->load->view('header_admin');
	// 			//$this->load->view('user/login/login');
	// 			$this->load->view('user/tableuser/tableuser', $data2);
	// 			$this->load->view('footer');
			 
	// 	} else {
	// 		$this->output->set_header('refresh:0; url='.base_url());
	// 	}
		
	// }
	// public function add_empleado(){
	// 	if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 	$category2='empleado';
	// 	// create the data object
	// 	$data = new stdClass();
		
	// 	// load form helper and validation library
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');
		
	// 	// set validation rules
	// 	$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[usuarios.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
	// 	$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	// 	$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
	// 	if ($this->form_validation->run() === false) {
			
	// 		// validation not ok, send validation errors to the view
	// 		$this->load->view('header_admin');
	// 		$this->load->view('user/add_empleado/register', $data);
	// 		$this->load->view('footer');
			
	// 	} else {
			
	// 		// set variables from the form
	// 		$username = $this->input->post('username');
	// 		$name = $this->input->post('name');
	// 		$lastname = $this->input->post('lastname');
	// 		$telefono = $this->input->post('telefono');
	// 		$email    = $this->input->post('email');
	// 		$password = $this->input->post('password');
	// 												/*category2 esta con valor user*/
	// 		if ($this->user_model->create_user($username,$name,$lastname,$category2,$telefono, $email, $password)) {
	// 			$data2['query'] = $this->user_model->crear_tabla_usuario();
				
	// 			// user creation ok
	// 			$this->load->view('header_admin');
	// 			$this->load->view('user/add_empleado/register_success');
	// 			$this->load->view('user/tableuser/tableuser', $data2);
	// 			$this->load->view('footer');
				
	// 		} else {
				
	// 			// user creation failed, this should never happen
	// 			$data->error = 'There was a problem creating your new account. Please try again.';
				
	// 			// send error to the view
	// 			$this->load->view('header_admin');
	// 			$this->load->view('user/add_empleado/register', $data);
	// 			$this->load->view('footer');
				
	// 		}
	// 	}
	// 	} else {
	// 			$this->output->set_header('refresh:0; url='.base_url());
	// 	}
	// }
	
	
	// public function modificar_empleado(){
	// 		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 			//$data2=new stdClass();
	// 			$this->load->helper('form');
	// 			$this->load->library('form_validation');
				
	// 			//	var_dump($id);
					
	// 			// var_dump($data2);
	// 		//$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[usuarios.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
	// 		/*$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');*/
	// 		$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			
				
	// 		if ($this->form_validation->run() === false) {
	// 			$id = $this->input->post('idid');
	// 			$data2['query'] = $this->user_model->elegir_usuario($id);
	// 			// validation not ok, send validation errors to the view
	// 			$this->load->view('header_admin');
	// 			//$this->load->view('user/login/login');
	// 			$this->load->view('user/modificar_empleado/register', $data2);
	// 			$this->load->view('footer');
				
	// 		} else {
				
	// 			// set variables from the form
	// 			$ida = $this->input->post('ida');
	// 			$username = $this->input->post('username');
	// 			$name = $this->input->post('name');
	// 			$lastname = $this->input->post('lastname');
	// 			$category = $this->input->post('category');
	// 			$telefono = $this->input->post('telefono');
	// 			$email    = $this->input->post('email');
				
	// 			if ($this->user_model->update_user($ida,$username,$name,$lastname,$category,$telefono, $email)) {
	// 				//$a= new stdClass();
	// 				// user creation ok
	// 				$this->mostrar_usuarios();
	// 				$this->output->set_header('refresh:30; url='.base_url().'mostrar_usuarios');
					
	// 			} else {
					
	// 				// user creation failed, this should never happen
	// 				/*$data->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';*/
					
	// 				// send error to the view
	// 				$this->load->view('header_admin');
	// 				$this->load->view('user/modificar_empleados/register'/*, $data*/);
	// 				$this->load->view('footer');
					
	// 			}
			
			
	// 		}
	// 	} else {
	// 		$this->output->set_header('refresh:0; url='.base_url());
	// 	}
		
	// }
	
	// public function borrar_usuario(){
	// 	if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 		$id = $this->input->post('idid');
	// 		//echo $id;
	// 		$this->user_model->eliminar_usuario($id);
	// 		$data2['query'] = $this->user_model->crear_tabla_usuario(); 
	// 		$this->load->view('header_admin');
	// 		$this->load->view('user/tableuser/tableuser', $data2);
	// 		$this->load->view('footer');
				
	// 		/*$data2['query'] = $this->user_model->crear_tabla_usuario(); 
	// 		$this->load->view('header');
	// 		//$this->load->view('user/login/login');
	// 		$this->load->view('user/tableuser/tableuser', $data2);
	// 		$this->load->view('footer');
	// 	*/
	// 	} else {
	// 			$this->output->set_header('refresh:0; url='.base_url());
	// 	}
	// }
	
	// FALTA ADESARROLLAR
	// public function mostrar_platos(){
	// 		//$data2=new stdClass();
	// 		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
				
	// 				$tipo = $this->input->post('tipo');
	// 				if($tipo =="todos" or $tipo==null){
	// 					$data2['query'] = $this->user_model->crear_tabla_platos(); 
	// 				}else{
	// 					$data2['query'] = $this->user_model->get_platos_category($tipo);
	// 				}
				
	// 				//$data2['query'] = $this->user_model->crear_tabla_platos(); 
	// 				$this->load->view('header_admin');
	// 				//$this->load->view('user/login/login');
	// 				$this->load->view('user/tableplatos/tableplatos', $data2);
	// 				$this->load->view('footer');
				
	// 		}
	// 		else{	$this->output->set_header('refresh:0; url='.base_url());}
	// }
	
	// public function add_platos(){
	// 	if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 		//$category2='empleado';
	// 	// create the data object
	// 	$data = new stdClass();
		
	// 	// load form helper and validation library
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');
		
	// 	// set validation rules
	// 	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha_numeric|min_length[4]|is_unique[platos.nombre]', array('is_unique' => 'This username already exists. Please choose another one.'));
	// 	/*$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
	// 	$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	// 	$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');*/
		
	// 	if ($this->form_validation->run() === false) {
			
	// 		// validation not ok, send validation errors to the view
	// 		$this->load->view('header_admin');
	// 		$this->load->view('user/add_platos/register', $data);
	// 		$this->load->view('footer');
			
	// 	} else {
			
	// 		// set variables from the form
	// 		$nombre = $this->input->post('nombre');
	// 		$precio = $this->input->post('precio');
	// 		$tipo = $this->input->post('tipo');
		
	// 												/*category2 esta con valor user*/
	// 		if ($this->user_model->añadir_platos($nombre,$precio,$tipo)) {
				
	// 			// user creation ok
	// 			header("Location: ".base_url()."mostrar_platos");
	// 			die();
				
	// 		} else {
				
	// 			// user creation failed, this should never happen
	// 			$data->error = 'There was a problem creating your new account. Please try again.';
				
	// 			// send error to the view
	// 			$this->load->view('header_admin');
	// 			$this->load->view('user/add_platos/register', $data);
	// 			$this->load->view('footer');
				
	// 		}
	// 	}
	// 	} else {
	// 			$this->output->set_header('refresh:0; url='.base_url());
	// 	}
	// }
	
	// public function modificar_platos(){
	// 		if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 			//$data2=new stdClass();
	// 			$this->load->helper('form');
	// 			$this->load->library('form_validation');
				
	// 			//	var_dump($id);
					
	// 			// var_dump($data2);
	// 		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[4]');
	// 		/*$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');*/
	// 		//$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|max_length[9]');
			
				
	// 		if ($this->form_validation->run() === false) {
	// 			$id = $this->input->post('idid');
	// 			$data2['query'] = $this->user_model->elegir_platos($id);
	// 			// validation not ok, send validation errors to the view
	// 			$this->load->view('header_admin');
	// 			//$this->load->view('user/login/login');
	// 			$this->load->view('user/modificar_platos/register', $data2);
	// 			$this->load->view('footer');
				
	// 		} else {
				
	// 			// set variables from the form
	// 			$ida = $this->input->post('ida');
	// 			$nombre = $this->input->post('nombre');
	// 			$stock = $this->input->post('stock');
	// 			$precio = $this->input->post('precio');
	// 			$tipo = $this->input->post('tipo');
				
				
	// 			if ($this->user_model->update_platos($ida,$nombre,$precio,$tipo)) {
	// 				//$a= new stdClass();
	// 				// user creation ok
	// 			//echo"si update_platos";
	// 			$this->mostrar_platos();
	// 			$tipo = $this->input->post('tipo');	
	// 			} else {
	// 				//echo"no update_platos";
	// 				// user creation failed, this should never happen
	// 				/*$data->error = 'Error al modificar la cuenta del usuario. Prueba otra vez.';*/
					
	// 				// send error to the view
	// 			$this->load->view('header_admin');
	// 			$this->load->view('user/modificar_platos/register'/*, $data*/);
	// 				$this->load->view('footer');
					
	// 			}
			
			
	// 		}
	// 	} else {
	// 		$this->output->set_header('refresh:0; url='.base_url());
	// 	}
		
	// }
	
	// public function borrar_platos(){
	// 	if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
	// 		$id = $this->input->post('idid');
	// 		//echo $id;
	// 		$this->user_model->eliminar_platos($id);
				
	// 		//	$tipo = $this->output->post('tipo');
	// 			$this->mostrar_platos();
				
	// 		/*$data2['query'] = $this->user_model->crear_tabla_usuario(); 
 //     $this->load->view('header');
	// 		//$this->load->view('user/login/login');
	// 		$this->load->view('user/tableuser/tableuser', $data2);
	// 		$this->load->view('footer');
	// 	*/
	// 	} else {
	// 		$this->output->set_header('refresh:0; url='.base_url());
	// 	}
	// }
	
	
	public function login() {
		if(!isset($_SESSION['category'])){
			
				$data = new stdClass();
				
			
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
			if ($this->form_validation->run() == false) {
				
				$this->load->view('header');
				$this->load->view('user/login/login');
				$this->load->view('footer');
				
			} else {
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_user_login($username, $password)) {
					
					$user_id = $this->user_model->get_user_id_from_username($username);
					$user    = $this->user_model->get_user($username);
				
					$_SESSION['user_id']      = (int)$user->id;
					$_SESSION['username']     = (string)$user->username;
					$_SESSION['logged_in']    = (bool)true;
					$_SESSION['category'] 		= (string)$user->category;
			
					if($this->user_model->comprobar_usuario($username)=='admin'){
						$this->load->view('header_admin');
						$this->load->view('user/login/login_success', $data);
						
						$this->load->view('footer');
						
					}elseif($this->user_model->comprobar_usuario($username)=='user'){
						$this->load->view('header_user');
						$this->load->view('user/login/login_success', $data);
						
						$this->load->view('footer');
					
					}elseif($this->user_model->comprobar_usuario($username)=='empleado'){
						$this->load->view('header_empleado');
						$this->load->view('user/login/login_success', $data);
						
						$this->load->view('footer');
						
					}
					
			
					$this->output->set_header('refresh:2; url='.base_url());
				} else {
					$data->error = 'Usuario o contraseña incorrecto, intentelo de nuevo.';
					$this->load->view('header');
					$this->load->view('user/login/login', $data);
					$this->load->view('footer');
					
				}
					 
					
			}
			
		} else {
			$this->output->set_header('refresh:0; url='.base_url());
		}
				
	}
	
	
	
	
	
	public function logout(){
		
		
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}

			redirect('/');
		} else {
			
			redirect('/');
			 
		}
		
	}
	
	
}
