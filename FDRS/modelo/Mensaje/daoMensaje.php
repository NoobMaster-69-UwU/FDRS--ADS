<?php
require_once '../modelo/claseConexion.php';
class DaoMensaje{
    public function insertar($mensaje){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "INSERT INTO mensajes (idMensaje, idEmisor, titulo, tipo, destino, ";
        $sql .= "contenido) ";
        $sql .= " VALUES (:idMensaje, :idEmisor, :titulo, :tipo, :destino, ";
        $sql .= ":contenido )";
        $val = 0;
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->execute((array) $mensaje);
            $val = 1;
            return $val;
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }  

    public function getCorrelativo($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "SELECT count(*) as correlativo FROM mensajes WHERE idEmisor like '$id%'";
        $stmt=$dbh->prepare($sql);
        //$stmt->bindParam(':year', $year);
        $stmt->execute();
        $row = $stmt->fetch();
        if(isset($row[0]))
            return $row[0]+1;
        else
            return 1;
    }
    
    public function listadoMensaje($id){
        $sql = "SELECT * FROM mensajes WHERE idEmisor = $id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }

    public function listadoMensajeCoo($cargo){
        $sql = "SELECT * FROM mensajes WHERE destino = '$cargo'";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $mensajes;
    }

    public function mostrarEmisor($id){
        $sql = "SELECT * FROM usuario WHERE idUsuario = $id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $emisores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $emisores;
    }

    public function mostrarEmisorCoo($id){
        $sql = "SELECT * FROM usuario WHERE idUsuario = $id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $emisores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $emisores;
    }

    public function listadoRespuestaCoo($resp){
        $sql = "SELECT * FROM respuesta WHERE idRespondiendo = '$resp'";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $mensajes;
    }

    public function mostrarUsuario($id){
        $sql = "SELECT * FROM usuario WHERE idUsuario=:id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $usuario = $stmt->fetch();
        return $usuario;
    }
}
?>





