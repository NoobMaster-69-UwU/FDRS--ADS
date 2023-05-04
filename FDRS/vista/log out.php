<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FDRS</title> 
</head>
<body>
<?php
    session_start();

    session_unset();

    session_destroy();

    //echo "<div style='background-color: red; width: 100%; margin-top: 5%; padding: auto;'><h1 style='text-align: center; color: white; font-size: 40px;'>Has salido de tu cuenta</h1></div>";
   // echo "<div style='width: 100%;'><i><h1 style='text-align:center;'>Esperamos volver a verte...</h1></i></div>  <a style='margin-left: 44%; border-radius:10px; background-color:rgba(0, 116, 217, 0.9); text-decoration: none; color: white; font-size: 23px;padding:7px' href='../index.php'>Volver al inicio</a>";
   require "../vista/vistaUsuario.php";
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../vista/js/SweetAlert2.js"></script>
</body>
</html>