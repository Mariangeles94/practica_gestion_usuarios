<?php

class ManageUser {
    private $bd = null;
    private $tabla = "usuario";

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }

    function get($email) {
        //devuelve un objeto de la clase 
        $parametros = array();
        $parametros['email'] = $email;
        $this->bd->select($this->tabla, "*", "email=:email", $parametros);
        $fila = $this->bd->getRow();
        $user = new User();
        $user->set($fila);
        return $user;
    }

    function count($condicion = "1 = 1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

    function delete($email) {
        $parametros = array();
        $parametros['email'] = $email;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function deleteCities($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }

    function erase(User $user) {
        return $this->delete($user->getEmail());
    }

   function set(User $user, $pkemail){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametros =$user->getArray();
        $parametrosWhere = array();
        $parametrosWhere["email"]=$pkemail;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
   function setActivo($email,$activo){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametrosSet = array();
        $parametrosSet['activo'] = $activo;
        
        $parametrosWhere = array();
        $parametrosWhere["email"]=$email;
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
     function setClave($email,$clave){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametrosSet = array();
        $parametrosSet['clave'] = $clave;
        
        $parametrosWhere = array();
        $parametrosWhere["email"]=$email;
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(User $user) {
        $parametrosSet = array();
        $parametrosSet['email'] = $user->getEmail();
        $parametrosSet['clave'] = $user->getClave();
        $parametrosSet['alias'] = $user->getAlias();
        $parametrosSet['fechaAlta'] = $user->getFechaAlta();
        $parametrosSet['activo'] = $user->getActivo();
        $parametrosSet['administrador'] = $user->getAdministrador();
        $parametrosSet['personal'] = $user->getPersonal();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }

    function getList($pagina = 1, $order = "", $nrpp = Constant::NRPP, $condicion = "1=1", $parametros = array()) {
       
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$resgistroInicial, $nrpp"); /* limite va desde 1 y saca 10 registros */
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $user = new User();
            $user->set($fila);
            $r[] = $user;
        }
        return $r;
    }
     function getList2($pagina = 1, $nrpp = Constant::NRPP) {
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), "email", "$resgistroInicial, $nrpp"); /* limite va desde 1 y saca 10 registros */
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $user = new User();
            $user->set($fila);
            $r[] = $user;
        }
        return $r;
    }

    function getValuesSelectTodos() {
        $this->bd->query($this->tabla, "*", array());
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $user = new User();
            $user->set($fila);
            $array = $user;
           // $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    function getValuesSelectUsario() {
        $this->bd->query($this->tabla, "email, clave, alias", array(), "email");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    function getValuesSelectPersonal() {
        $this->bd->query($this->tabla, "clave, alias, fechaAlta", array(), "fechaAlta");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
}
