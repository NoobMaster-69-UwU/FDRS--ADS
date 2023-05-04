<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FDRS</title> 
</head>
<body>
<?php
    error_reporting(0);
    //Controlador de datos que ingresan
    $titl = isset($_POST['titulo'])?$_POST['titulo']:"";
    $tipoM = isset($_POST['tipo'])?$_POST['tipo']:"";
    $destino = isset($_POST['area'])?$_POST['area']:"";
    $content = isset($_POST['mensajes'])?$_POST['mensajes']:"";

    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
    $editar = isset($_GET['accion'])?$_GET['accion']:"";
    
    //
    if($accion == ""){
        header("Location: ../FDRS/vista/vistaUsuario.php");
    }  

    if($accion = "Enviar"){
        session_start();
        $id = $_SESSION["idUsuario"];
        require_once '../modelo/Mensaje/claseMensaje.php';
        require_once '../modelo/Mensaje/daoMensaje.php';
        $dao = new DaoMensaje();
        $c = $dao->getCorrelativo($id);
        $mensaje = new Mensaje($c,$id,$titl,$tipoM,$destino,$content); 
        $val = $dao->insertar($mensaje);
    }
        if($val = 1){
        //echo "<div style='margin-top: 10%; margin-left: 43%'><p style='font-size: 27px; font-weight: bold;'>Mensaje enviado</p></div>";
       // echo "<a style='margin-left: 47%; text-decoration: none; background-color: #0083B0; border-radius: 10px; padding: 7px; color: #fff; text-align: center; font-size: 17px; font-weight: bold;' href='../vista/vistaUsuario.php'>Regresar</a>";    
            require "../vista/enviar.php";
    }
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../vista/js/SweetAlert.js"></script>
</body>
</html>