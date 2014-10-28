<?php
class materia {

    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    Public function createmateria(){
        echo "<br> Create materia";
    }

    public function readmateria(){
        echo "<br>";
    }
    public function seleccionaMaestro(){
        echo"<form name=maestro action=ajax.php method=Post>";
        echo "<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td>Maestro:</td><td><select name='idmae'>";
        $sql="SELECT * FROM usuario WHERE estatus=1 and nivel =2 order by ApellidoPaterno";
        $query= mysql_query ($sql) or die ("Error al buscar los profesores");
        while ($field=mysql_fetch_array($query)){
            $cadena=utf8_decode($field['Nombre'])." ".utf8_decode($field['ApellidoPaterno'])." ".utf8_decode($field['ApellidoMaterno']);
            echo"<option value=".$field['Id'].">".$cadena."</option>";
        }
        echo"</select></td></tr>";
        echo"<tr><td><input type='Submit' value='Seleccionar'></td></tr>";
        echo"</table>";
        echo"</div>";
        echo"</form>";
    }
    public function MuestraMaestro($id){
        $sql="SELECT * FROM usuario WHERE id=$id";
        $query=mysql_query($sql) or die('Error al obtener el nombre del profesor');
        $cadena=utf8_decode(mysql_result($query,0,'Nombre'))." ".utf8_decode(mysql_result($query,0,'ApellidoPaterno'))." ".utf8_decode(mysql_result($query,0,'ApellidoMaterno'));
        echo"Profesor seleccionado: $cadena";
    }
    public function datosMaestro($id_maestro){
        $sql04 = "SELECT * FROM  usuario WHERE id= $id_maestro";
        $result04 = mysql_query($sql04) or die ("No se ejecuto la consulta $sql04");
        $existe = mysql_num_rows($result04);
        if ($existe > 0){
            $nombre = $id_maestro.")";
            $nombre .= "". mysql_result($result04,0,'ApellidoPaterno');
            $nombre .= "".mysql_result($result04,0,'ApellidoMaterno');
            $nombre .= "".mysql_result($result04,0,'Nombre');
            $nombre = utf8_decode($nombre);
            echo "<br> Maestro seleccionado: <strong>".$nombre."</strong>";
        }
    }
    public function materiasAsignadas($id_maestro){
        echo "<div class 'table-responsive'>";
        echo "<table class='table table-striped'>";
        echo "<tr><td calspan='2' aling='center'><strong>Materias Asignadas </strong></td></tr>";
        $sql01 = "SELECT * FROM  maestromateria  WHERE id_maestro=".$id_maestro.";";
        $result01 = mysql_query($sql01) or die (mysql_error());

        while ($field =mysql_fetch_array($result01)){
            $id =$field['id_materi'];
            $id_registro = $field['id'];
            $sql04 = "SELECT * FROM materia WHERE id_materia = ".$id.";";
            $result04 = mysql_query($sql04) or die (mysql_error());
            $nombre = utf8_decode(mysql_result($result04,0,'materia'));

            echo "<tr><td>$nombre</td><td><a href='ajax.php?action=Eliminar&idmae=".$id_maestro."&id_materia_registro=".$id_registro."'>Eliminar</a></td></tr>";
        }
        echo"</table>";
        echo "</div>";

    }
    public function asignarMateriaMaestro($id_maestro){
        if($id_maestro > 0){
            echo "<div class='table-responsive'>";

            echo '<form action="ajax.php" method="POST" name="materia">';

            echo "<table class='table table-hover'>";

            echo '<tr>';

            echo '<td><strong>Materias:</strong></td><td><select name="id_materia" id="id_materia">';

            $sql="select * from materia;";
            $consulta = mysql_query($sql) or die (mysql_error());
            $cuantos = mysql_num_rows($consulta);

            if($cuantos == 0){

                echo "<option value='0'>No disponible</option>";

            }else{

                $x = 0;
                for($y=0;$y < $cuantos;$y++){

                    $idMateria = mysql_result($consulta,$y,'id_materia');
                    $nomMateria = mysql_result($consulta,$y,'materia');

                    $sql2 = "select * from maestromateria where id_materi =".$idMateria." and id_maestro=".$id_maestro.";";
                    $consulta2 = mysql_query($sql2) or die (mysql_error());
                    $cuantos2 = mysql_num_rows($consulta2);
                    if($cuantos2 == 0){

                        echo '<option value="'.$idMateria.'">'.$nomMateria.'</option>';

                    }else{

                        $x = $x+1;

                    }
                    if($x == $cuantos){

                        echo "<option value='0'>No disponible</option>";

                    }

                }

            }

            echo '</select></td>';

            echo '</tr>';

            echo '<tr>';

            echo "<input type='hidden' name='idmae' value='$id_maestro'>";

            echo '<td colspan="2"><input type="submit" name="action" value="Agregar"></td>';

            echo '</tr>';

            echo '</table>';

            echo '</form>';

            echo "</div>";
        }
    }

    public function createMateriaMaestro($id_maestro,$id_materia){

        $sql = "select * from maestromateria where id_maestro=$id_maestro and id_materi=$id_materia";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos == 0 and $id_materia > 0){

            $sql2="insert into maestromateria (id_maestro,id_materi) values ($id_maestro,$id_materia);";
            $consulta2 = mysql_query($sql2) or die (mysql_error());

        }

    }

    public function deleteMateriaMaestro($id_materia_registro){

        if($id_materia_registro > 0){

            $sql = "delete from maestromateria where id = $id_materia_registro";
            $consulta = mysql_query($sql) or die (mysql_error());

        }

    }
}
?>