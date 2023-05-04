<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/menu-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/historial.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
	<meta name="viewport" contnent="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
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
				<img src="img/FDRSlog.png">
			</div>
			<input type="checkbox" id="check">
			<label for="check" class="bar-btn">
				<i class="fa fa-bars"></i>
			</label>		
				<?php 
				$rel = $_SESSION['relacion'];
					if ($rel =='coordinador'){
						$link = '<a class="active" href="CRUD.php">';
						$linke = '<a href="vistaCoordinador.php">';
					}else{
						$link = '<a class="active" href = "perfil.php">';
						$linke = '<a href="../index.php">';
					}
				?>
			<div class="menu-link">
				<ul>
					<li><?php echo $linke; ?>Inicio</a></li>
					<li><a href="ayuda.php">Ayuda</a></li>
					<li><a href="mensajes.php">Mensajes</a></li>
					<li class="nombre"><?php 
						echo $link . $_SESSION['relacion'] . ", " . $_SESSION['nombre']; ?></a></li>
				</ul>	
			</div>	
		</nav>	
	</header>

	<section class="historial">
	<?php
		require '../modelo/claseConexion.php';
		
		if(!isset($usuario)){
			require_once "../modelo/Mensaje/daoMensaje.php";
		}else
			require_once "../modelo/Mensaje/daoMensaje.php";
		
		if($rel !== 'coordinador'){
			$id = $_SESSION['idUsuario'];
			$dao = new DaoMensaje();
			$mensajes = $dao->listadoMensaje($id);
		
		foreach($mensajes as $mensaje){
			$emisor = $dao->mostrarEmisor($id);
			foreach($emisor as $emi){
	?>
		
		<div class="info">
		<div class="mensajes">
			<h3>Mensaje</h3>
		<?php
			echo "<div class='cont'><div><b>Emisor: </b>". $emi['idUsuario'] . " - " . $emi['apellidos'] .", " . $emi['nombres'] ."</div><div><b>Título: </b>". $mensaje['titulo'] ."</div><div class='tipo'><b>Tipo: </b>" . $mensaje['tipo'] ."</div><div class='destino'><b>Destino: </b>" . $mensaje['destino'] . "</div><div><b>Contenido: </b><br>" . $mensaje['contenido'] . "</div></div>";
		?>
		</div>
			
	<?php 
		$mens = $mensaje['idMensaje'];
		$dao = new DaoMensaje();
		$respuestas = $dao->listadoRespuestaCoo($mens);

		if(count($respuestas)>0){
			foreach($respuestas as $respuesta){
	?>
			<div class="respuestas">
				<h3>Respuesta</h3>

	<?php
		echo "<div class='cont'><div><b>Título: </b>". $respuesta['titulo'] ."</div>" .  "<div><b>Contenido: </b><br>" . $respuesta['contenido'] . "</div></div></div>";
			}
		}else{
	?>
			<div class="respuestas">
				<h3>Respuesta</h3>
				<div class='cont'>Aun no hay respuestas</div>
			</div>
	<?php 
		}
	?>
		</div>

	<?php
		}}
		}else{ 
			//vista coordinador
			require_once "../modelo/Mensaje/daoMensaje.php";
			$cargo = $_SESSION['poder'];
			$dao = new DaoMensaje();
			$mensajes = $dao->listadoMensajeCoo($cargo);
		if (count($mensajes)>0){
			foreach($mensajes as $mensaje){
				$idEmi = $mensaje['idEmisor'];
				$emisor = $dao->mostrarEmisorCoo($idEmi);
				foreach($emisor as $emi){
	?>
		<div class="info">
		<div class="mensajes">
			<h3>Mensaje</h3>
	<?php
		echo "<div class='cont'><div><b>Emisor: </b>". $emi['idUsuario'] . " - " . $emi['apellidos'] .", " . $emi['nombres'] ."</div><div><b>Título: </b>". $mensaje['titulo'] ."</div><div class='tipo'><b>Tipo: </b>" . $mensaje['tipo'] ."</div><div class='destino'><b>Destino: </b>" . $_SESSION['coordinacion'] . "</div><div><b>Contenido: </b><br>" . $mensaje['contenido'] . "</div></div></div>";
		$mens = $mensaje['idMensaje'];
		$idResp = $_SESSION['idUsuario'];
		$enlace ="<a style='background-color: #086A87; color: white; padding: 5px; border-radius: 10px; text-decoration: none;' href='../controlador/ctrlRespuesta.php?accion=responder&id=";
		echo "<div>" . $enlace . $mens . "&idResp=". $idResp ."'> Responder</a></div></div>"; 
	?>
		</div>
	<?php
		$dao = new DaoMensaje();
		$respuestas = $dao->listadoRespuestaCoo($mens);
		if(count($respuestas)>0) {
		foreach($respuestas as $respuesta){
	?>
	<div class="respuestas">
				<h3>Respuesta</h3>
	<?php
		echo "<div class='cont'><div><b>Título: </b>". $respuesta['titulo'] ."</div>" .  "<div><b>Contenido: </b><br>" . $respuesta['contenido'] . "</div></div></div>";
		}
		}else{
	?>
		<div class="respuestas">
				<h3>Respuesta</h3>			
		<div class='cont'>Aun no hay respuestas</div>
		</div>
	<?php 
		}
		
		}}
		}else{
	?>
	<div class="info">
	<div class="mensajes">
				<h3>Mensaje</h3>			
		<div class='cont'>Aun no se han enviado mensajes</div>
	</div>
	</div>
	<?php
		}}
	}else{
   	?>
	<div class="info">
	<div class="mensajes">
				<h3>No has iniciado Sesión</h3>			
		<div class='cont'><a href="iniciarSesion.php">Iniciar Sesión</a></div>
	</div>
	</div>
	<?php } ?>
	</section>
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