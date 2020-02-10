<?php

    function crearFooter($clases="sticky-bottom mt-4"){
        echo
        "<footer class='page-footer text-center font-small".$clases."'>
            <div class='footer-copyright py-3'>
                © 2020 Proyecto Programación Web
            </div>
        </footer>";
    }

    function conectarBD(){
        $con = new mysqli("localhost","root","","proyectoPW");
        $con->set_charset('utf8');
        if ($con->connect_errno){
            echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
        }
        return $con;
    }
?>
