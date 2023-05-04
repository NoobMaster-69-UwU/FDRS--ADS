<?php
    class Mensaje{
        //Propiedades
        public $idMensaje; //Sólo ingreso en el constructor
        public $idEmisor;    //Sólo ingreso en el constructor
        public $titulo; //Sólo ingreso en el constructor
        public $tipo; //Sólo ingreso en el constructor
        public $destino; //Sólo ingreso en el constructor
        public $contenido; //Modificar

        //Método constructor
        //$c es un correlativo
        public function __construct($c,$id,$titl,$tipoM,$receptor,$content){
            if(!empty($c) && is_numeric($c))
                $this->idMensaje= $id . $c;
            else
                throw new Exception('Error. Correlativo incorrecto');
            if(!empty($id))
                $this->idEmisor = $id;
            else
                throw new Exception('Error. Nombre incorrecto');
            if(!empty($titl))
                $this->titulo = $titl;
            else
                throw new Exception('Error. Apellido vacío');
            if(!empty($tipoM))
                $this->tipo = $tipoM;
            else
                throw new Exception('Error. Relación vacía');
            if(!empty($receptor))
                $this->destino = $receptor;
            else
                throw new Exception('Error. Número telefónico vacío');
            if(!empty($content))
                $this->contenido = $content;
            else
                throw new Exception('Error. Contraseña vacía');
        }

    //Setters
    public function setIdEmisor($id){
        $this->idEmisor = $id;
    }

    //Getters
    public function getIdMensaje(){
        return $this->idMensaje;
    }
    public function getIdEMisor(){
        return $this->idEmisor;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getContenido(){
        return $this->contenido;
    }
}//Fin clase
?>