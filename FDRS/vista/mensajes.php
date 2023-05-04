<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/mensajes.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>FDRS</title>
	<title></title>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script> 
</head>
<body>
	<?php
		session_start();
		if(!empty($_SESSION)){
			$rel = $_SESSION['relacion'];
				if ($rel =='coordinador'){
					$link = '<a class="active" href="CRUD.php">';
					$linke = '<a href="vistaCoordinador.php">';
					$linked = '<a href="historial.php">';
				}else{
					$link = '<a class="active" href = "perfil.php">';
					$linke = '<a href="../index.php">';
					$linked = '<a href="enviar.php">';
				}
	?>
	<!-- Menú de navegación -->
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
				<li><?php echo $linke; ?>Inicio</a></li>
				<li><a href="ayuda.php">Ayuda</a></li>
				<li><a href="mensajes.php">Mensajes</a></li>
				<li class="nombre"><?php	
					echo $link . $_SESSION['relacion'] . ", " . $_SESSION['nombre']; ?></a></li>
				</ul>	
			</div>	
		
		</nav>	
	</header>

	<div class="opciones">
		<h2>Seleccione una opción</h2>
		<div class="btn">


		<?php  
			if($rel !=='coordinador'){
				echo $linked;
		?>
				<span>Enviar mensaje</span>
				<span>Enviar mensaje</span>
		</a>

		<a href="historial.php">
			<span>Historial de mensajes</span>
			<span>Historial de mensajes</span>
		</a>
		</div>
	</div>
		<?php
			}else{
		?>	
		<a href="historial.php">
			<span>Historial de mensajes</span>
			<span>Historial de mensajes</span>
		</a>
		</div>
	</div>
	<?php
		}}else{
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