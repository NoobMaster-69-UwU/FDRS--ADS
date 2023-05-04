<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/nombre.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/footer.css">
	<script type="text/javascript" src="../vista/js/confirmacion.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<title>FDRS</title>
</head>
<body>

<?php 
	//require "../modelo/claseConexion.php"; 
	session_start();
	$rel = $_SESSION['relacion'];
		if(!empty($_SESSION) && $rel == "coordinador"){
?>
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
					<li><a class="active" href="../vista/vistaUsuario.php">Inicio</a></li>
					
				<li><a href="../vista/ayuda.php">Ayuda</a></li>
				<li><a href="../vista/mensajes.php">Mensajes</a></li>
				<li class="nombre"><a href="../vista/CRUD.php">Cuenta</a></li>
				</ul>	
			</div>	
		
		</nav>	
	</header>
	
	<div class="info">
		<div class="name">
			<div class="imagen">
				<i class="fas fa-user"></i>
			</div>
			<h1 class="nombre"><?php
			echo $_SESSION['relacion']  . " - " . $_SESSION['coordinacion']; ?></h1>
			
		</div>

		<div class="datos">
        <table class="table">
            <caption>Listado Usuarios</caption>
            <tr>
                <th>id</th><th colspan="">Nombre <i>(Apellido, Nombre)</i></th>
            </tr>
            <?php
                if(!isset($usuario)){
                    require_once "../modelo/Coordinador/daoCoordinador.php";
                }else
                    require_once "../modelo/Coordinador/daoCoordinador.php";
                $dao = new DaoCoordinador();
                $usuarios = $dao->listadoUsuario();
                $enlace ="<a onclick=' return confirmar2();' href='../controlador/ctrlCoordinador.php?accion=modificar&id=";
                $enlace2 ="<a onclick=' return confirmar3();' href='../controlador/ctrlCoordinador.php?accion=eliminar&id=";
                foreach($usuarios as $usuario){
                    echo "<tr><td>". $usuario['idUsuario'] ."</td><td>". $usuario['apellidos'] .", ". $usuario['nombres'] ."</td><td>".$enlace . $usuario['idUsuario'] ."'><i class='fas fa-edit'></i></a></td><td>".$enlace2 . $usuario['idUsuario'] ."'><i class='fas fa-trash-alt'></i></a></td></tr>";
                }
            ?>
        </table>
		</div>
		
	</div>
	<div class="salir"><h2><a onclick=" return confirmar();" href="log out.php">Salir de la cuenta</a></h2></div>
	<?php
		}else{
	?>
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
					<li><a class="active" href="../vista/vistaUsuario.php">Inicio</a></li>		
				</ul>	
			</div>	
		
		</nav>	
	</header>

	<div class="opciones">
		<h2>Para acceder a esta página</h2>
		<h2>Debes ser un Coordinador de la Institución</h2>
	</div>
	<?php
		}
	?>
<footer>
	<div class="contenedor-footer">
		<div class="content-footer">
			<h4>Página principal</h4>
			<p><a href="../vista/vistaUsuario.php">Inicio</a></p>
		</div>
		<div class="content-footer">
			<h4>Email</h4>
			<p>fdrs@gmail.com</p>
		</div>
		<div class="content-footer">
			<h4>Sitio web del CDB</h4>
			<p><a href="https://www.cdb.edu.sv/" target="blank">CDB</a>  </p>
		</div>
	</div>

	<h2 class="titulo-final">&copy; Sistema FDRS para el CDB | SEND</h2>

</footer>
</body>
</html>