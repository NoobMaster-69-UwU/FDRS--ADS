<?php
    class Usuario{
        //Propiedades
        public $idUsuario; //Sólo ingreso en el constructor
        public $nombres;    //Sólo ingreso en el constructor
        public $apellidos; //Sólo ingreso en el constructor
        public $relacion; //Sólo ingreso en el constructor
        public $telefono; //Sólo ingreso en el constructor
        public $correo; //Modificar
        public $contra;//Sólo ingreso en el constructor
        //Método constructor
        //$c es un correlativo
        public function __construct($c,$nombre,$apellido,$usu,$tel,$eMail,$contras){
            if(!empty($c) && is_numeric($c))
                $this->idUsuario= date('Y') . $c + 1 + 1;
            else
                throw new Exception('Error. Correlativo incorrecto');
            if(!empty($nombre))
                $this->nombres = $nombre;
            else
                throw new Exception('Error. Nombre incorrecto');
            if(!empty($apellido))
                $this->apellidos = $apellido;
            else
                throw new Exception('Error. Apellido vacío');
            if(!empty($usu))
                $this->relacion = $usu;
            else
                throw new Exception('Error. Relación vacía');
            if(!empty($tel))
                $this->telefono = $tel;
            else
                throw new Exception('Error. Número telefónico vacío');
            
            $this->valEmail($eMail);

            if(!empty($contras))
                $this->contra = $contras;
            else
                throw new Exception('Error. Contraseña vacía');
        }

    private function valEmail($eMail){
        if(!empty($eMail) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$eMail))
            $this->correo = $eMail;
        else
            throw new Exception('Error. email vacío');
    }
    //Setters
    public function setEmail($eMail){
        $this->valEmail($eMail);
    }
    public function setIdUsuario($id){
        $this->idUsuario = $id;
    }
    //Getters
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getNombre(){
        return $this->nombres;
    }
    public function getApellido(){
        return $this->apellidos;
    }
    public function getRelacion(){
        return $this->relacion;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getContraseña(){
        return $this->contra;
    }
    public function toString(){
        return $this->idCliente.  " - " . $this->nombre . " " . $this->apellido;
    }
}//Fin clase
?>