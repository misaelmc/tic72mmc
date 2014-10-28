<?php

require ('Crud.php');
require ('BD.php');
require ('header.php');
require ('menu.php');

$usuario = new Crud();

if(isset($_POST['submit'])){

switch($_POST['submit']){

case "Alta":
echo "<div class='alert alert-info' role='alert'>";
    echo "<br>";
    echo "Formulario de ".$_POST['submit'];
    echo "</div>";
$usuario->createUsuario($_POST['nombre'],$_POST['apellidop'],$_POST['apellidom'],$_POST['telefono'],$_POST['calle'],$_POST['estado'],$_POST['cp'],$_POST['correo'],$_POST['usuario'],$_POST['contrasena'],$_POST['nivel']);
break;
case "Borrar":
echo "<div class='alert alert-danger' role='alert'>";
    echo "<br>";
    echo "Bot&oacute;n: ".$_POST['submit'];
    echo "</div>";
$usuario->deleteUsuario($_POST['idb']);
break;
case "Modificar":
echo "<div class='alert alert-info' role='alert'>";
    echo "<br>";
    echo "Bot&oacute;n: ".$_POST['submit'];
    echo "</div>";
$usuario->updateUsuario($_POST['idm'],$_POST['nombre'],$_POST['apellidop'],$_POST['apellidom'],$_POST['telefono'],$_POST['calle'],$_POST['estado'],$_POST['cp'],$_POST['correo'],$_POST['usuario'],$_POST['contrasena'],$_POST['nivel']);
break;
case "Buscar":
echo "<div class='alert alert-info' role='alert'>";
    echo "<br>";
    echo "Bot&oacute;n: ".$_POST['submit'];
    echo "</div>";
$usuario->readUsuarioS($_POST['idbuscar']);
break;

}

}

echo "<div class='table-responsive'>";

    echo "<form name='Crud' action='CrudPrincipal.php' method='POST'>";

        echo "<table class='table table-hover'>";

            echo "<tr><td colspan='4' align='center'><strong>Usuarios</strong></td></tr>";

            echo "<tr><td align='right'>Nombres:</td><td><input type='text' name='nombre'></td>";

            echo "<td align='right'>Apellido Paterno:</td><td><input type='text' name='apellidop'></td></tr>";

            echo "<tr><td align='right'>Apellido Materno:</td><td><input type='text' name='apellidom'></td>";

            echo "<td align='right'>Tel&eacute;fono:</td><td><input type='text' name='telefono'></td></tr>";

            echo "<tr><td align='right'>Calle:</td><td><input type='text' name='calle'></td>";

            echo "<td align='right'>Estado:</td><td><input type='text' name='estado'></td></tr>";

            echo "<tr><td align='right'>CP:</td><td><input type='text' name='cp'></td>";

            echo "<td align='right'>Correo:</td><td><input type='text' name='correo'></td></tr>";

            echo "<tr><td align='right'>Usuario:</td><td><input type='text' name='usuario'></td>";

            echo "<td align='right'>Contrase&ntilde;a:</td><td><input type='password' name='contrasena'></td></tr>";

            echo "<tr><td colspan='4'align='center'>Nivel:<select name='nivel'>

                        <option value='1'>Administrador</option>
                        <option value='2'>Maestro</option>
                        <option value='3'>Alumno</option>

                    </select>
                </td></tr>";

            echo "<tr><td align='center' colspan='4'><input type='submit' name='submit' value='Alta'></td></tr>";

            echo "<tr><td align='center' colspan='4'>ID: <input type='text' name='idm'><input type='submit' name='submit' value='Modificar'></td></tr>";

            echo "<tr><td align='center' colspan='4'>ID: <input type='text' name='idb'><input type='submit' name='submit' value='Borrar'></td></tr>";

            echo "<tr><td align='center' colspan='4'>ID: <input type='text' name='idbuscar'><input type='submit' name='submit' value='Buscar'></td></tr>";

            echo "<table>";

                echo "</form>";

    echo "</div>";

$usuario->readUsuarioG();

?>