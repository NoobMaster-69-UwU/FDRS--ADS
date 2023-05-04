<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="CSS/inicio.css">
	<link rel="stylesheet" type="text/css" href="CSS/footer.css">
	<meta name="viewport" content="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

	<title>FDRS</title>
</head>
<body>
    <?php 
		require 'header.php'; 
		
		if(!empty($_SESSION)){
			require 'index.html';
	 	}else{
			require 'inicio.php';
		}
	?>	
</body>
</html>