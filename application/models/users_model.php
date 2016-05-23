<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function valida($params)
    {
    	extract($params);//usuario,contraseña
    	$val['serf']	= $usuario;
    	$val['nerf']	=$contraseña;
    	$result=$this->pactar($val);//array de usaer and pass
    	if($result['existe']==1)//si existe el usuario combrobamos pass
    	{
        	if($result['pass']==$contraseña){
    			$conected =1;//correcto
    		}else{
                $conected=-1;
            }//incorrecto
    	}
    	else
    	{
			$conected =0;//no existe el usuario
    	}
    	return $conected;
    }

    private function pactar($val)//handshake base de datos
    {
    	extract($val);//serf,nerf
    	$this->db->select('contraseña');
    	$this->db->from('usuarios');
    	$this->db->where('usuario',$serf);
    	$query=$this->db->get();//obtenemos nerf
    	if($query->num_rows()>0)//si existe el usuario
    	{
    		$result['existe']	=1;
    		foreach ($query->result() as $row) 
	    	{	    		
    			$passe 	= $row->contraseña;
	    	}
	    	if($passe==$nerf)
	    	{	
	    		$result['pass']=$passe;
	    	}else{ $result['pass']="ssfknasoifbaosfspeitghw39u4woidhgw9hg0isngq{itn9eihf0whg8ehe9hlgmwsmgorngpwerngeoinenhiortnhiethroithnepofngoierngiwobniwue@@@@@wklgnouierg65198h$$%&&//(/()(651984984984srgh498rh4eh-E_:RIAUSBFIUowenwieufhbwiuebfdg8wgvfevfiyevfwiefbwgbwuifbiebufwebfwemgipwnegoiwgeonwgow@@@@@ojgbeurbg864984984823986238956jsdhbfiysdbfbg@dher";}
	   	}
    	else
    	{	
    		$result['existe']		=0;
    		$result['pass']			="asoubf9osufbofb o9+we4g+9w4egq@@lfbwoeubfg___#%#$&$%/$";
    	}
    	return $result;
    }
    
	public function users_permiso($usuario)
	{
		$this->db->select('permiso,nombre');
		$this->db->from('usuarios');
		$this->db->where('usuario',$usuario);
		$result=$this->db->get();
		return $result;
	}
/*administracin de usuarios*/

    public function newUser($data){
        $logged_in = $this->session->userdata('logged_in');
        $permiso = $this->session->userdata('level');              
         if( $logged_in== TRUE AND($permiso=="1"))
        { 
            extract($data);//nombre,usuario,contraseña, correo, pregunta, respuesta, tipo
            //revizamos que no se tenga un usuario existente
            $existe = $this->userExist($usuario);
            if($existe==0){//agregamos al usuario
                $data = array(
                    'nombre'        => $nombre,
                    'usuario'       => $usuario,
                    'contraseña'    => $contraseña,
                    'permiso'       => $tipo,
                    'pregunta'      => $pregunta,
                    'respuesta'     => $respuesta,
                    'correo'        => $correo
                );
                $this->db->insert('usuarios', $data); 
                $afectado = $this->db->affected_rows();
                if($afectado > 0){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }
    }

    private function userExist($usuario){//verifica la existencia de un usuario
        $this->db->select('nombre');
        $this->db->from('usuarios');
        $this->db->where('usuario',$usuario);        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $existe = 1;//existe el usuario
        }else{
            $existe = 0;//no existe el usuario
        }
        return $existe;
    }

    public function viewUsers(){
        $this->db->select('nombre,usuario,permiso,correo');
        $this->db->from('usuarios');
        $query = $this->db->get();//
        if($query->num_rows() > 0){
            $data[0] =1;
            $data[1] =$query;//contienen el array de resultados
        }else{  //no se tienen resultados
            $data[0] =0;
        }
        return $data;
    }



    public function deluser($usuario){
        //eliminamos al usuario de la base
        $this->db->delete('mensajes', array('usuario' => $usuario)); 
        $this->db->delete('usuarios', array('usuario' => $usuario)); 
        $result = $this->db->affected_rows();
        if($result>0){
            return 1;
        }else{
            return 0;
        }
    }
}