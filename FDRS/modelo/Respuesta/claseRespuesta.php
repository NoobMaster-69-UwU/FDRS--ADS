<?php
    class Respuesta{
        //Propiedades
        public $idRespuesta; //Sólo ingreso en el constructor
        public $idRespondiendo;    //Sólo ingreso en el constructor
        public $idCoordinador; //Sólo ingreso en el constructor
        public $titulo; //Sólo ingreso en el constructor
        public $contenido; //Sólo ingreso en el constructor
        
        //Método constructor
        //$c es un correlativo
        public function __construct($c,$idRes,$idCoo,$titl,$respCont){
            if(!empty($c) && is_numeric($c))
                $this->idRespuesta = $idCoo . $c;
            else
                throw new Exception('Error. Correlativo incorrecto');
            if(!empty($idRes))
                $this->idRespondiendo = $idRes;
            else
                throw new Exception('Error. Nombre incorrecto');
            if(!empty($idCoo))
                $this->idCoordinador = $idCoo;
            else
                throw new Exception('Error. Apellido vacío');
            if(!empty($titl))
                $this->titulo = $titl;
            else
                throw new Exception('Error. Relación vacía');
            if(!empty($respCont))
                $this->contenido = $respCont;
            else
                throw new Exception('Error. Número telefónico vacío');
        }

    //Setters
    //Getters
    public function getIdRespuesta(){
        return $this->idRespuesta;
    }
    public function getIdRespondiendo(){
        return $this->idRespondiendo;
    }
    public function getIdCoordinador(){
        return $this->idCoordinador;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getContenido(){
        return $this->contenido;
    }
}//Fin clase
?>