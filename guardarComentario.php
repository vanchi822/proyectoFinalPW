<?php
    include('conectar.php');
    $con = conectarBD();
    if(isset($_GET['like'])){
        $id = $_GET['id'];
        $likes = $_GET['like'];
        $likes += 1;
        echo "$likes";
        $query = "UPDATE noticias SET likes=$likes WHERE id=$id";
        $result = $con->query($query);
        if($result){
            header('Location: noticia.php?id='.$id);
        } else {
            echo "Ocurrió un error"; 
        }
    } else {
        $comentario=$_POST['comentario'];
        $nickname=$_POST['nickname'];
        $id=$_GET['id'];
        $hoy=getdate();
        $fecha=date('Y-m-d');
        $hora=($hoy['hours']<10 ? "0".$hoy['hours'] : $hoy['hours']).":".($hoy['minutes']<10 ? "0".$hoy['minutes'] : $hoy['minutes']);

        $query="INSERT INTO comentario(nickname,comenterio,id_noticia,fecha,hora) VALUES ('$nickname',
                '$comentario',$id,'$fecha','$hora');";
        $result=$con->query($query);
        $con->close();
        if($result){
            header('Location: noticia.php?id='.$id);
        }
        else{
            header('Location: inicio.php');
        }
    }
?>