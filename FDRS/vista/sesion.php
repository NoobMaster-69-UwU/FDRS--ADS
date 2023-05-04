<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/iniciarSesion.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>FDRS</title>
	<title></title>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script> 
	<title></title>
</head>
<body>
	<?php 
		session_start();
		if(empty($_SESSION)){
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
		<h2>Iniciar Sesión</h2>
		<div class="btn">
			<a href="iniciarSesion.php">
				<span>Como usuario</span>
			</a>
			<a href="iniciarSesionadmin.php">
				<span>Como coordinador</span>
			</a>
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

	<div class="opciones">
		<h2>Ya has iniciado Sesión</h2>
		<div class="btn">
			<a href="../index.php">
				<span>Página principal</span>
			</a>
		</div>
	</div>
	<?php } ?>
</body>
</html>