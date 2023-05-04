<?php
require_once '../modelo/claseConexion.php';
class DaoCoordinador{
    public function insertar($usuario){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "INSERT INTO usuario (idUsuario, nombres, apellidos, relacion, telefono, ";
        $sql .= "correo, contra) ";
        $sql .= " VALUES (:idUsuario, :nombres, :apellidos, :relacion, :telefono, ";
        $sql .= ":correo, :contra)";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->execute((array) $usuario);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }  

    public function modificar($usuario){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "UPDATE usuario SET nombres=:nombres, apellidos=:apellidos, relacion=:relacion, telefono=:telefono, correo=:correo, contra=:contra WHERE idUsuario=:idUsuario";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':nombres',$usuario->nombres);
            $stmt->bindParam(':apellidos',$usuario->apellidos);
            $stmt->bindParam(':relacion',$usuario->relacion);
            $stmt->bindParam(':telefono',$usuario->telefono);
            $stmt->bindParam(':correo',$usuario->correo);
            $stmt->bindParam(':contra',$usuario->contra);
            $stmt->bindParam(':idUsuario',$usuario->idUsuario);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 

    public function eliminar($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "DELETE FROM usuario WHERE idUsuario=:idUsuario";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':idUsuario',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function getCorrelativo($year){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "SELECT count(*) as correlativo FROM usuario WHERE idUsuario like '$year%'";
        $stmt=$dbh->prepare($sql);
        //$stmt->bindParam(':year', $year);
        $stmt->execute();
        $row = $stmt->fetch();
        if(isset($row[0]))
            return $row[0]+1;
        else
            return 1;
    }
    
    public function listadoUsuario(){
        $sql = "SELECT idUsuario, nombres, apellidos FROM usuario ORDER BY idUsuario, apellidos";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
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

    public function iniciar($eMail,$contras){
        $sql = "SELECT * FROM coordinador WHERE correo=:eMail AND contraseña=:contras";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':eMail',$eMail);
        $stmt->bindParam(':contras',$contras);
        $stmt->execute();
        $perfil = $stmt->fetch(PDO::FETCH_ASSOC);
        if($perfil){
            return $perfil;
        }else{
            echo "<h1 style='margin-top: 15px; margin-left: 35%'>No se ha podido Iniciar Sesión:<h1>";
            echo "<h1 style='margin-left:34%;'>Correo/ Contraseña incorrectos.</h1>";
            echo "</h1><br/><a style='margin-left:46%; padding:7px; background-color: #0074d9; text-decoration: none; color: white; border-radius: 10px;' href='../vista/iniciarSesionadmin.php'>Volver a Intentar</a>";
        }
    }

}
?>





