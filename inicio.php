<?php
    include('conectar.php');
    $con = conectarBD();

    $hoy = getdate();
    //echo "{$hoy['weekday']}";
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </style>
  </head>
  <body>

    <div class="fixed-top">
        <div class="container-fluid bg-primary text-white" style="height: 70px; display:flex; align-items: center; justify-content: space-between;">
            <div style="display: flex;"><div><img src="img/fondobd.jpg" alt="logo" style="height: 55px;"></div><div><h1 class="text-center">Noticias PW</h1></div></div>
            <div><h3><?php echo "{$hoy['weekday']} {$hoy['mday']} of {$hoy['month']} of {$hoy['year']}"; ?></h3></div>
            <div>
                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook ml-4"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter-square ml-4"></i></a>
                <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube ml-4"></i></a>
            </div>
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
        <div class="row">
            <div class="col-8 titulo1" style="margin-top: 150px;"><h4 style="font-style: italic; text-align: center;"><strong>NOTICIAS DESTACADAS</strong></h4></div>
            <div class="col-4 titulo1" style="margin-top: 150px;"><h4 style="font-style: italic; text-align: center;"><strong>ÚLTIMAS NOTICIAS</strong></h4></div>
            <div class="col-8" style="display:flex; flex-wrap: wrap;">
                <?php
                    $query = "SELECT * FROM noticias ORDER BY likes DESC";

                    if(isset($_GET['orden'])){
                        if($_GET['orden']==1){
                            $query = "SELECT * FROM noticias ORDER BY titulo ASC";
                        }
                    }
                    $result = $con->query($query);
                    if($result){
                        //echo "No pasa"; 
                        $cont1 = 0;
                        while($row = $result->fetch_assoc() and $cont1<3){
                            echo "<div style=\"display:flex;\">";
                            $cont2 = 0;
                            do {
                                echo"<div class=\"card noticiaA\" style=\"width: 15rem;\">
                                        <img src=\"{$row['link']}\" class=\"card-img-top\" alt=\"No carga\">
                                            <div class=\"card-body\">
                                                <a href=\"noticia.php?id={$row['id']}\" class=\"card-title\">{$row['titulo']}</a>
                                                <p>Me gusta totales: {$row['likes']}</p>
                                            </div>
                                    </div>";
                                $cont2 += 1;
                            } while($cont2<=2 and $row = $result->fetch_assoc());
                            echo "</div>";
                            $cont1 += 1;
                        }
                    }
                ?>
            </div>
            <div class="col-4">
                <?php 
                    $query = "SELECT * FROM noticias ORDER BY fecha DESC, hora DESC;";
                    if(isset($_GET['orden'])){
                        if($_GET['orden']==3){
                            $query = "SELECT * FROM noticias ORDER BY fecha ASC";
                        } elseif($_GET['orden']==2){
                            $query = "SELECT * FROM noticias ORDER BY titulo ASC";
                        }
                    }
                    $result = $con->query($query);
                    if($result){
                        $cont1 = 0;
                        while($row = $result->fetch_assoc() and $cont1<6){              
                            echo"<div class=\"card mb-3\" style=\"max-width: 540px\">
                                    <div class=\"row no-gutters\">  
                                        <div class=\"col-md-4\">
                                            <img src=\"img/fondobd.jpg\" class=\"card-img\" alt=\"No carga\">
                                        </div>
                                        <div class=\"col-md-8\">
                                            <div class=\"card-body\">
                                                <p class=\"card-text\">{$row['fecha']}    {$row['hora']}hrs</p>
                                                <h6 class=\"card-title\"><a href=\"noticia.php?id={$row['id']}\">{$row['titulo']}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>";          
                            $cont1 += 1;
                        }
                    }
                ?>
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



