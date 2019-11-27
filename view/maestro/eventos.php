

<?php

    header('Conect-Type: application/json');

     
    # Incluimos la clase conexion para poder heredar los metodos de ella.
    require_once "../../inc/config.php";

      // $con=new PDO("mysql:dbname=sistema;host=127.0.0.1","root","");
    
    
    //seleccionar los eventos del calendario

    $sentenciaSQL = $con->prepare('SELECT * FROM evento');
    $sentenciaSQL->execute();

      // si hay un valor que esta en la variable accion y que es diferente al vacio
      // vas a asignar direccatemen a la accion, si no es asi va a hacer accion+leer

      // va a ayudar que es lo que queire el usario, leer, modificar, eliminar
    $accion =(isset($_GET['accion']))?$_GET['accion']:'leer';

    switch($accion){
      
      case 'agregar':
        $sentenciaSQL = $con->prepare("INSERT INTO 
        eventos(title,descripcion,color,textColor,start,end)
        VALUES(:title,:descripcion,:color,:textColor,:start,:end)");

        $respuesta=$sentenciaSQL->execute(array(
          "title" =>$_POST['title'],
          "descripcion" =>$_POST['descripcion'],
          "color" =>$_POST['color'],
          "textColor" =>$_POST['textColor'],
          "start" =>$_POST['start'],
          "end" =>$_POST['end']
        ));

        echo json_encode($respuesta);
        break;

      case 'eliminar':
        $respuesta = false;

        // isset = hay algo en el id cuando me lo enviaste?
        if(isset($_POST['id'])){
          $sentenciaSQL = $con->prepare("DELETE FROM eventos WHERE id=:id");
          $respuesta = $sentenciaSQL->execute(array("id"=>$_POST['id']));
        }else{
          echo json_encode($respuesta);
        }
        
        break;


      case 'modificar':
         $sentenciaSQL = $con->prepare(("UPDATE eventos SET
         title =:title,
         descripcion=:descripcion,
         color=:color,
         textColor=:textColor,
         start=:start,
         end=:end
         WHERE id=:id
         "));

         $respuesta = $sentenciaSQL->execute(array(
           "id" =>$_POST['id'],
           "title" =>$_POST['title'],
           "descripcion" =>$_POST['descripcion'],
           "color" =>$_POST['color'],
           "textColor" =>$_POST['textColor'],
           "start" =>$_POST['start'],
           "end" =>$_POST['end']
         ));

         echo json_encode($respuesta);

        break;

        default:

        $fila = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        foreach ($fila as $row) {
          $json[] = array(
            'id' => $row['id_evento'],
            'title' => $row['motivo'],
            'descripcion' => $row['motivo'],
            'color' => $row['color'],
            
            'start' => $row['start'],
            'end' => $row['end']
          );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
      break;
    }

  


    

?>