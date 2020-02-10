<?php
    include('conectar.php');
    $con = conectarBD();

    if(isset($_GET['hecho'])){
        //echo "Se debe de guardar las cosas";
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $contenido = $_POST['contenido'];
        $fecha = $_POST['fecha'];
        $link = $_POST['link'];
        $query = "UPDATE noticias SET titulo='$titulo',autor='$autor',contenido='$contenido',link='$link' WHERE id=$id;";
        $result = $con->query($query);
        $con->close();
        if($result){
           header('Location: administrativo.php?hecho=1');
        }else{
            header('Location: administrativo.php?error=1');
        }
    } else {
        $id = $_GET['id'];

        $query = "SELECT * FROM noticias WHERE id=$id";
        $result = $con->query($query);

        while($row = $result->fetch_assoc())
            $descripcion = $row;
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modificaciones</title>
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body style="background-image: url('img/fondobd.jpg'); background-size: cover;">
    <header>
    </header>
    <main>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="font-weight-bold text-center">Bienvenido al administrador de noticias</h4>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="opciones-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="opciones"
                                  aria-expanded="true">Noticia</a>
                              </li>
                            </ul>
                        </div>

                        <div class="card-body pb-2" style="min-height: 80vh;">
                            <div class="tab-content">
                                <!-- TAB MODIFICAR -->
                                <div class="tab-pane fade active show"  id="tab1" role="tabpanel">
                                    <div class="row">
                                        <!-- MENU TAB MODIFICAR -->
                                        <div class="col-3 h-100" style="overflow: auto">
                                            <ul class="nav nav-pills flex-column grey lighten-2 py-4">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">Noticia</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- TABS TAB MODIFICAR -->
                                        <div class="col tab-content">
                                            <!--Noticia-->
                                            <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                                <h5 class="text-center font-weight-bold mb-3">Noticia</h5>
                                                <form id="form1" <?php echo "action='modificarNoticia.php?hecho=1&id=$id'"; ?> method='post'>
                                                    <div class="form-group row">
                                                        <label for="titulo" class="col-2 col-lg-3 col-form-label font-weight-bold">Título</label>
                                                        <div class="col-6">
                                                            <input type="text" name="titulo" class="form-control" placeholder="Título" <?php echo "value=\"{$descripcion['titulo']}\"" ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="direccion" class="col-2 col-lg-3 col-form-label font-weight-bold">Autor</label>
                                                        <div class="col-6">
                                                            <input type="text" name="autor" class="form-control" placeholder="Autor" <?php echo "value=\"{$descripcion['autor']}\"" ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="extension" class="col-2 col-lg-3 col-form-label font-weight-bold">Contenido</label>
                                                        <div class="col-6">
                                                            <textarea name="contenido" class="form-control validate" placeholder="Ingrese el contenido de la noticia aquí"><?php echo "{$descripcion['contenido']}\"" ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ciudad" class="col-2 col-lg-3 col-form-label font-weight-bold">Fecha</label>
                                                        <div class="col-6">
                                                            <input type="date" name="fecha" class="form-control" <?php echo "value=\"{$descripcion['fecha']}\"" ?> disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ciudad" class="col-2 col-lg-3 col-form-label font-weight-bold">Fecha</label>
                                                        <div class="col-6">
                                                            <input type="text" name="fecha" class="form-control" <?php echo "value=\"{$descripcion['hora']}\"" ?> disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="extension" class="col-2 col-lg-3 col-form-label font-weight-bold">Link de la imagen</label>
                                                        <div class="col-6">
                                                            <input type="text" name="link" class="form-control" placeholder="Extensión" <?php echo "value=\"{$descripcion['link']}\"" ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <div class="col-auto ml-auto">
                                                            <button type="submit" class="btn btn-md btn-success" onclick="">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        crearFooter();
    ?>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
        // Animaciones
        new WOW().init();
    </script>
</body>

</html>
