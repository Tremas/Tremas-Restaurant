<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comanda extends CI_Controller {
    
    	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->helper('form');
		$this->load->model('comanda_model');
		$this->load->library('table');
		
	}
	//Funcion para la gestion de comanda
    public function mostrar_comanda(){
        
        if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
	        $this->load->view('header_empleado');
	        $reservi=$this->input->post('idid');
	        if(	$this->input->post('accion_post')=='insert_primer_plato'){
	        	$id_reser = $this->input->post('id_reservar');
	        	$valor = $this->input->post('primer_plato');
	        	$this->comanda_model-> insert_platos_comandas($id_reser,$valor);
	        	$data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($id_reser);
	       		$data2['query'] = $this->comanda_model-> construct_select_primer_plato($id_reser);
	       		$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($id_reser);
		 		$data2['query4'] = $this->comanda_model-> construct_select_postres($id_reser);
	       		$data2['query5'] = $this->comanda_model-> construct_select_bebidas($id_reser);
	       		$data2['query6'] = $this->comanda_model-> construct_select_complementos($id_reser);
	   			$data2['query7'] = $this->comanda_model-> select_comensals_totals($id_reser);
	       		$this->load->view('comanda/comanda/comanda',$data2);
	        	
	        }elseif($this->input->post('accion_post')=='insert_segundo_plato'){
	        	$id_reser = $this->input->post('id_reservar');
	        	$valor = $this->input->post('segundo_plato');
	        	$this->comanda_model-> insert_platos_comandas($id_reser,$valor);
	        	$data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($id_reser);
	       		$data2['query'] = $this->comanda_model-> construct_select_primer_plato($id_reser);
	       		$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($id_reser);
		 		$data2['query4'] = $this->comanda_model-> construct_select_postres($id_reser);
	       		$data2['query5'] = $this->comanda_model-> construct_select_bebidas($id_reser);
	       		$data2['query6'] = $this->comanda_model-> construct_select_complementos($id_reser);
	       		$data2['query7'] = $this->comanda_model-> select_comensals_totals($id_reser);
	       		$this->load->view('comanda/comanda/comanda',$data2);
	        
	        }elseif($this->input->post('accion_post')=='insert_postres'){
	        	$id_reser = $this->input->post('id_reservar');
	        	$valor = $this->input->post('postres');
	        	$this->comanda_model-> insert_platos_comandas($id_reser,$valor);
	        	$data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($id_reser);
	       		$data2['query'] = $this->comanda_model-> construct_select_primer_plato($id_reser);
	       		$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($id_reser);
		 		$data2['query4'] = $this->comanda_model-> construct_select_postres($id_reser);
	       		$data2['query5'] = $this->comanda_model-> construct_select_bebidas($id_reser);
	       		$data2['query6'] = $this->comanda_model-> construct_select_complementos($id_reser);
	       		$data2['query7'] = $this->comanda_model-> select_comensals_totals($id_reser);
	       		$data2['query7'] = $this->comanda_model-> select_comensals_totals($id_reser);
	       		$this->load->view('comanda/comanda/comanda',$data2);
	        }elseif($this->input->post('accion_post')=='insert_bebida'){
	        	$id_reser = $this->input->post('id_reservar');
	        	$valor = $this->input->post('bebidas');
	        	$this->comanda_model-> insert_platos_comandas($id_reser,$valor);
	        	$data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($id_reser);
	       		$data2['query'] = $this->comanda_model-> construct_select_primer_plato($id_reser);
	       		$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($id_reser);
		 		$data2['query4'] = $this->comanda_model-> construct_select_postres($id_reser);
	       		$data2['query5'] = $this->comanda_model-> construct_select_bebidas($id_reser);
	       		$data2['query6'] = $this->comanda_model-> construct_select_complementos($id_reser);
	       		$data2['query7'] = $this->comanda_model-> select_comensals_totals($id_reser);
	       		$this->load->view('comanda/comanda/comanda',$data2);
	        }elseif($this->input->post('accion_post')=='insert_complemento'){
	        	$id_reser = $this->input->post('id_reservar');
	        	$valor = $this->input->post('complementos');
	        	$this->comanda_model-> insert_platos_comandas($id_reser,$valor);
	        	$data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($id_reser);
	       		$data2['query'] = $this->comanda_model-> construct_select_primer_plato($id_reser);
	       		$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($id_reser);
		 		$data2['query4'] = $this->comanda_model-> construct_select_postres($id_reser);
	       		$data2['query5'] = $this->comanda_model-> construct_select_bebidas($id_reser);
	       		$data2['query6'] = $this->comanda_model-> construct_select_complementos($id_reser);
	   			$data2['query7'] = $this->comanda_model-> select_comensals_totals($id_reser);
	       		$this->load->view('comanda/comanda/comanda',$data2);
	        }
	       	elseif($this->input->post('delete_post')){
	       	
		       	$reservi=$this->input->post('delete_post');
		       	$reservi_comanda=$this->input->post('delete_post_comanda');
		       	$this->comanda_model-> eliminar_platos_reserva($reservi_comanda);
		       	$data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($reservi);
		       	$data2['query'] = $this->comanda_model-> construct_select_primer_plato($reservi);
		       	$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($reservi);
		       	$data2['query4'] = $this->comanda_model-> construct_select_postres($reservi);
		       	$data2['query5'] = $this->comanda_model-> construct_select_bebidas($reservi);
		       	$data2['query6'] = $this->comanda_model-> construct_select_complementos($reservi);
		       	$data2['query7'] = $this->comanda_model-> select_comensals_totals($reservi);
		       	$this->load->view('comanda/comanda/comanda',$data2); 
	       	}
	        elseif($this->input->post('idid')){
		        $data2['query2'] = $this->comanda_model-> crear_tabla_reservas2($reservi);
		       	$data2['query'] = $this->comanda_model-> construct_select_primer_plato($reservi);
		       	$data2['query3'] = $this->comanda_model-> construct_select_segon_plato($reservi);
		       	$data2['query4'] = $this->comanda_model-> construct_select_postres($reservi);
		       	$data2['query5'] = $this->comanda_model-> construct_select_bebidas($reservi);
		       	$data2['query6'] = $this->comanda_model-> construct_select_complementos($reservi);
		       	$data2['query7'] = $this->comanda_model-> select_comensals_totals($reservi);
		       	$this->load->view('comanda/comanda/comanda',$data2); }
	       	else{redirect('/comanda');}
        }else{
        	
        		$this->output->set_header('refresh:0; url='.base_url());
        	
        }
       	
        
    }
    //funcion para mostrar tabla de reservas relacionada con la comanda
    public function mostrar_reserva(){
    	
    	if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
				
				
				$data2['query'] = $this->comanda_model->crear_tabla_reservas(); 
				$this->load->view('header_empleado');
				$this->load->view('comanda/select_reserva/vista_reserva', $data2);
				$this->load->view('footer');
					
				
		}else{
			
				$this->output->set_header('refresh:0; url='.base_url());
		}
    	
    	
    }
	
}