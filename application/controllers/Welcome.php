<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	 public function __construct()
       {
            parent::__construct();
            // Your own constructor code        
       }
	
	public function index()
	{
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/welcome');
		$this->load->view('footers/footer');
	}



	public function servicios(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/servicios');
		$this->load->view('footers/footer');

	}


	public function clientes(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/clientes');
		$this->load->view('footers/footer');

	}


	public function director(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/ceo');
		$this->load->view('footers/footer');

	}

	public function objetivo(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/objetivo');
		$this->load->view('footers/footer');

	}






	public function galeria(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/galeria');
		$this->load->view('footers/footer');
	}


	public function contacto(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/contacto');
		$this->load->view('footers/footer');

	}

	public function mapsite(){
		$this->load->view('headers/header1');
		$this->load->view('asiders/asider1');
		$this->load->view('principals/mapadesitio');
		$this->load->view('footers/footer');
	}



}
