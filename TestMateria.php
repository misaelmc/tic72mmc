<?php
require ('BD.php');
require ('header.php');
require ('menu.php');
require ('materia.php');

$materia=new materia();
$materia->seleccionaMaestro();

require ('footer.php');
?>
