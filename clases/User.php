<?php
class User {
    private $email, $clave, $alias, $fechaAlta, $activo, $administrador, $personal;
    
    //1º Constructor -> null
    function __construct($email = null, $clave = null, $alias = null, $fechaAlta = null, $activo = null, $administrador = null, $personal = null) {
        $this->email = $email;
        $this->clave = $clave;
        $this->alias = $alias;
        $this->fechaAlta = $fechaAlta;
        $this->activo = $activo;
        $this->administrador = $administrador;
        $this->personal = $personal;
    }
    //2º getter y setter
    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getAlias() {
        return $this->alias;
    }

    function getFechaAlta() {
        return $this->fechaAlta;
    }

    function getActivo() {
        return $this->activo;
    }

    function getAdministrador() {
        return $this->administrador;
    }

    function getPersonal() {
        return $this->personal;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }

    function setPersonal($personal) {
        $this->personal = $personal;
    }

    //3º getJson
    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    //4º set genérico  
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    public function getArray($valores = true){
        $array = array();
        foreach ($this as $key => $valor) {
            if($valores === true){
                $array[$key] = $valor;
            }else{
                $array[$key]=null;
            }
        }
        return $array;
    }
    function read(){
        foreach ($this as $key => $valor) {//leer de la interfaz de usuario q coincida con los valores de mi base de datos 
            $this->$key = Request::req($key);
        }
    }
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }

}
