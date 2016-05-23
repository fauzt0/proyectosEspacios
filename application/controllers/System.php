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
		$logged_in = $this->session->userdata('logged_in');
		if( $logged_in== TRUE )
	  	{ 
	  		$this->starter();
	  	}else{
	  		$this->login();
	  	}
	}

	private function starter(){
		$logged_in = $this->session->userdata('logged_in');
		if( $logged_in== TRUE )
	  	{ 
	  		$permiso = $this->session->userdata('level');	
	  		$username = $this->session->userdata('username');	  		
	  		//cargamos vistas
	  		$data['username'] = $username;
	  		$data['permiso']  = $permiso;
	  		$this->load->view('headers/header3',$data);
			$this->load->view('asiders/asider3');
			$this->load->view('principals/loged');
			$this->load->view('footers/footer');


	  	}else{
	  		$this->login();	
	  	}
	}



	public function login(){
		$this->load->view('headers/header2');
		$this->load->view('asiders/asider2');
		$this->load->view('principals/log');
		$this->load->view('footers/footer');

	}

	public function checkin(){/*validacion de usuario*/		
		$usuario 	= $_POST['usuario'];//recibimos usuario
		$password	= $_POST['pass'];//recibimos cotraseña

		if($usuario !="" AND($password!="")){//validamos contraseña sin espacios en blano
			$data['usuario'] 	= $usuario;
			$data['contraseña'] = $password;

			$this->load->model('users_model');
			$result = $this->users_model->valida($data);
			if($result == '1'){//realizamos la conexion
				
				$this->user_info($data['usuario']);//llamamos a la funcion de informacion

			}else{
				$params['erro'] = $result;
				$this->load->view('headers/header2');
				$this->load->view('asiders/asider2',$params);
				$this->load->view('principals/log');
				$this->load->view('footers/footer');
			}
		}else{//espacios en blanco
			$params['erro'] = 2;
			$this->load->view('headers/header2');
			$this->load->view('asiders/asider2',$params);
			$this->load->view('principals/log');
			$this->load->view('footers/footer');
		}
	}


	private function user_info($usuario)
	{
		$this->load->model('users_model');//cargamos el modelo de usuarios 
		$result=$this->users_model->users_permiso($usuario);//llamamos a la funcion que nos regresa la informacion en array	
		/*Asignamos el permiso a una variable*/
		foreach ($result->result() as $row)
			{
				$permiso=$row->permiso;
				$nombre=$row->nombre;	
			}
		//echo "Permisos de usuario:";
		//echo $permiso;
		//echo $nombre;
		/*Iniciamos la sesión*/
	   $dato['username'] = $nombre;
	   $dato['permiso']	 =$permiso;
	    $newdata = array(
                   'username'  => $dato['username'], 
                   'level'	   => $dato['permiso'],                 
                   'logged_in' => TRUE
                   
               );
	   $this->session->set_userdata($newdata);//set the data and level of the user
	   $session_id 		= $this->session->userdata('username');
	   $session_permiso	= $this->session->userdata('level');	  
	   $session_logeado	= $this->session->userdata('logged_in');	  

	   if($session_logeado==TRUE)
	   {
	   	$this->starter();//si se inicia sesion, se manda a la página principal
	   }					
	}
/*funciones del sistema*/

	public function upload(){
		$logged_in = $this->session->userdata('logged_in');
		if( $logged_in== TRUE )
	  	{ 
	  		$permiso = $this->session->userdata('level');	
	  		$username = $this->session->userdata('username');	  		
	  		//cargamos vistas
	  		$data['username'] = $username;
	  		$data['permiso']  = $permiso;
	  		$this->load->view('headers/header3',$data);
			$this->load->view('asiders/asider3');
			$this->load->view('principals/upload');
			$this->load->view('footers/footer');


	  	}else{
	  		$this->index();	
	  	}

	}
