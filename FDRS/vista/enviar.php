<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/enviar.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/footer.css">
	<script type="text/javascript" src="../vista/js/confirmar2.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>FDRS</title>
</head> 
<body>
<?php
session_start();
		if(!empty($_SESSION)){
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
					<li><a href="../vista/vistaUsuario.php">Inicio</a></li>
					
				<li><a href="../vista/ayuda.php">Ayuda</a></li>
				<li><a href="../vista/mensajes.php">Mensajes</a></li>
				<li class="nombre"><a class="active" href="../vista/perfil.php"><?php echo $_SESSION['relacion']  . " - " . $_SESSION['nombre']; ?></a></li>
				</ul>	
			</div>	
		
		</nav>	
	</header>

	<div class="formulario">
		<form method="POST" action="../controlador/ctrlMensajes.php">
		<h1 class="titulo">Enviar Mensaje </h1>
		<fieldset>
			<label>Título <span>*</span></label>
			<input type="text" name="titulo" placeholder="Escriba el título de su mensaje" id="T">
		</fieldset>
		<fieldset>
			<label>Tipo de mensaje <span>*</span></label>
			<div class="radio">
				<input type="radio" name="tipo" value="felicitacion" id="felicitacion">
				<label for="felicitacion">Felicitación</label>
					 
				<input type="radio" name="tipo" value="duda" id="duda">
				<label for="duda">Duda</label>
					
				<input type="radio" name="tipo" value="reclamo" id="reclamo">
				<label for="reclamo">Reclamo</label>	

				<input type="radio" name="tipo" value="sugerencia" id="sugerencia">
				<label for="sugerencia">Sugerencia</label>	
			</div>
		</fieldset>
		<fieldset>
			<label>Área de destino <span>*</span></label>
				<div class="radio">
				<input type="radio" name="area" value="parvularia" id="parvularia">
				<label for="parvularia">Parvularia</label>
					 
				<input type="radio" name="area" value="primaria" id="primaria">
				<label for="primaria">Primaria</label>
					
				<input type="radio" name="area" value="tercer" id="tercer">
				<label for="tercer">Tercer ciclo</label>	

				<input type="radio" name="area" value="bachillerato" id="bachillerato">
				<label for="bachillerato">Bachillerato</label>	

				<input type="radio" name="area" value="pastoral" id="pastoral">
				<label for="pastoral">Pastoral</label>	

				<input type="radio" name="area" value="admin" id="admin">
				<label for="admin">Administración</label>	

				<input type="radio" name="area" value="servicio" id="servicio">
				<label for="servicio">Servicio Social</label>
			</div>
		</fieldset>

		<fieldset>
			<label>Redacte su mensaje <span>*</span></label>
			<input type="textarea" name="mensajes" placeholder="Escriba aquí su mensaje" id="RM">
		</fieldset>

		<fieldset>
			<label></label>
			<input type="submit" name="accion" class="btn-f" value="Enviar" onclick=" return confirmar();">
		</fieldset>
		</form>
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
				<ul >
					<li><a class="active" href="../index.php">Inicio</a></li>
					
				<li><a href="registrar.php">Regístrate</a></li>
				
				
				</ul>	
			</div>	
		
		</nav>	
	</header>

	
	<div class="opciones">
		<h2>Para acceder a esta página</h2>
		<h2>Debes <a href="sesion.php">iniciar sesión</a></h2>
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