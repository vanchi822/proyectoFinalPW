<?php
    include('conectar.php');
    $con = conectarBD();

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $contenido = $_POST['contenido'];
    $fecha = $_POST['fecha'];
    //$likes = $_POST['likes'];
    $link = $_POST['link'];
    $hora = $_POST['hora'];

    $query = "INSERT INTO noticias(titulo,autor,contenido,fecha,hora,likes,link) VALUES ('$titulo', '$autor',
              '$contenido', '$fecha', '$hora', 0, '$link')";

    $result = $con->query($query);
    $con->close();
    if($result){
        header('Location: administrativo.php?hecho=1');        
    }else{
        header('Location: administrativo.php?error=1');
    }


?>