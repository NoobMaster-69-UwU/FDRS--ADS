<?php
    
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

    if($id != "" && $accion=="eliminar"){
        require_once '../modelo/Coordinador/daoCoordinador.php';
        $dao = new DaoCoordinador();
        $dao->eliminar($id);
        //echo "<div style='margin-top: 10%; margin-left: 37%'><p style='font-size: 27px; font-weight: bold;'>Usuario eliminado exitosamente...</p></div>";
        //echo "<a style='margin-left: 47%; text-decoration: none; background-color: #0083B0; border-radius: 10px; padding: 7px; color: #fff; text-align: center; font-size: 17px; font-weight: bold;' href='../vista/CRUD.php'>Regresar</a>";
        require "../vista/CRUD.php";
    }
    
    if($id != "" && $accion=="modificar"){
        require_once '../modelo/Usuario/daoUsuario.php';
        $dao = new DaoUsuario();
        $usuario = $dao->mostrarUsuario($id);
        
        if($usuario["relacion"] == "estudiante"){
            $radio1 = "True";
            $radio2 = "False";
            $radio3 = "False";
        }elseif ($usuario["relacion"] == "encargado") {
            $radio1 = "False";
            $radio2 = "True";
            $radio3 = "False";
        }elseif($usuario["relacion"] == "ajena"){
            $radio1 = "False";
            $radio2 = "False";
            $radio3 = "True";
        }
        $html = <<<'EOD'
        <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/registro.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!-- este ultimo links son los iconos del menu para que se vuelva responsive-->
	<title>FDRS - Registro</title>
</head>
<body>
<header>
		<nav class="menu">
			<div>
				<img src="../vista/img/FDRSlog.png">
			</div>
			<input type="checkbox" id="check">
			<label for="check" class="bar-btn">
				<i class="fa fa-bars"></i>
				
			</label>		
				
			<div class="menu-link">
				<ul >
					<li><a class="active" href="../vista/CRUD.php">Regresar</a></li>

				</ul>	
			</div>	
		
		</nav>	
	</header>
<div class="content"> 
<div class="registro">
    <div class="bgimg">
        <div class="letras">
            <h2>Sistema FDRS</h2>
            <p>para el CDB</p>
        </div>
    </div> 
    <div class="formulario">	
        <form method="POST" action="../controlador/ctrlCoordinador.php">
        <h1 class="titulo">Modificar Usuario</h1>
EOD;
echo $html;
echo "<div class='grupo'>
    <fieldset>
        <label>Nombre <span>*</span></label>
        <input type='text' name='nom' class='in' required value='".$usuario["nombres"]."'/>
    </fieldset>
    <fieldset class='si'>
        <label class='apellido'	>Apellido <span>*</span></label><br>
        <input type='text' name='ape' class='in' required value='".$usuario["apellidos"]."'/>
        <input type='hidden' name='idUsuario' required value='". $id ."'/>
    </fieldset>
    </div>";
    
echo "<fieldset class='relacion'>
        <label>Relación con la Institución <span>*</span></label>
        <div class='radio'>
            <input type='radio' name='usu' value='estudiante' id='estudiante' checked = '" . $radio1 . "'>
            <label for='estudiante'>Estudiante</label>
        
            <input type='radio' name='usu' value='encargado' id='encargado' checked = '" . $radio2 . "'>
            <label for='encargado'>Encargado</label>
        
           <input type='radio' name='usu' value='ajeno' id='ajena' '" . $radio3 . "'>
           <label for='ajena'>Ajena a la institución</label>
        </div>
    </fieldset>";
echo "<fieldset>
        <label>Telefono <span>*</span></label>
        <input type='text' name='tel' required placeholder='Ingresa tu número telefonico' value='".$usuario["telefono"]."'/>
    </fieldset>";
    
echo "<fieldset>
        <label>Correo <span>*</span></label>
        <input type='email' name='correo' class='tel' class='correo' required placeholder='Ingresa tu correo electrónico' value='".$usuario["correo"]."'/>
      </fieldset>
      <div class='grupo'>
        <fieldset>
                <label>Contraseña <span>*</span></label>
                <input type='password' name='contra' class='in' required placeholder='Ingresa una contraseña' value='".$usuario["contra"]."'/>
        </fieldset>
      </div>
        <fieldset class='no'>
            <input type='submit' name='accion' class='btn-f' value='Modificar' required'/> 
        </fieldset>  
        </form>
        </div>
        </div>	
    </div>
    <footer>
			
			<div class='contenedor-footer'>
				<div class='content-footer'>
					<h4>Página principal</h4>
					<p><a href='../index.php'>Inicio</a></p>
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
    if($accion == "Modificar"){
        require_once '../modelo/Usuario/claseUsuario.php';
        require_once '../modelo/Usuario/daoUsuario.php';
        $dao = new DaoUsuario();
        $c=1;
        $usuario = new Usuario($c,$nombre,$apellido,$usu,$tel,$eMail,$contras); 
        $usuario->setIdUsuario($idUsuario);
        $dao->modificar($usuario);
        //echo "<div style='margin-top: 10%; margin-left: 35%'><p style='font-size: 27px; font-weight: bold;'>Registro modificado exitosamente...</p></div>";
        //echo "<a style='margin-left: 47%; text-decoration: none; background-color: #0083B0; border-radius: 10px; padding: 7px; color: #fff; text-align: center; font-size: 17px; font-weight: bold;' href='../vista/CRUD.php'>Regresar</a>";
        require "../vista/CRUD.php";
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
<?php
    if($accion == "Iniciar"){
        if(!empty($eMail) && !empty($contras)){
            require_once '../modelo/Coordinador/daoCoordinador.php';
            $dao = new DaoCoordinador();
            if($dao->iniciar($eMail, $contras)){
                $usuario = $dao->iniciar($eMail, $contras);
                session_start();
                $_SESSION['idUsuario'] = $usuario['idCoordinador'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['ape'] = $usuario['apellido'];
                $_SESSION['relacion'] = $usuario['cargo'];
                $relacion = $usuario['coordinacion'];
                switch ($relacion) {
                    case 'parvularia':
                        $rel = "Parvularia";
                        break;
                    case 'primaria':
                        $rel = "Primaria";
                        break;
                    case 'tercer':
                        $rel = "Tercer Ciclo";
                        break;
                    case 'bachillerato':
                        $rel = "Bachillerato";
                        break;
                    case 'pastoral':
                        $rel = "Pastoral";
                        break;
                    case 'admin':
                        $rel = "Administración";
                        break;
                    case 'servicio':
                        $rel = "Servicio Social";
                        break;
                    default:
                        echo "Administrador no registrado";
                        break;
                }
                $_SESSION['coordinacion'] = $rel;
                $_SESSION['poder'] = $usuario['coordinacion'];
                $_SESSION['correo'] = $usuario['correo'];

                $perfil = $_SESSION['relacion'] . " de " . $_SESSION['coordinacion'] . " - " . $_SESSION['nombre'];
                require "../vista/vistaCoordinador.php";
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
