<script src="jquery.min.js"></script>
<?php
require ('BD.php');
require ('materia.php');
require ('header.php');
$materia= new Materia();
if(isset($_REQUEST['id_materia_registro'])){

    $id_materia_registro=$_REQUEST['id_materia_registro'];

}else{

    $id_materia_registro=0;

}

if(isset($_REQUEST['id_materia'])){

    $id_materia=$_REQUEST['id_materia'];

}else{

    $id_materia=0;

}

if(isset($_REQUEST['idmae'])){

    $id_maestro = $_REQUEST['idmae'];

}else{

    $id_maestro=0;
    $materia->seleccionaMaestro();;

}

if(isset($_REQUEST['action'])){

    switch($_REQUEST['action']){

        case "Agregar":
            $materia->createMateriaMaestro($id_maestro,$id_materia);
            break;
        case"Eliminar":
            $materia->deleteMateriaMaestro($id_materia_registro);
            break;

    }

}
$materia->datosMaestro($id_maestro);
$materia->materiasAsignadas($id_maestro);
$materia->asignarMateriaMaestro($id_maestro);

require ('footer.php');
?>