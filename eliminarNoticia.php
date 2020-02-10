<?php

    include('conectar.php');
    $con = conectarBD();

    $id = $_POST['id'];
    
    $query = "DELETE FROM noticias WHERE id=$id";

    $result = $con->query($query);
    $con->close();
    if($result){
        header('Location: administrativo.php?hecho=1');
    }else{
        header('Location: administrativo.php?error=1');
    }
?>