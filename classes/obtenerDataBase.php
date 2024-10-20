<?php
try {
    require_once 'C:\xampp\htdocs\dsw7\recursos humano\classes\databaseHelper\consultas\consultasGeneral.php';

    $accion = '';
    $cedula = '';


    if (isset($_POST['accion']) ) {
        $accion = $_POST['accion'];
    }
    if (isset($_POST['cedula'])) {
        $cedula = $_POST['cedula'];
    }
    
    $consultas = new ConsultasGeneral();
    if($accion == 'verEspecifico') {
        $usuarios = $consultas->VerPlanillaEmpleado($cedula);
    }else {
        $usuarios = $consultas->VerEmpleado();
    }
    echo json_encode($usuarios);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);

}
?>
