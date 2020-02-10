<?php
    include('conexion.php');                                        
    $con = conectarBD();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background-image: url('img/fondobd.jpg'); background-size: cover;">
    <header>
    </header>
    
    
    <div class="tab-content">
        <!-- TAB AGREGAR -->
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="row">
                <!-- MENU TAB AGREGAR -->
                <div class="col-3 h-100" style="overflow: auto">
                    <ul class="nav nav-pills flex-column grey lighten-2 py-4">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">Mis datos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab1-2" role="tab">Mis pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab1-3" role="tab">Mis tarjetas</a>
                        </li>
                    </ul>
                </div>
                <!-- TABS TAB AGREGAR -->
                <div class="col tab-content">
                    <!-- 1 -->
                    <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                        <h4 class="text-center font-weight-bold mb-3">Mis datos</h4>
                        <div class="table-responsive table-striped scrollable-table">
                            <table class="table">
                                <tbody>
                                    <?php
                                        $query ="SELECT * FROM usuarios WHERE id={$_GET['id']}";

                                        $result = $con->query($query);
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr><td><b>Nombre: </b></td><td>".$row['nombre']."</td></tr>";
                                            echo "<tr><td><b>Apellidos: </b></td><td>".$row['apellido']."</td></tr>";
                                            echo "<tr><td><b>Correo: </b></td><td>".$row['correo']."</td></tr>";
                                            echo "<tr><td><b>Contraseña: </b></td><td>".$row['clave'][0]."****</td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- 2 -->
                    <div class="tab-pane fade" id="tab1-2" role="tabpanel">
                        <h4 class="text-center font-weight-bold mb-3">Mis pedidos</h4>
                        <div class="table-responsive table-striped scrollable-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Número de compra</th>
                                        <th>Fecha de compra</th>
                                        <th>Ver ticket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query ="SELECT * FROM venta WHERE usuario={$_GET['id']}";

                                        $result = $con->query($query);
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr><td>".$row['id']."</td><td>".$row['fecha']."</td><td><a class='btn btn-outline-primary' onclick='verTicket({$row['id']})'>Ver</a></td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- 3 -->
                    <div class="tab-pane fade" id="tab1-3" role="tabpanel">
                        <h4 class="text-center font-weight-bold mb-3">Mis tarjetas</h4>
                        <div class="table-responsive table-striped scrollable-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Número de tarjeta</th>
                                        <th>Beneficiario</th>
                                        <th>Fecha de vencimiento(mes-año)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query ="SELECT * FROM venta WHERE usuario={$_GET['id']}";

                                        $result = $con->query($query);
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr><td>".$row['target']."</td><td>".$row['nombre']."</td><td>".$row['fecha']."</td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modalBusqueda" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Ticket de compra</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="bodyModal">
                    
                </div>
                <div class="modal-footer">
                    <input type="text" name="type" id="idImprimir" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="imprimirTicket()">Imprimir</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function verTicket(numero){
            console.log(numero);
            $.get("ticket1.php?compra="+numero,
                function (datos){
                    $("#bodyModal").html(datos);
                    $("#modalBusqueda").modal('show');
                    $("#idImprimir").val(numero);
                    console.log(datos);
                }
            );
        }
        function imprimirTicket(){
            var numero = $("#idImprimir").val();
            console.log(numero);
            window.open("generarPDF.php?compra="+numero, "Diseño Web", "width=720, height=720")
        }
    </script>
                                    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
