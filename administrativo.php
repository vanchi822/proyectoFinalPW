<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    }
    include('conectar.php');
    $con = conectarBD();
    $fecha = date("Y-m-d");
    $hoy=getdate();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administrar noticias</title>
    <!-- Font Awesome -->
    <!-- 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    -->
    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body style="background-image: url('img/fondobd.jpg'); background-size: cover;">
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">
            <!--img id='logo' class='d-block img-fluid rounded float-left mr-2' src='/img/logo.png' alt='404'-->
            
                <a class="navbar-brand" href="#">
                    <strong>Bienvenido al administrador de noticias</strong>
                </a>

                <a class="btn btn-dark" role="button" href="login.php?cerrarse=1">Cerrar sesión</a>
            </div>
        </nav>
    </header>
    <main style="margin-top: 60px;">
        <!--div class="mask rgba-black-light justify-content-center"-->
        <div class="container mt-3 pt-3">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto">
                    <!-- CARD PRINCIPAL -->
                    <div class="card">
                        <div class="card-header">
                            <!-- <h4 class="font-weight-bold text-center">Bienvenido al administrador de noticias</h4> -->
                            <!-- <a class="btn" href="#">Cerrar sesión</a> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="opciones-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="opciones"
                                aria-expanded="true">Agregar a tablas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="vistas-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="vista"
                                aria-expanded="false">Ver/Modificar tablas</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body pb-2" style="min-height: 70vh;">
                            <?php
                                if(isset($_GET['hecho'])){
                                    echo
                                    "<div class='alert alert-success alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>¡Hecho!</strong> Los datos han sido guardados.
                                    </div>";
                                }else if(isset($_GET['error'])){
                                    echo
                                    "<div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>¡Error!</strong> Hubo un problema al guardar los datos. Intenta de nuevo.
                                    </div>";
                                }
                            ?>

                            <!-- AQUÍ EMPIEZA EL TAB CENTRAL -->
                            <div class="tab-content">
                                <!-- TAB AGREGAR -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                    <div class="row">
                                        <!-- MENU TAB AGREGAR -->
                                        <div class="col-3 h-100" style="overflow: auto">
                                            <ul class="nav nav-pills flex-column grey lighten-2 py-4">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">Noticias</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- TABS TAB AGREGAR -->
                                        <div class="col tab-content">
                                            <!-- Noticia -->
                                            <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                                <h5 class="text-center font-weight-bold mb-3">Noticias</h5>
                                                <form id="form1" action='guardarNoticia.php' method='post'>
                                                    <div class="form-group row">
                                                        <label for="titulo" class="col-2 col-lg-3 col-form-label font-weight-bold">Título</label>
                                                        <div class="col-6">
                                                            <input type="text" name="titulo" class="form-control" placeholder="Título">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="direccion" class="col-2 col-lg-3 col-form-label font-weight-bold">Autor</label>
                                                        <div class="col-6">
                                                            <input type="text" name="autor" class="form-control" placeholder="Autor">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="extension" class="col-2 col-lg-3 col-form-label font-weight-bold">Contenido</label>
                                                        <div class="col-6">
                                                            <textarea name="contenido" class="form-control validate" placeholder="Ingrese el contenido de la noticia aquí"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ciudad" class="col-2 col-lg-3 col-form-label font-weight-bold">Fecha</label>
                                                        <div class="col-6">
                                                            <input type="date" name="fecha1" class="form-control" <?php echo "value=\"$fecha\""; ?> disabled>
                                                            <input type="date" name="fecha" class="form-control" <?php echo "value=\"$fecha\""; ?> hidden>
                                                        </div>
                                                    </div>
                                                    <?php $hora=($hoy['hours']<10 ? "0".$hoy['hours'] : $hoy['hours']).":".($hoy['minutes']<10 ? "0".$hoy['minutes'] : $hoy['minutes']); ?>
                                                    <div class="form-group row">
                                                        <label for="ciudad" class="col-2 col-lg-3 col-form-label font-weight-bold">Hora</label>
                                                        <div class="col-6">
                                                            <input type="text" name="hora1" class="form-control" <?php echo "value=\"$hora\""; ?> disabled>
                                                            <input type="text" name="hora" class="form-control" <?php echo "value=\"$hora\""; ?> hidden>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="extension" class="col-2 col-lg-3 col-form-label font-weight-bold">Link de la imagen</label>
                                                        <div class="col-6">
                                                            <input type="text" name="link" class="form-control" placeholder="Extensión">
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

                                <!-- TAB MODIFICAR -->
                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                    <div class="row">
                                        <!-- MENU TAB MODIFICAR -->
                                        <div class="col-3 h-100" style="overflow: auto">
                                            <ul class="nav nav-pills flex-column grey lighten-2 py-4">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab3-1" role="tab">Noticias</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- TABS TAB MODIFICAR -->
                                        <div class="col tab-content">
                                            <div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
                                                <h5 class="text-center font-weight-bold mb-3">Noticias</h5>
                                            </div>

                                            <div class="table-responsive table-striped scrollable-table">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Título</th>
                                                            <th>Autor</th>
                                                            <th>Contenido</th>
                                                            <th>Fecha</th>
                                                            <th>Hora</th>
                                                            <th>Likes</th>
                                                            <th>Link</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            //echo "HOLA";
                                                            $query ="SELECT * FROM noticias";

                                                            $result = $con->query($query);
                                                            while($row = $result->fetch_assoc()){
                                                                $noticia = "";
                                                                if(strlen( $row['contenido'] )>100){
                                                                    for($i=0; $i<100; $i=$i+1){
                                                                        //echo "{$row['contenido'][$i]}";
                                                                        $noticia .= "{$row['contenido'][$i]}";
                                                                    }
                                                                    $noticia .= "...";
                                                                    //echo "$noticia";
                                                                } else {
                                                                    $noticia = $row['contenido'];
                                                                }
                                                                echo "<tr><td>".$row['titulo']."</td><td>".$row['autor']."</td><td>$noticia</td><td>".$row['fecha']."</td><td>".$row['hora']."</td><td>".$row['likes']."</td><td>".$row['link']."</td><td><a class='text-info' href=\"modificarNoticia.php?id={$row['id']}\">Modifcar</a><br><a class='text-danger' onclick='borrar({$row['id']})'>Eliminar</a></td></tr>";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- AQUÍ TERMINA TAB CENTRAL -->
                        </div>

                        <div class="modal fade" id="eliminarNoticia" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Noticia</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Está seguro que desea eliminar esta tupla?</p>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <form action="eliminarNoticia.php" method="POST">
                                                <input type="text" name="id" id="codigoBorrar" hidden>
                                                <button type="submit" class="btn btn-success" onclick="">Aceptar</button>
                                            </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <!-- TERMINA CARD PRINCIPAL -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        crearFooter();
    ?>

    <script type="text/javascript">
        function borrar(codigo){
            $("#eliminarNoticia").modal('show');
            $("#codigoBorrar").val(codigo);
        }
    </script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
        // Animaciones
        new WOW().init();
    </script>
</body>

</html>