/*Gestion de inbox*/

	public function sendmsg(){
		$logged_in = $this->session->userdata('logged_in');
		$permiso = $this->session->userdata('level');		  		
		if( $logged_in== TRUE AND($permiso=="1"))
	  	{ 
	  		$usuario = $_GET['usuario'];//usuario
	  		$mensaje = $_GET['mensaje'];//mensaje
	  		$envia	 = $this->session->userdata('username');//	  		
	  		if($mensaje!="" && $usuario!="" && $envia!="" ){//si van todos los campos llenos
	  			$this->load->model('herramientas');
	  			$data['usuario'] = $usuario;
	  			$data['mensaje'] = $mensaje;
	  			$data['envia'] 	 = $envia;

	  			$result = $this->herramientas->sendmsg($data);
	  			echo $result;
	  		}else{
	  			echo -1;
	  		}
	  	}
	}

	public function loadMessages(){
		$logged_in = $this->session->userdata('logged_in');		
		if( $logged_in== TRUE)
	  	{ 
	  		$username = $this->session->userdata('username');//nombre de usuario
	  		$this->load->model('herramientas');
	  		$mensajes = $this->herramientas->loadMessages($username);//array de mensajes	  			  		
	  		
		
	  		if($mensajes[0] > 0){//si tenemos mensajes
	  			$array[0] =1;//existe mensaje?
	  			$i=1;	  			
	  			
	  			foreach ($mensajes[1]->result() as $row) {
	  				$sender 		= $row->envia;	  							
	  				$mensajes		= $row->mensaje;
	  				$array[$i]		= $sender.":".$mensajes;
	  				$i++;	  				
	  			
	  			}
	  			
	  		}else{
				$array[0] =0;//no existe mensaje				
	  		}
	  		echo json_encode($array);

	  	}
	}


	public function clinbox(){
		$logged_in = $this->session->userdata('logged_in');		
		if( $logged_in== TRUE)
	  	{ 
	  		$username = $this->session->userdata('username');//nombre de usuario
	  		$this->load->model('herramientas');
	  		$result =$this->herramientas->clinbox($username);
	  		echo $result;
	  	}
	}

/*Gestion de usuarios*/

	public function adminusers(){//carga de vista
		$logged_in = $this->session->userdata('logged_in');
		$permiso = $this->session->userdata('level');		  		
		if( $logged_in== TRUE AND($permiso=="1"))
	  	{ 
	  		$username = $this->session->userdata('username');	  		
	  		//cargamos vistas
	  		$data['username'] = $username;
	  		$data['permiso']  = $permiso;
	  		$this->load->view('headers/header3',$data);
			$this->load->view('asiders/asider3');
			$this->load->view('principals/adminusers');
			$this->load->view('footers/footer');
	  	}else{
	  		$this->index();	
	  	}
	}

	public function newUser(){
		$logged_in = $this->session->userdata('logged_in');
		$permiso = $this->session->userdata('level');		  		
		if( $logged_in== TRUE AND($permiso=="1"))
	  	{ 
	  		//recibimos los datos
	  		$data['nombre'] 	= $_POST['nombre'];
	  		$data['usuario']	= $_POST['usuario'];
	  		$data['contraseña']	= $_POST['contraseña'];
	  		$data['tipo']		= $_POST['tipo'];//minimos
	  		$data['correo']		= $_POST['correo'];
	  		$data['pregunta']	= $_POST['pregunta'];
	  		$data['respuesta']	= $_POST['respuesta'];

	  		$this->load->model('users_model');
	  		$result = $this->users_model->newUser($data);
	  		echo $result;
	  	}
	}

	public function viewUsers(){
		$logged_in = $this->session->userdata('logged_in');
		$permiso = $this->session->userdata('level');		  		
		if( $logged_in== TRUE AND($permiso=="1"))
	  	{ 	
	  		$username = $this->session->userdata('username');	  		
	  		//cargamos vistas
	  		$data['username'] = $username;
	  		$data['permiso']  = $permiso;
	  		/*consulta a la tabla de usuarios*/
	  		$this->load->model('users_model');
	  		$data['dataUsuarios'] = $this->users_model->viewUsers();
	  		$this->load->view('headers/header3',$data);
			$this->load->view('asiders/asider3');
			$this->load->view('principals/viewusers');
			$this->load->view('footers/footer');
	  	}else{
	  		$this->index();
	  	}
	}

	public function deluser(){
		$logged_in = $this->session->userdata('logged_in');
		$permiso = $this->session->userdata('level');		  		
		if( $logged_in== TRUE AND($permiso=="1"))
	  	{ 	
			$usuario = $_GET['usuario'];
			$this->load->model('users_model');
			$result = $this->users_model->deluser($usuario);
			echo $result;
		}
	}


/*Cierre de sesion*/
	public function removeCache()
    {
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function close_session()
	{
		$logged_in = $this->session->userdata('logged_in');
	  	if( $logged_in== TRUE )
	  	{ 	
	  		$this->session->sess_destroy();
	  		$this->removeCache();	
	  		header("location:http://localhost/proyectos/proyectosEspacios/index.php/system/index");
	  	}
	  	else
	  	{
	  		$this->index();
	  	}
	  
	}




}