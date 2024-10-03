<?php
session_start();

$valor1 = isset($_SESSION["valor1"]) ? $_SESSION["valor1"] : 'Valor no establecido';
echo $valor1;
?>