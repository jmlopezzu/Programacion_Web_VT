<?php

session_start();

$conn = mysqli_connect(
    'localhost', //ubicación
    'root', //usuario
    '', //contraseña
    'bd_programweb' //nombre BD
);
/*
if (isset($conn)) {
    echo "BD conectada";
} 
else{
    echo "Nooo";
}*/

?>