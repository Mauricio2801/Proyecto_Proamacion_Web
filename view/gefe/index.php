<?php
  session_start();
    
  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != "gefe"){
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
                  Hola Gefe 
                  <?php echo ucfirst($_SESSION['nombre']); ?>
                  <a href="../../ajax/cerrarSesion.php">
                    <button type="button" name="button">Cerrar sesion</button>
                  </a></br>
                  <!-- boton para realizar reserva -->
                  <a class="btn btn-primary btn-lg" href="#" role="button">Realizar reserva</a> </br>
                  <a class="btn btn-secondary  btn-lg" href="#" role="button">Reservas pendientes</a> <br>
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

<!-- Modal AGREGAR, MODIFICAR Y ELIMINAR -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloEvento">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="txtID" name="txtID">
                    <input type="hidden" id="txtFecha" name="txtFecha" />


                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Titulo:</label>
                            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Hora:</label>

                            <!-- agregamos el plugin del reloj -->
                            <div class="input-group clockpicker" data-autoclose="true">

                                <input type="text" id="txtHora" value="10:30" class="form-control" />
                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <label>Descripcion:</label>
                        <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>

                        <div class="form-group">
                            <label>Color:</label>
                            <input type="color" value="#ff0000" id="txtColor" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                    <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


 


    <script src="../../js/funcion_fullcalendar.js"></script>

  </body>
</html>
