<?php
    require_once 'databaseHelper/consultas/consultasGeneral.php';
    require_once 'Empleado.php';
            
            // Obtener datos del formulario
            $nombre = $_POST['nombre1'];
            $segundoNombre = $_POST['nombre2'];
            $primerApellido = $_POST['apellido1'];
            $segundoApellido = $_POST['apellido2'];
            $usaACasado = 0;//$_POST['usaACasado'];
            $cedula = $_POST['cedula'];
            $turno = $_POST['horario'];
            $genero = $_POST['genero'];
            $departamento = $_POST['departamento'];
            $provincia = $_POST['provincia'];
            $distrito = $_POST['distrito'];
            $corregimiento = $_POST['corregimiento'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $salarioInicial = "";//$_POST['salarioInicial'];
            $horasTrabajada = $_POST['horas_trabajadas'];
            $salarioHora = $_POST['sal_hora'];
            $salarioBruto = $_POST['salario_bruto'];
            $salarioNeto = $_POST['salario_neto'];
            $descuento1 = $_POST['descuento1'];
            $descuento2 = $_POST['descuento2'];
            $descuento3 = $_POST['descuento3'];
            $seguroSocial = $_POST['seguro_social'];
            $seguroEducativo = $_POST['seguro_educativo'];
            $IR = $_POST['ir'];
            $deducciones = $_POST['deducciones'];
            $bonos = 0;
            $nPlanilla = 0;
            $nPocision = 0;
            
            /*
            $nombre = "re";
            $segundoNombre = "re";
            $primerApellido = "re";
            $segundoApellido = "re";
            $usaACasado = 0;//$_POST['usaACasado'];
            $cedula = 43;
            $turno = "re";
            $genero = "re";
            $departamento = "re";
            $provincia = "re";
            $distrito = "re";
            $corregimiento = "re";
            $correo = "423@543";
            $telefono = 0;
            $salarioInicial = 0;
            $horasTrabajada = 0;
            $salarioHora = 0;
            $salarioBruto = 0;
            $salarioNeto = 0;
            $descuento1 = 0;
            $descuento2 = 0;
            $descuento3 = 0;
            $seguroSocial = 0;
            $seguroEducativo = 0;
            $IR = 0;
            $deducciones = 0;
            $bonos = 0;
            $nPlanilla = 0;
            $nPocision = 0;
            */

            //isntanciar la clase consultasGeneral
            $consultaGeneral = new ConsultasGeneral();

            //instanciar la clase empleado
            $empleado = new Empleado(
                $nombre,
                $segundoNombre,
                $primerApellido,
                $segundoApellido,
                $usaACasado,
                $cedula,
                $genero,
                $turno,
                $departamento,
                $provincia,
                $distrito,
                $corregimiento,
                $correo,
                $telefono,
                $salarioInicial,
                $horasTrabajada,
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
                $nPocision
            );

            $consultaGeneral->insertData($empleado);


?>