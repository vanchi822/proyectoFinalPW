<?php
    if(isset($_GET['cerrarse'])){
        session_start();
        session_destroy();
        header('Location: login.php'); 
    }
    if(isset($_POST['enviado'])){
        //echo "Enviado";
        include('conectar.php');
        $con = conectarBD();
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['passw'];
        $query = "SELECT * FROM usuario WHERE nombre='$usuario' AND contrasena='$clave';";
        $result = $con->query($query);
        $con->close();
        if($result->num_rows){
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['id']=$row['id'];
            //echo "Yuju";
            header('Location: administrativo.php');
        }else{
            header('Location: login.php');
            //echo "Yuju :C:";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body class="h-100">

    <div class="view" style="background-image: url('img/fondobd.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row wow fadeIn">
                    <div class="col-md-6 mb-4 white-text text-center text-md-left">

                        <h1 class="display-4 font-weight-bold">Las mejores noticias</h1>

                        <hr class="hr-light">

                        <p class="mb-4 d-none d-md-block">
                            <strong>Fany e Ivan le traen a usted, hasta la comodidad de su hogar las mejores noticias. Solo haga click en el botón de abajo para disfrutar de esta mágica experiencia.</strong>
                        </p>

                        <a href="inicio.php" class="btn btn-indigo btn-lg">
                            Ir al sitio web
                            <i class="fa fa-info-circle ml-2"></i>
                        </a>

                    </div>
                    <div class="col-md-6 col-xl-5 mb-4">
                        <?php
                            if(isset($_GET['error'])){
                                echo
                                "<div class='alert alert-danger' role='alert'>
                                    Datos incorrectos
                                </div>";
                            }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <form name="" action='login.php' method="post">
                                    <h3 class="dark-grey-text text-center">
                                        <strong>Iniciar Sesión Administrativa</strong>
                                    </h3>
                                    <hr>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <input id="form1" type="text" name="usuario" class="form-control">
                                        <label for="form1">Usuario</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-key prefix grey-text"></i>
                                        <input id="form2" type="password" name="passw" class="form-control">
                                        <label for="form2">Contraseña</label>
                                    </div>

                                    <div class="text-center">
                                        <button name="enviado" class="btn btn-success">OK</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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