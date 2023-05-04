<?php
    
    //Controlador de datos que ingresan
    $idRes = isset($_POST['idRespondiendo'])?$_POST['idRespondiendo']:"";
    $idCoo = isset($_POST['idCoordinador'])?$_POST['idCoordinador']:"";   
    $titl = isset($_POST['titulo'])?$_POST['titulo']:"";
    $respCont = isset($_POST['respuesta'])?$_POST['respuesta']:"";
    
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
    $editar = isset($_GET['accion'])?$_GET['accion']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";
    $id2 = isset($_GET['idResp'])?$_GET['idResp']:"";

    //
    if($accion == ""){
        header("Location: ../FDRS/vista/vistaUsuario.php");
    }    

    if($accion == "responder"){
        require_once '../modelo/Respuesta/claseRespuesta.php';
        require_once '../modelo/Respuesta/daoRespuesta.php';
        $dao = new DaoRespuesta();
        $respuesta = $dao->mostrarMensaje($id);
        //$usuario = new Respuesta($c,$nombre,$apellido,$usu,$tel,$eMail,$contras); 

        echo "<!DOCTYPE html>
            <html>
                <head>
                    <meta charset='utf-8'>
                    <link rel='stylesheet' type='text/css' href='../vista/CSS/menu-all.css'>
                    <link rel='stylesheet' type='text/css' href='../vista/CSS/responder.css'>
                    <link rel='stylesheet' type='text/css' href='../vista/CSS/footer.css'>
                    <script type='text/javascript' src='../vista/js/comprobacion.js'></script>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap' rel='stylesheet'>
                    <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
                    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><!-- este ultimo links son los iconos del menu para que se vuelva responsive-->
                    <title>FDRS - Registro</title>
                </head>
            <body>
            <header>
		<nav class='menu'>
			<div>
				<img src='../vista/img/FDRSlog.png'>
			</div>
			<input type='checkbox' id='check'>
			<label for='check' class='bar-btn'>
				<i class='fa fa-bars'></i>
				
			</label>		
				
			<div class='menu-link'>
				<ul >
					<li><a class='active' href='../vista/historial.php'>Regresar</a></li>
				</ul>	
			</div>	
		
		</nav>	
	</header>
            <div class='formulario'>
                <form method='POST' action='../controlador/ctrlRespuesta.php'>
                <h1 class='titulo'>Responder mensaje </h1>
                <fieldset>
                    <label>Título <span>*</span></label>
                    <input type='hidden' name='idRespondiendo' required value='". $id ."'/>
                    <input type='hidden' name='idCoordinador' required value='". $id2 ."'/>
                    <input type='text' name='titulo' placeholder='Escriba el título para la respuesta' id='titulo'>
                </fieldset>
        
                <fieldset>
                    <label>Redacte una respuesta <span>*</span></label>
                    <input type='textarea' name='respuesta' placeholder='Escriba aquí una respuesta' id='cont'>
                </fieldset>
        
                <fieldset>
                    <label></label>
                    <input type='submit' name='accion' class='btn-f' value='Responder' onclick=' return comprobacion();'>
                </fieldset>
                </form>
            </div>
        
            <footer>
                    
                    <div class='contenedor-footer'>
                        <div class='content-footer'>
                            <h4>Página principal</h4>
                            <p><a href='index.html'>Inicio</a></p>
                        </div>
                        <div class='content-footer'>
                            <h4>Email</h4>
                            <p>fdrs@gmail.com</p>
                        </div>
                        <div class='content-footer'>
                            <h4>Sitio web del CDB</h4>
                            <p><a href='https://www.cdb.edu.sv/' target='blank'>CDB</a>  </p>
                        </div>
                    </div>
        
                    <h2 class='titulo-final'>&copy; Sistema FDRS para el CDB | SEND</h2>
                
                    </footer>
        
        </body>
        </html>";
    }
    if($accion == "Responder"){
        require_once '../modelo/Respuesta/claseRespuesta.php';
        require_once '../modelo/Respuesta/daoRespuesta.php';
        $dao = new DaoRespuesta();
        session_start();
        $c = $dao->getCorrelativo($idCoo);
        $respuesta = new Respuesta($c,$idRes,$idCoo,$titl,$respCont); 
        $dao->responder($respuesta);
        echo "<div style='margin-top: 10%; margin-left: 42%'><p style='font-size: 27px; font-weight: bold;'>Respuesta Enviada</p></div>";
        echo "<a style='margin-left: 47%; text-decoration: none; background-color: #0083B0; border-radius: 10px; padding: 7px; color: #fff; text-align: center; font-size: 17px; font-weight: bold;' href='../vista/CRUD.php'>Regresar</a>";
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
