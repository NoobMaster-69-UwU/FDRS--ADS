<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

	<title>FDRS</title>
	<link rel="stylesheet" type="text/css" href="CSS/ayuda.css">
	<link rel="stylesheet" type="text/css" href="CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
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
					$lin = '<a href="../vista/historial.php">';
				}else{
					$link = '<a class="active" href = "perfil.php">';
					$linke = '<a href="../index.php">';
					$linked = '<a href="enviar.php">';
					$lin = '<a href="../vista/mensajes.php">';
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
				<li><?php echo $lin; ?>Mensajes</a></li>
				<li class="nombre"><?php	
					echo $link . $_SESSION['relacion'] . ", " . $_SESSION['nombre']; ?></a></li>
				</ul>	
			</div>	
		
		</nav>	
	</header>
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
	<?php 
	}
	?>



	<div class="titulo">
		<h1>Ayuda</h1>
		<p>En esta lista podrás encontrar algunas preguntas las cuales podriás llegar a tener al usar el sistema. Para acceder a las respuestas solo debes dar click en la pregunta.  </p>
	</div>

	<div class="container">
		<section id="menu1">
			<a href="#menu1">¿Cómo envío mensajes?</a>
			<p>Selecciona apartado de Mensajes, después te encontrarás con dos botones, y le darás click al botón con el nombre "Enviar mensaje", luego llena los datos que se te solicitan y redacta tu mensaje, para finalizar da click al botón de "Enviar" y confirma el envío. 
            </p>
		</section>

		<section id="menu2">
			<a href="#menu2">¿Cómo puedo ver las respuestas a mis mensajes?</a>
			<p>Selecciona la pestaña "Mensajes", la cual se encuentra el menú, luego selecciona el botón "Historial de mensajes" y ahí podrás ver las respuestas a tus mensajes y todos los mensajes que has enviado.
             </p>
		</section>

		<section id="menu3">
			<a href="#menu3">¿Cómo cierro sesión?</a>
			<p>Debes dirigirte al apartado del menú que posee tu nombre, luego en la parte inferior de dicha sección encontrarás un botón que dice "Cerrar sesión" al cual solo debes darle click y automáticamente ya habrás salido de tu cuenta.</p>
		</section>	

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