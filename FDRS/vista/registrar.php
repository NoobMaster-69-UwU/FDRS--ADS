<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/registro.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
	<script type="text/javascript" src="../vista/js/validacion.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!-- este ultimo links son los iconos del menu para que se vuelva responsive-->
	<title>FDRS - Registro</title>
</head>
<body>
	<!-- Formulario de registro-->
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
					
				
				<li><a href="sesion.html">Iniciar Sesión</a></li>
				
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
			<form method="POST" action="../controlador/ctrlUsuario.php">
				<h1 class="titulo">Crea tu cuenta</h1>
		<div class="grupo">	
			<fieldset >
					<label>Nombre <span>*</span></label>
					<input type="text" name="nom" class="in" placeholder="Tu nombre" required="" minlength="4" maxlength="10" id="nom">
				</fieldset>
			<fieldset class="si">
				<label class="apellido"	>Apellido <span>*</span></label>
				<input type="text" name="ape" class="in" placeholder="Tu apellido" required="" minlength="4" maxlength="10" id="ape">
			</fieldset>
		</div>

			<fieldset  class="relacion" >
					<label>Relación con la Institución <span>*</span></label>	
					<div class="radio">
							<input type="radio" name="usu" value="estudiante" id="estudiante">
							<label for="estudiante">Estudiante</label>
					 
							<input type="radio" name="usu" value="encargado" id="encargado">
							<label for="encargado">Encargado</label>
					
							<input type="radio" name="usu" value="ajena" id="ajena">
							<label for="ajena">Ajena a la institución</label>	
						</div>
			</fieldset>

			<fieldset >
				<label>Teléfono <span>*</span></label>
				<input type="tel" class="tel" name="tel" placeholder="Ingresa tu número telefónico (en este formato: xxxx-xxxx)" required minlength="9" maxlength="9" pattern="[0-9]{4}-[0-9]{4}">
			</fieldset>

			<fieldset >
				<label>Correo <span>*</span></label>
				<input type="email" name="correo" class="correo" placeholder="Ingresa tu correo electrónico" required="" id="correo">
			</fieldset>

		<div class="grupo">
			<fieldset >
			
				<label>Contraseña <span>*</span></label>
				<input type="password" name="contra" class="in" placeholder="Tu contraseña" required="" id="pass1">
			</fieldset>
			<fieldset  class="si">
				<label >Confirmar contraseña <span>*</span></label>
				<input type="password" name="contra-a" class="in" placeholder="Tu contraseña otra vez" required="" id="pass2">
			</fieldset>
		</div>
			
			<fieldset class="no">
				<input type="submit" name="accion" class="btn-f" value="Registrarte" onclick='return validacion();'>
			</fieldset>

			<div class="sesion">
				<h3>¿Ya tiene una cuenta? <a href="sesion.html"> Iniciar sesión</a></h3>
			</div>
		</form>
		</div>
		</div>
	</div>	
</div>
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