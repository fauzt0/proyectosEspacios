<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->library('session');
            $this->load->helper('url');        
       }
	
	public function index()
	{
		echo 'Sistema de proyectos espacios en construccion';




	}
}