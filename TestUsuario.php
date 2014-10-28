<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" src="bootstrap/js/jquery-1.4.2.min.js"></script><!--linea para ajax-->
    <script type="text/javascript" src="bootstrap/js/jquery-ui-1.8.2.custom.min.js"></script><!--linea para colocar calendario-->
    <script>
        $(function(){
            $("#btn-enviar").click(function(){
                var url = "createUsuario.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulario1").serialize(),
                    success: function(data)
                    {
                        $("#resultado1").html(data);
                    }
                });
                return false;
            });
        });
    </script>
</head>
<body>

<?php
require ('usuario.php');
require ('bd.php');

require ('header.php');
require ('menu.php');
?>

<?php

echo "<form method='post' id='formulario1' role='form'>";
echo "<div class='form-group'>";
echo "<table>";
echo "<tr>";
echo "<label for='Email'>Nombre</label>";
echo "<input type='text' name='Nombre' class='form-control' id='Nombre' placeholder='Introduce tu Nombre'>";
echo "</tr>";
echo "<tr>";
echo "<label for='Email'>Apellido Paterno</label>";
echo "<input type='text' name='ApellidoPaterno' class='form-control' id='ApellidoPaterno' placeholder='Introduce tu Apellido Paterno'>";
echo "</tr>";
echo "<tr>";
echo "<label for='Email'>Apellido Materno</label>";
echo "<input type='text' name='ApellidoMaterno' class='form-control' id='ApellidoMaterno' placeholder='Introduce tu Apellido Materno'>";
echo "</tr>";
echo "<tr>";
echo "<label for='Email'>Estatus</label>";
echo "<input type='text' name='Estatus' class='form-control' id='Estatus' placeholder='Introduce el Estatus'>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'><input class='btn btn-default' type='button' id='btn-enviar' value='Enviar'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo "</div>";
?>

<div id="resultado1"></div>

<?php
$usuario = new usuario();
$usuario->readUsuarioG();
?>

<?php
echo "<form method='post' id='formulario2' role='form'>";
echo "<div class='form-group'>";
echo "<table>";
echo "<tr>";
echo "<label for='Email'>Buscar</label>";
echo "<input type='text' name='Buscar' class='form-control' id='Buscar' placeholder='Introduce el criterio de busqueda'>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'><input class='btn btn-default' type='button' id='btn-buscar' value='Buscar'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo "</div>";
?>

<?php
$usuario->updateUsuario(1,'jose','diaz','lara',1);
/*$usuario->readUsuarioS();

$usuario->deleteUsuario();*/
?>

<?php
require ('footer.php');
?>

</body>
</html>