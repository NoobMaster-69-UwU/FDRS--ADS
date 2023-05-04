<?php
class Conexion{
    public function getConexion(){
        $host = "localhost";
        $bdd = "fdrs";
        $user = "root";
        $pass = "";
        try{
            $dsn = "mysql:host=$host;dbname=$bdd";
            $dbh = new PDO($dsn,$user,$pass);
            return $dbh;
       }catch(PDOException  $e){
           echo "Fallo de conexión: " . $e->getMessage();
     }
    }
}
?>