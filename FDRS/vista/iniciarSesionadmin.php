<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/sesion.css">
	<link rel="stylesheet" type="text/css" href="CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
	<script type="text/javascript" src="../vista/js/verificar.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>FDRS </title>
</head>
<body>

<?php 
	session_start();
	if(empty($_SESSION)){
?>

<!--header-->
<header>
	<nav class="menu">
		<div>
			<img src="img/FDRSlog.png">
		</div>
		<input type="checkbox" id="check">
		<label for="check" class="bar-btn">
			<i class="fa fa-bars"></i>
			
		</label>		
			
		<div class="menu-link">
			<ul >
				<li><a class="active" href="../index.php">Inicio</a></li>
				<li><a href="registrar.php">Regístrate</a></li>
			</ul>	
		</div>	
	</nav>
	</header>
	<div class="content">
		<div class="sesion">
			<div class="bgimg">
				<div class="letras">
					<h2>Sistema FDRS</h2>
					<p>para el CDB</p>
				</div>
			</div>
		<div class="formulario">
			<form method="post" action="../controlador/ctrlCoordinador.php">
				<h1 class="titulo">Iniciar Sesión</h1>
				<fieldset>
					<label>Correo</label><br>
					<input type="email" name="correo" class="correo" placeholder="Ingresa tu correo electrónico" id="email">
				</fieldset>
				<fieldset>
					<label>Contraseña</label><br>
					<input type="password" name="contra" class="contra" placeholder="Ingresa una contraseña" id="pass">
				</fieldset>
				<fieldset>
					<input type="submit" name="accion" class="btn-f" value="Iniciar" onclick=" return verificar();">
				</fieldset>
				<div class="registro">
					<h4>¿No tienes una cuenta?  <a href="registrar.php"> Registrarse</a> <br/>O ¿No eres coordinador? <a href="iniciarSesion.php">Iniciar Sesión</a></h4>
				</div>
			</form>
		</div>
		</div>
	</div>

	<?php 
	}else{
	?>
	<header>
		<nav class="menu">
			<div>
				<img src="img/FDRSlog.png">
			</div>
			<input type="checkbox" id="check">
			<label for="check" class="bar-btn">
				<i class="fa fa-bars"></i>
				
			</label>		
				
			<div class="menu-link">
				<ul>
					<li><a class="active" href="../index.php">Inicio</a></li>			
				</ul>	
			</div>	
		</nav>	
	</header>
	<div class="content">
		<div class="sesion">
			<div class="bgimg">
				<div class="letras">
					<h2>Sistema FDRS</h2>
					<p>para el CDB</p>
				</div>
			</div>
		<div class="formulario">
			<form>
				<h1 class="titulo">No puedes acceder</h1>
				<h1 class="titulo">a este formulario.</h1>
				<h1 class="titulo">Ya has iniciado sesión</h1>
				<h1 class="titulo"><a href= "../index.php">Volver a inicio</a></h1>				
			</form>
		</div>
		</div>
	</div>	
	<?php 
	}
	?>
	<footer>
			
			<div class="contenedor-footer">
				<div class="content-footer">
					<h4>Página principal</h4>
					<p><a href="../index.php">Inicio</a></p>
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