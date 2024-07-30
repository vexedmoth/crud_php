<?php

//Permite almacenar datos del usuario de la sesion del navegador. Cuando se llama a session_start() se inicia o se reanuda la sesion actual. 
session_start();



$connection = mysqli_connect(
    "localhost",
    "root",
    "",
    "crud_php_db"
);


?>