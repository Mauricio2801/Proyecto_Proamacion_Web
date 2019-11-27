<?php
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != "maestro"){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../../index.html');
  }

?>


<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/moment.min.js"></script>

        <!-- Full calendar -->
        <link rel="stylesheet" href="../../css/fullcalendar.min.css">
        <script src="../../js/fullcalendar.min.js"></script>
        <script src="../../js/es.js"></script>

        <script src="../../js/bootstrap-clockpicker.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap-clockpicker.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Document</title>
  </head>
  <body>


  <div class="container">

<div class="row">
    
        <!-- el boton de iniciar sesion -->
        <div class="col">
                   <!-- ucfirst convierte la primera letra en mayusculas de una cadena -->
    Hola maestro 
    <?php echo ucfirst($_SESSION['nombre']); ?>
    <a href="../../ajax/cerrarSesion.php">
      <button type="button" name="button">Cerrar sesion</button>
    </a>
            </div>
      </div>

</div>

<!-- el del menu -->
<div class="container">

<div class="row">
    <!-- aqui va el calendario -->
        <div class="col"> 
                <br/> <div id="CalendarioWeb"> </div>
        </div>
        

</div>


 


    <script src="../../js/funcion_fullcalendar.js"></script>

  </body>
</html>
