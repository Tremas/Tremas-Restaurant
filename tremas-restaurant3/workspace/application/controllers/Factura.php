<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {
    
    	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->helper('form');
		$this->load->model('factura_model');
		$this->load->library('table');
		
	}
	//muestra la tabla de las reservas antes de la factura
        public function mostrar_factura(){
        	if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
                
                        $data2['query'] = $this->factura_model-> crear_tabla_factura();
        		$this->load->view('header_empleado');
                	$this->load->view('factura/select_reserva/vista_reserva_factura',$data2);
        	       	$this->load->view('footer');
        	}else{
        	       $this->output->set_header('refresh:0; url='.base_url());
        	        
        	}
        }
        //muetra la factura de la comanda
        public function mostrar_factura_comanda(){
        	if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado'){
        	        
                        
        	       	if($this->input->post('pagar')){
                	       	$reservi=$this->input->post('idid');
                	       	$this->factura_model-> pagado($reservi);
                	        $pagado=$this->input->post('pagar');
                	       	$fecha=$this->input->post('fecha');
                                $this->factura_model->insert_factura($reservi,$pagado,$fecha);
                	       	$data2['query'] = $this->factura_model-> crear_tabla_factura_precio($reservi);
                                $this->load->view('header_empleado');
                        	$this->load->view('factura/reserva_factu/vista_reserva_factura',$data2);
                	       	$this->load->view('footer');
                	       	$this->output->set_header('refresh:0; url='.base_url().'mostrar_factura_reserva');
                	       	
        	       	
        	       	}else{
        	       	    if($this->input->post('idid')){
                	       	$reservi=$this->input->post('idid'); 
        	       	        $data2['query'] = $this->factura_model-> crear_tabla_factura_precio($reservi);
                                $this->load->view('header_empleado');
                        	$this->load->view('factura/reserva_factu/vista_reserva_factura',$data2);
                	       	$this->load->view('footer');
        	       	    }else{redirect('/mostrar_factura_reserva');}
        	       	        
        	       	}
        	}
        	else{	$this->output->set_header('refresh:0; url='.base_url());}
        }
        //muestra la factura en admin
        public function mostrar_factura_admin(){
        	if(isset($_SESSION['category']) && $_SESSION['category'] == 'admin'){
                
                        $data2['query'] = $this->factura_model-> crear_tabla_factura_admin();
        		$this->load->view('header_admin');
                	$this->load->view('factura/factura_total_admin/vista_reserva_factura',$data2);
        	       	$this->load->view('footer');
        	}else{	$this->output->set_header('refresh:0; url='.base_url());}
        }
}