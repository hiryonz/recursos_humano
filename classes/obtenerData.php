<?php
    require_once 'databaseHelper/consultas/consultasGeneral.php';
    require_once 'Empleado.php';
    require_once 'Planilla.php';
            

            $accion = $_POST['accion'] ?? "";
    
            // Obtener datos del formulario
            $nombre = $_POST['nombre1'] ?? "";
            $segundoNombre = $_POST['nombre2'] ?? "";
            $primerApellido = $_POST['apellido1'] ?? "";
            $segundoApellido = $_POST['apellido2'] ?? "";
            $usaACasado = $_POST['usa_apellidoC']  ?? "";
            $apellidoCasado = $_POST["apellidoCasado"] ??"";
            $cedula = $_POST['cedula'] ?? "";
            $turno = $_POST['horario'] ?? "";
            $estadoCivil = $_POST['estadoCivil'] ?? "";
            $genero = $_POST['genero'] ?? "";
            $departamento = $_POST['departamento'] ?? "";
            $provincia = $_POST['provincia'] ?? "";
            $distrito = $_POST['distrito'] ?? "";
            $corregimiento = $_POST['corregimiento'] ?? "";
            $correo = $_POST['correo'] ?? "";
            $telefono = $_POST['telefono'] ?? "";
            $salarioInicial = "";//$_POST['salarioInicial'];
            $horasTrabajada = $_POST['horas_trabajadas'] ?? "";
            $salarioHora = $_POST['sal_hora'] ?? "";
            $salarioBruto = $_POST['salario_bruto'] ?? "";
            $salarioNeto = $_POST['salario_neto'] ?? "";  
            $descuento1 = $_POST['descuento1'] ?? "";
            $descuento2 = $_POST['descuento2'] ?? "";
            $descuento3 = $_POST['descuento3'] ?? "";
            $seguroSocial = $_POST['seguro_social'] ?? "";
            $seguroEducativo = $_POST['seguro_educativo'] ?? "";
            $IR = $_POST['ir'] ?? "";
            $deducciones = $_POST['deducciones'] ?? "";
            $bonos = 0;
            $nPlanilla = 0;
            $nPocision = $_POST['numero_pocision'] ?? '';
            $horasTrabajadas = $_POST['horas_trabajadas'] ?? "";
    

            //isntanciar la clase consultasGeneral
            $consultaGeneral = new ConsultasGeneral();

           // Instanciación de la clase Empleado
           $empleado = new Empleado(
            $cedula,
            $nombre,
            $segundoNombre,
            $primerApellido,
            $segundoApellido,
            $genero,
            $estadoCivil,
            $usaACasado,
            $apellidoCasado,
            $departamento,
            $distrito,
            $correo,
            $telefono,
            $provincia,
            $corregimiento
        );

        // Instanciación de la clase Planilla
        $planilla = new Planilla(
            $salarioInicial,
            $salarioHora,
            $salarioBruto,
            $salarioNeto,
            $descuento1,
            $descuento2,
            $descuento3,
            $seguroSocial,
            $seguroEducativo,
            $IR,
            $deducciones,
            $bonos,
            $nPlanilla,
            $nPocision,
            $horasTrabajadas
        );



        if($accion == 'eliminar'){
            $consultaGeneral->delete($cedula);
        }elseif ($accion == 'actualizar'){
            $consultaGeneral->updateData($empleado, $planilla);
        }else {
            $consultaGeneral->insertData($empleado, $planilla);
        }

?>