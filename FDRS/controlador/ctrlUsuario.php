<?php
    error_reporting(0);
    //Controlador de datos que ingresan
    $nombre = isset($_POST['nom'])?$_POST['nom']:"";
    $apellido = isset($_POST['ape'])?$_POST['ape']:"";
    $usu = isset($_POST['usu'])?$_POST['usu']:"";
    $tel = isset($_POST['tel'])?$_POST['tel']:"";
    $idUsuario = isset($_POST['idUsuario'])?$_POST['idUsuario']:"";
    $eMail = isset($_POST['correo'])?$_POST['correo']:"";
    $contras = isset($_POST['contra'])?$_POST['contra']:"";
    
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
    $editar = isset($_GET['accion'])?$_GET['accion']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";

    //
    if($accion == ""){
        header("Location: ../FDRS/vista/vistaUsuario.php");
    }    

    if($accion == "Registrarte"){
        require_once '../modelo/Usuario/claseUsuario.php';
        require_once '../modelo/Usuario/daoUsuario.php';
        $dao = new DaoUsuario();
        $c = $dao->getCorrelativo(date('Y'));
        $usuario = new Usuario($c,$nombre,$apellido,$usu,$tel,$eMail,$contras); 
        $dao->insertar($usuario);

       // echo "<div style='margin-top: 17px; margin-left: 35%;'><p style='font-size: 25px; font-weight: bold; '>Registro almacenado exitosamente...</p></div>";
        //echo "<a style='margin-left: 40%; text-decoration: none; background-color: #0083B0; border-radius: 10px; padding: 7px; color: #fff; text-align: center; font-size: 17px; font-weight: bold;' href='../index.php'>Regresar a la página principal</a>";
        require "../vista/vistaUsuario.php";    
    }
?>


<?php
    if($accion == "Iniciar"){
        if(!empty($eMail) && !empty($contras)){
            //require_once '../modelo/claseUsuario.php';
            require_once '../modelo/Usuario/daoUsuario.php';
            $dao = new DaoUsuario();
            //$c = $dao->getCorrelativo(date('Y'));
            /*$usuario = new Usuario($c,$nombre,$apellido,$usu,$tel,$eMail,$contras); */
            if($dao->iniciar($eMail, $contras)){
                $usuario = $dao->iniciar($eMail, $contras);
               // echo "<h1 style='margin-top: 15px; margin-left: 40%'>¡Has iniciado sesión!<h1>"; 
                session_start();
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombres'];
                $_SESSION['ape'] = $usuario['apellidos'];
                $_SESSION['relacion'] = $usuario['relacion'];
                $_SESSION['telefono'] = $usuario['telefono'];
                $_SESSION['correo'] = $usuario['correo'];

                $perfil = $_SESSION['relacion'] . " - " . $_SESSION['nombre'];
                //echo "<h1 style='margin-left:41%;'>" . $perfil;
                //echo "</h1><br/><a style='margin-left:46%; padding:7px; background-color: #0074d9; text-decoration: none; color: white; border-radius: 10px;' href='../index.php'>Volver a Inicio</a>";
                require "../vista/vistaUsuario.php";
            }
        }
    }

    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FDRS</title> 
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../vista/js/SweetAlert.js"></script>
</body>
</html>
