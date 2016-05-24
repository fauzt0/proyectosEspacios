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

    public function getid($username){
    	$this->db->select('usuario');
    	$this->db->from('usuarios');
    	$this->db->where('nombre',$username);
    	$ax = $this->db->get();
    	foreach ($ax->result() as $row)
		{
			$ex = $row->usuario;
		}return $ex;
    }

/*funciones de verision*/


    public function history($data){
        extract($data);//showt//autor
        if($showt==0){//todos
            $this->db->select('nombre,extension,pseudo,bipseudo,fecha,descripcion,version,ruta,autor');
            $this->db->from("archivos");
            $query = $this->db->get();
        }else{//por autor
            //obtenemos su id de autor
            $autor = $this->getid($autor);
            $this->db->select('nombre,extension,pseudo,bipseudo,fecha,descripcion,version,ruta,autor');
            $this->db->from("archivos");
            $this->db->where('autor',$autor);
            $query = $this->db->get();
        }
        return $query;
    }

    public function upload($params){
        extract($params);//
        $data = array(
            'nombre'        =>$nombre,
            'extension'     =>$ext,            
            'pseudo'        =>$pseudo,
            'bipseudo'      =>$bipseudo,
            'fecha'         =>$fecha,
            'descripcion'   =>$descripcion,
            'version'       =>$version,
            'ruta'          =>$ruta,
            'autor'         =>$autor,
            'proyecto'      =>"nulo"
            );
        $this->db->insert('archivos',$data);
        $result = $this->db->affected_rows();
        if($result>0){
            return 1;
        }else{
            return 0;
        }
    }

    public function verision($pseudo){
        $this->db->select('id');
        $this->db->from('archivos');
        $this->db->where('bipseudo',$pseudo);
        $query= $this->db->get();
        if($query->num_rows()>0){//si tenemos nombre anteriores
            $vers = $this->lastVers($pseudo);  //obtenemos la version mas grande*/
            return $vers;
        }else{
            return 1
            ;
        }
        
    }

    private function lastVers($pseudo){
        $this->db->select_max('version');
        $this->db->from('archivos');
        $this->db->where('bipseudo',$pseudo);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $version = $row->version;
        }
        $version++;
        return $version;
    }



}
