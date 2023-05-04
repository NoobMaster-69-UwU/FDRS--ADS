<?php
require_once '../modelo/claseConexion.php';
class DaoRespuesta{
    
    public function mostrarMensaje($id){
        $sql = "SELECT * FROM mensajes WHERE idMensaje=:id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }

    public function responder($respuesta){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "INSERT INTO respuesta (idRespuesta, idRespondiendo, idCoordinador, titulo, contenido) ";
        $sql .= " VALUES (:idRespuesta, :idRespondiendo, :idCoordinador, :titulo, :contenido)";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->execute((array) $respuesta);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }  
    
    public function getCorrelativo($idCoo){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "SELECT count(*) as correlativo FROM respuesta WHERE idCoordinador like '$idCoo%'";
        $stmt=$dbh->prepare($sql);
        //$stmt->bindParam(':year', $year);
        $stmt->execute();
        $row = $stmt->fetch();
        if(isset($row[0]))
            return $row[0]+1;
        else
            return 1;
    }
}
?>





