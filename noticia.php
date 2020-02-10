<?php
    include('conectar.php');
    $con = conectarBD();

    $hoy = getdate();
    //echo "{$hoy['weekday']}";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <style>
        .noticiaA{
            margin: 0px 5px 20px 15px;
        }
        .titulo1{
            color: blue;
            margin: 15px 0px;
        }
        .central{
            width: 80%;
            margin: 0 auto;
        }
        .contenido{
            width: 80%;
            margin: 10px auto;
            margin-top: 30px;
        }
    </style>
  </head>
  <body>

      
    <div class="fixed-top">
        <div class="container-fluid bg-primary text-white" style="height: 70px; display:flex; align-items: center; justify-content: space-between;">
            <div style="display: flex;"><div><img src="img/fondobd.jpg" alt="logo" style="height: 55px;"></div><div><h1 class="text-center">Noticias PW</h1></div></div>
            <div><h3><?php echo "{$hoy['weekday']} {$hoy['mday']} of {$hoy['month']} of {$hoy['year']}"; ?></h3></div>
            <div>Logos</div>
        </div>
     
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="inicio.php">Principal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">      
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cultura
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="inicio.php?orden=1">Exposiciones</a>
                <a class="dropdown-item" href="inicio.php?orden=1">Conciertos</a>
                <a class="dropdown-item" href="inicio.php?orden=1">Obras</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Política
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="inicio.php?orden=2">Presidente</a>
                <a class="dropdown-item" href="inicio.php?orden=2">Reformas</a>
                <a class="dropdown-item" href="inicio.php?orden=2">Concierto de Iván :3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Deportes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="inicio.php?orden=3">Fútbol</a>
                <a class="dropdown-item" href="inicio.php?orden=3">Lucha Libre</a>
                <a class="dropdown-item" href="inicio.php?orden=3">Basketball</a>
                </div>
            </li>
            </ul>
        </div>
        </nav>
    </div>

    <div class="container-fluid">
        <?php
            $id=$_GET['id'];
            $query = "SELECT * FROM noticias WHERE id=$id;";
            if(isset($_GET['orden'])){
                
            }
            $result = $con->query($query);
            
            if($result){
                $row = $result->fetch_assoc();
        ?>
                <div class="central" style="margin-top:130px;">
                    <br>
                    <div style="display: flex; justify-content: space-between; align-items: center">
                        <div><h5><?php echo "{$row['autor']} / {$row['fecha']} / {$row['hora']}";?></h5></div>
                        <div style="display: flex; align-items: center;">
                            <div><h6>Número de me gusta: <?php echo"{$row['likes']}"?></div>
                            <div><form <?php echo "action=\"guardarComentario.php?like={$row['likes']}&id=$id\""?>method="POST">
                                <button type="submit" class="btn btn-success" onclick="">Likear</button>
                            </form></div>
                        </div>
                    </div>
                    <hr>
                    <h2><strong><?php echo "{$row['titulo']}";?></strong></h2>
                    <div><img <?php echo "src=\"{$row['link']}\"";?> style="width: 100%;"></div>
                    <div class="contenido">
                        <p><?php echo "{$row['contenido']}";?></p>
                    </div>
        <?php
            }
        ?>
        <div style="margin-top:60px;">
            <div style="background-color: #eaeaea; border-radius: 20px; padding: 5px 30px; margin-bottom: 10px;">
            <div style="margin: 15px auto;"><h3 style="text-align: center;"><strong>Comienza la sección de comentarios.</strong><h3></div>
            <?php 
                $id = $_GET['id'];
                $query="SELECT * FROM comentario WHERE id_noticia=$id ORDER BY fecha DESC, hora DESC;";
                $result = $con->query($query);
                $con->close();
                while($row=$result->fetch_assoc()){
                    echo"<hr><div style=\"margin: 30px 0px;\"> 
                            <div><h4><strong>Escrito por: {$row['nickname']}</strong></h4></div>
                            <div><h6 style=\"color: #007723;\">Publicado: {$row['fecha']} / {$row['hora']}hrs</h6></div>
                            <p>{$row['comenterio']}</p> 
                        </div>";
                }
            ?>
                </div>

                <div style="background-color: #e7e7e7; border-radius: 20px;">
                    <form id="form1" <?php echo "action='guardarComentario.php?id=$id';"?> method='post'>
                        <div style="padding: 20px;"><h3 style="text-align: center;"><strong>Deja aquí tu comentario</strong></h3></div>
                        <div class="form-group row" style="margin-left: 15px;">
                            <label for="nickname" class="col-2 col-lg-3 col-form-label font-weight-bold">Nickname</label>
                            <div class="col-6">
                                <input type="text" name="nickname" class="form-control" placeholder="Nickname">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left: 15px;">
                            <label for="comentario" class="col-2 col-lg-3 col-form-label font-weight-bold">Comentario</label>
                            <div class="col-6">
                                <textarea name="comentario" class="form-control validate" placeholder="Ingrese su opinión aquí"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-auto ml-auto">
                                <button type="submit" class="btn btn-lg btn-success" onclick="">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    
    <?php
        crearFooter();
    ?>
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



