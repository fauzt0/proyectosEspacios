<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class herramientas extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function sendmsg($data){
    	extract($data);//usuario, mensaje, envia
    	$data = array(
                    'usuario'       => $usuario,                  
                    'mensaje'       => $mensaje,
                    'envia'			=> $envia
                );
    	$this->db->insert('mensajes', $data); 
        $afectado = $this->db->affected_rows();
        if($afectado>0){
        	return 1;
        }else{
        	return 0;
        }
    }

    public function loadMessages($username){
    	$ex = $this->getid($username);
		$this->db->select('*');
    	$this->db->from('mensajes');
    	$this->db->where('usuario',$ex);
    	$query = $this->db->get();
    	if($query->num_rows()>0){//si tenemos mensajes
    		$data[0] = 1;
    		$data[1] = $query;
    	}else{
			$data[0] = 0;
    	}
    	return $data;

    }

    public function clinbox($username){
    	$ex = $this->getid($username);
    	$this->db->delete('mensajes', array('usuario' => $ex)); 
        $result = $this->db->affected_rows();
        if($result>0){
            return 1;
        }else{
            return 0;
        }

    }

    private function getid($username){
    	$this->db->select('usuario');
    	$this->db->from('usuarios');
    	$this->db->where('nombre',$username);
    	$ax = $this->db->get();
    	foreach ($ax->result() as $row)
		{
			$ex = $row->usuario;
		}return $ex;
    }

}