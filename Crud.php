<?php

class Crud{

    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $telefono;
    private $calle;
    private $estado;
    private $cp;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $estatus;

    public function createUsuario($nombre,$apellidop,$apellidom,$telefono,$calle,$estado,$cp,$correo,$usuario,$contrasena,$nivel){

        $sql03 = "Insert into usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Telefono,Calle,Estado,Cp,Correo,Usuario,Contrasena,Nivel,Estatus) values ('$nombre','$apellidop','$apellidom','$telefono','$calle','$estado','$cp','$correo','$usuario','$contrasena','$nivel','1');";
        $result03 = mysql_query($sql03) or die ("Error consulta sql03= ".mysql_error());
    }

    public function readUsuarioG(){

        $sql01 = "SELECT * FROM usuario WHERE Estatus = 1 ORDER BY ApellidoPaterno ASC;";
        $result01 = mysql_query($sql01) or die ("Error consulta sql01= ".mysql_error());

        echo "<div class='table-responsive'>";

        echo "<table class='table table-hover'>";

        echo "<center><strong>Consulta General</strong></center>";

        echo "<tr><td>Clave</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Tel&eacute;fono</td><td>Calle</td><td>Estado</td><td>CP</td><td>Nivel</td></tr>";

        while ($field = mysql_fetch_array($result01)){

            $this->id = $field['Id'];
            $this->nombre = $field['Nombre'];
            $this->apellidoPaterno = $field['ApellidoPaterno'];
            $this->apellidoMaterno = $field['ApellidoMaterno'];
            $this->telefono = $field['Telefono'];
            $this->calle = $field['Calle'];
            $this->estado = $field['Estado'];
            $this->cp = $field['Cp'];
            $this->correo = $field['Correo'];
            $this->usuario = $field['Usuario'];
            $this->contrasena = $field['Contrasena'];
            $this->nivel = $field['Nivel'];
            $this->estatus = $field['Estatus'];
            switch($this->nivel){

                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
                default;

            }

            echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$this->telefono</td><td>$this->calle</td><td>$this->estado</td><td>$this->cp</td><td>$type</td></tr>";

        }

        echo "</table>";

        echo "</div>";

    }

    public function readUsuarioS($id){

        $sql02 = "SELECT * FROM usuario WHERE Id=$id ORDER BY ApellidoPaterno ASC;";
        $result02 = mysql_query($sql02) or die ("Error consulta sql01= ".mysql_error());

        echo "<div class='table-responsive'>";

        echo "<table class='table table-hover'>";

        echo "<center><strong>Consulta espec&iacute;fica</strong></center>";

        echo "<tr><td>Clave</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Tel&eacute;fono</td><td>Calle</td><td>Estado</td><td>CP</td><td>Nivel</td></tr>";

        while ($field = mysql_fetch_array($result02)){

            $this->id = $field['Id'];
            $this->nombre = $field['Nombre'];
            $this->apellidoPaterno = $field['ApellidoPaterno'];
            $this->apellidoMaterno = $field['ApellidoMaterno'];
            $this->telefono = $field['Telefono'];
            $this->calle = $field['Calle'];
            $this->estado = $field['Estado'];
            $this->cp = $field['Cp'];
            $this->correo = $field['Correo'];
            $this->usuario = $field['Usuario'];
            $this->contrasena = $field['Contrasena'];
            $this->nivel = $field['Nivel'];
            $this->estatus = $field['Estatus'];
            switch($this->nivel){

                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
                default;

            }

            echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$this->telefono</td><td>$this->calle</td><td>$this->estado</td><td>$this->cp</td><td>$type</td></tr>";

        }

        echo "</table>";

        echo "</div>";

    }

    public function updateUsuario($id,$nombre,$apellidop,$apellidom,$telefono,$calle,$estado,$cp,$correo,$usuario,$contrasena,$nivel){

        $sql04 = "update usuario set Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Telefono='$telefono',Calle='$calle',Estado='$estado',Cp='$cp',Correo='$correo',Usuario='$usuario',Contrasena='$contrasena',Nivel='$nivel',Estatus='1' where Id = $id;";
        $result04 = mysql_query($sql04) or die ("Error consulta sq04= ".mysql_error());

    }

    public function deleteUsuario($id){

        $sql05 = "delete from usuario where Id = $id";
        $result05 = mysql_query($sql05) or die ("Error consulta sql05= ".mysql_error());

    }

}

?>