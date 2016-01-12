<?php
class QueryString {
    private $params;

    function __construct() {
        $this->params = $_GET;
    }

    function get($nombre) {//devuelve valor del elemento que le estoy pasando
        return $this->params[$nombre];
    }

    function getParamsWithout($parametrosDelete){//elimar parametros
        return $this->getParams(array(), $parametrosDelete);
    }

    function getParams($parametrosAdd = array(), $parametrosDelete = array()) {//Borra y añade parametros y me devuelve la cadena con esos parametros eliminados o añadidos
        $copia = $this->params;
        foreach ($parametrosDelete as $parametro => $valor) {
            unset($copia[$parametro]);
        }
        foreach ($parametrosAdd as $parametro => $valor){
            $copia[$parametro]= $valor;
        }
        $r="";
        foreach ($copia as $parametro => $valor) {
            $r.=$parametro."=".urldecode($valor)."&";
        }
        return substr($r, 0,-1);
    }

    function set($nombre, $valor) {//añade nuevos parametros
        $this->params[$nombre] = $this->params[$valor];
    }

    function delete($nombre) {//borrar elementos 
        unset($this->params[$nombre]);
        return $this->params;
    }

    function __toString() {//devolver una cadena para poder interpretarla en la url 
        //return $this->params;
    }

}


