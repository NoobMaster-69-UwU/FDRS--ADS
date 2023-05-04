<?php 
    if(!isset($_SESSION)){session_start();}
    if(isset($_SESSION['relacion'])){
        $rel = $_SESSION['relacion'];
            if ($rel =='coordinador'){
                $link = '<a class="active" href="../vista/CRUD.php">';
                $linke = '<a href="../vista/vistaCoordinador.php">';
                $lin = '<a href="../vista/historial.php">';
            }else{
                $link = '<a class="active" href = "../vista/perfil.php">';
                $linke = '<a href="../vista/vistaUsuario.php">';
                $lin = '<a href="../vista/mensajes.php">';
                
            }
        }
    $linke = '<a href="../vista/vistaUsuario.php">';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/inicio.css">
	<link rel="stylesheet" type="text/css" href="../vista/CSS/footer.css">
	<meta name="viewport" content="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<title>FDRS</title>
</head>
<body>
    <header>
        <div class="navegacion">
        <img src="../vista/img/FDRSlog.png">
            <nav>
        <?php echo $linke; ?>Inicio</a>
            <a href='../vista/ayuda.php'>Ayuda</a>
        <?php if(isset($_SESSION['idUsuario'])){ echo $lin ?>Mensajes</a>
        <?php 
                echo $link . $_SESSION['relacion'] . ", " . $_SESSION['nombre']; ?></a> 
            </nav>
        </div>
        
        <section class="textos-header">
            <h1>Bienvenid@</h1>
        </section>
    </div>
    			<!-- Smoothie blogs (sitio para el efecto)-->	
			<div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C157.73,101.14 347.90,-54.77 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>

    <?php }else{ ?>
                <a href='../vista/registrar.php'>Registrarse</a></li>
                <a href='../vista/sesion.php'>Iniciar Sesión</a>
            </nav>
        </div>
    <section class="textos-header">
            <h1>Sistema FDRS</h1>
            <h2>para el CDB</h2>
        </section>
    </div>
     <!-- Smoothie blogs (sitio para el efecto)-->	
     <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C157.73,101.14 347.90,-54.77 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>    
    <?php }?>
    </header>
</body>
</html>