<?php
/**
 * Created by PhpStorm.
 * User: MAQ2-LAB2-TIC
 * Date: 17/09/14
 * Time: 07:30 PM
 */
require ('db.php');
class usuario {
    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contraseña;
    private $Nivel;
    private $Estatus;

public function createUsuario($Nombre,$ApellidoPaterno,$ApellidoMaterno,$Estatus){
    $insert01="INSERT INTO usuario (nombre,apellidopaterno,apellidomaterno,estatus)
               VALUES ('$Nombre','$ApellidoPaterno','$ApellidoMaterno',$Estatus);";
    $eje01=mysql_query($insert01) or die (mysql_error());
}

public function readUsuarioG(){
    echo "<div class='table-responsive'>";
    echo "<table weight='20px' heigt='20px' aling='center' class='table table-hover'>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido Paterno</th>";
    echo "<th>Apellido Materno</th>";
    echo "<th>Estatus</th>";
    echo "</tr>";
    $con=mysql_query("select * from usuario")or die(mysql_error());
    while($field=mysql_fetch_array($con))

    {
        $this->id=$field['id'];
        $this->nombre=$field['nombre'];
        $this->appat=$field['apellidopaterno'];
        $this->apmat=$field['apellidomaterno'];
        $this->estatus=$field['estatus'];

        echo "<tr>";
        echo "<td>";
        echo "".$this->id;
        echo "</td>";
        echo "<td>";
        echo "".$this->nombre;
        echo "</td>";
        echo "<td>";
        echo "".$this->appat;
        echo "</td>";
        echo "<td>";
        echo "".$this->apmat;
        echo "</td>";
        echo "<td>";
        echo "".$this->estatus;
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

}

public function readUsuarioS(){
    echo "<br>----readUsuario2";
    echo "<div class='table-responsive'>";
    echo "<table weight='20px' heigt='20px' aling='center' class='table table-hover'>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido Paterno</th>";
    echo "<th>Apellido Materno</th>";
    echo "<th>Estatus</th>";
    echo "</tr>";
    $con=mysql_query("select * from usuario where estatus=1")or die(mysql_error());
    while($field=mysql_fetch_array($con))
    {
        $this->id=$field['id'];
        $this->nombre=$field['nombre'];
        $this->appat=$field['apellidopaterno'];
        $this->apmat=$field['apellidomaterno'];
        $this->estatus=$field['estatus'];
        echo "<tr>";
        echo "<td>";
        echo "".$this->id;
        echo "</td>";
        echo "<td>";
        echo "".$this->nombre;
        echo "</td>";
        echo "<td>";
        echo "".$this->appat;
        echo "</td>";
        echo "<td>";
        echo "".$this->apmat;
        echo "</td>";
        echo "<td>";
        echo "".$this->estatus;
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

public function updateUsuario($Id,$Nombre,$ApellidoPaterno,$ApellidoMaterno,$Estatus){
    $update01="UPDATE usuario SET nombre='$Nombre',apellidopaterno='$ApellidoPaterno'
                                   ,apellidomaterno='$ApellidoMaterno' WHERE id=$Id;";
    $eje04=mysql_query($update01) or die (mysql_error());
}
public function deleteUsuario($Id){
    $delete01="DELETE * FROM usuario WHERE id=$Id;";
    $eje05=mysql_query($delete01) or die (mysql_error());
    echo "<br>----deleteUsuario";
}
}
require ('footer.php');
?>