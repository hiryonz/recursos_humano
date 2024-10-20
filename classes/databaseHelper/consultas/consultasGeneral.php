<?php


class ConsultasGeneral {
    private $pdo;


    public function initializeDB() {
        require_once 'C:\xampp\htdocs\dsw7\recursos humano\classes\databaseHelper\conexion\conexion.php';

        $this->pdo = $pdo;
    }

    public function closeDB() {
        $this->pdo = null;
    }

    
    public function insertData(Empleado $empleado, Planilla $planilla) {

        $this->initializeDB();

        try {
            // Iniciamos una transacción
            $this->pdo->beginTransaction();
    
            // Primera consulta: Insertar en la tabla EMPLEADO
            $stmtEmpleado = $this->pdo->prepare("
                INSERT INTO EMPLEADO (
                    cedula, nombre, `segundo Nombre`, Apellido, `segundo Apellido`, genero,
                    `estado civil`, `Usa A.C`, `apellido de casada`, `turno/hora`, departamento, distrito, 
                    correo, telefono, `provincia`, `corregimiento`
                ) 
                VALUES (
                    :cedulaEmpleado, :nombre, :segundoNombre, :primerApellido, :segundoApellido, :genero,
                    :estadoCivil, :usaAC, :apellidoCasada, :turnoHora, :departamento, :distrito, 
                    :correo, :telefono, :provincia, :corregimiento
                )
            ");


            //insert para planilla
            $stmtPlanilla = $this->pdo->prepare("
                INSERT INTO Planilla (
                    cedula, `horas trabajadas`, `salario x hora`, `n planilla`, `n posicion`,
                    `salario bruto`, `Seguro social`, `Seguro Educativo`, `Impuesto/Renta`,
                    `Descuento 1`, `Descuento 2` , `Deduciones`, `Salario neto`
                )
                VALUES (
                    :cedulaPlanilla, :horasTrabajadas, :salarioHora, :nPlantilla, :nPosicion,
                    :salarioBruto, :seguroSocial, :seguroEducativo, :impuestoRenta,
                    :descuento1, :descuento2, :deducciones, :salarioNeto
                )
            ");
    
            // Asignar valores a variables
            $cedulaEmpleado = $empleado->getCedula();
            $nombre = $empleado->getNombre();
            $segundoNombre = $empleado->getSegundoNombre();
            $primerApellido = $empleado->getPrimerApellido();
            $segundoApellido = $empleado->getSegundoApellido();
            $genero = $empleado->getGenero();
            $estadoCivil = $empleado->getEstadoCivil();
            $usaAC = $empleado->getUsaAC();
            $apellidoCasada = $empleado->getApellidoCasada();
            $turnoHora = $empleado->getTurno() || '';
            $departamento = $empleado->getDepartamento();
            $distrito = $empleado->getDistrito();
            $correo = $empleado->getCorreo();
            $telefono = $empleado->getTelefono();
            $provincia = $empleado->getProvincia();
            $corregimiento = $empleado->getCorregimiento();

            // Asignación de parámetros en $stmtEmpleado
            $stmtEmpleado->bindParam(':cedulaEmpleado', $cedulaEmpleado);
            $stmtEmpleado->bindParam(':nombre', $nombre);
            $stmtEmpleado->bindParam(':segundoNombre', $segundoNombre);
            $stmtEmpleado->bindParam(':primerApellido', $primerApellido);
            $stmtEmpleado->bindParam(':segundoApellido', $segundoApellido);
            $stmtEmpleado->bindParam(':genero', $genero);
            $stmtEmpleado->bindParam(':estadoCivil', $estadoCivil);
            $stmtEmpleado->bindParam(':usaAC', $usaAC);
            $stmtEmpleado->bindParam(':apellidoCasada', $apellidoCasada);
            $stmtEmpleado->bindParam(':turnoHora', $turnoHora);
            $stmtEmpleado->bindParam(':departamento', $departamento);
            $stmtEmpleado->bindParam(':distrito', $distrito);
            $stmtEmpleado->bindParam(':correo', $correo);
            $stmtEmpleado->bindParam(':telefono', $telefono);
            $stmtEmpleado->bindParam(':provincia', $provincia);
            $stmtEmpleado->bindParam(':corregimiento', $corregimiento);

            // Suponiendo que $planilla es una instancia de la clase Planilla
            $horasTrabajadas = $planilla->getHorasTrabajadas();
            $salarioHora = $planilla->getSalarioHora();
            $nPlantilla = $planilla->getNPlanilla();
            $nPosicion = $planilla->getNPosicion();
            $salarioBruto = $planilla->getSalarioBruto();
            $seguroSocial = $planilla->getSeguroSocial();
            $seguroEducativo = $planilla->getSeguroEducativo();
            $impuestoRenta = $planilla->getIR();
            $descuento1 = $planilla->getDescuento1();
            $descuento2 = $planilla->getDescuento2();
            $deducciones = $planilla->getDeducciones();
            $salarioNeto = $planilla->getSalarioNeto();

            // Asignación de parámetros en $stmtPlanilla
            $stmtPlanilla->bindParam(':cedulaPlanilla', $cedulaEmpleado); // Mismo cedula que en empleado
            $stmtPlanilla->bindParam(':horasTrabajadas', $horasTrabajadas);
            $stmtPlanilla->bindParam(':salarioHora', $salarioHora);
            $stmtPlanilla->bindParam(':nPlantilla', $nPlantilla);
            $stmtPlanilla->bindParam(':nPosicion', $nPosicion);
            $stmtPlanilla->bindParam(':salarioBruto', $salarioBruto);
            $stmtPlanilla->bindParam(':seguroSocial', $seguroSocial);
            $stmtPlanilla->bindParam(':seguroEducativo', $seguroEducativo);
            $stmtPlanilla->bindParam(':impuestoRenta', $impuestoRenta);
            $stmtPlanilla->bindParam(':descuento1', $descuento1);
            $stmtPlanilla->bindParam(':descuento2', $descuento2);
            $stmtPlanilla->bindParam(':deducciones', $deducciones);
            $stmtPlanilla->bindParam(':salarioNeto', $salarioNeto);


            $stmtEmpleado->execute();
            $stmtPlanilla->execute();
    
            $this->pdo->commit();   
    
            $message = "Datos correctamente ingresado!";
            header('Location: ../components/formulario_empleado.php?status=success&message=' . urlencode($message));
            $this->closeDB();
            exit; 
            
        
        } catch (Exception $err) {
            // En caso de error, revertimos la transacción
            $this->pdo->rollBack();
            $message = "Error: " . $err->getMessage();
            header('Location: ../components/formulario_empleado.php?status=failure&message=' . $message);
            $this->closeDB();
            exit;
        }
    }

    public function updateData(Empleado $empleado, Planilla $planilla ){
        $this->initializeDB();

        try {

            $this->pdo->beginTransaction();

            $stmtEmpleado = $this->pdo->prepare("
                UPDATE EMPLEADO 
                SET
                    nombre = :nombre,
                    `segundo Nombre` = :segundoNombre,
                    Apellido = :primerApellido,
                    `segundo Apellido` = :segundoApellido,
                    genero = :genero,
                    `estado civil` = :estadoCivil,
                    `Usa A.C` = :usaAC,
                    `apellido de casada` = :apellidoCasada,
                    `turno/hora` = :turnoHora,
                    departamento = :departamento,
                    distrito = :distrito,
                    correo = :correo,
                    telefono = :telefono,
                    provincia = :provincia,
                    corregimiento = :corregimiento
                WHERE
                    cedula = :cedulaEmpleado
            ");

           // Consulta para actualizar en la tabla Planilla
            $stmtPlanilla = $this->pdo->prepare("
                UPDATE Planilla SET
                    `horas trabajadas` = :horasTrabajadas, 
                    `salario x hora` = :salarioHora, 
                    `n planilla` = :nPlantilla, 
                    `n posicion` = :nPosicion,
                    `salario bruto` = :salarioBruto, 
                    `Seguro social` = :seguroSocial, 
                    `Seguro Educativo` = :seguroEducativo, 
                    `Impuesto/Renta` = :impuestoRenta,
                    `Descuento 1` = :descuento1, 
                    `Descuento 2` = :descuento2, 
                    `Deduciones` = :deducciones, 
                    `Salario neto` = :salarioNeto
                WHERE cedula = :cedulaPlanilla
            ");

                $cedulaEmpleado = $empleado->getCedula();
                $nombre = $empleado->getNombre();
                $segundoNombre = $empleado->getSegundoNombre();
                $primerApellido = $empleado->getPrimerApellido();
                $segundoApellido = $empleado->getSegundoApellido();
                $genero = $empleado->getGenero();
                $estadoCivil = $empleado->getEstadoCivil();
                $usaAC = $empleado->getUsaAC();
                $apellidoCasada = $empleado->getApellidoCasada();
                $turnoHora = $empleado->getTurno() || '';
                $departamento = $empleado->getDepartamento();
                $distrito = $empleado->getDistrito();
                $correo = $empleado->getCorreo();
                $telefono = $empleado->getTelefono();
                $provincia = $empleado->getProvincia();
                $corregimiento = $empleado->getCorregimiento();

                // Asignación de parámetros en $stmtEmpleado
                $stmtEmpleado->bindParam(':cedulaEmpleado', $cedulaEmpleado);
                $stmtEmpleado->bindParam(':nombre', $nombre);
                $stmtEmpleado->bindParam(':segundoNombre', $segundoNombre);
                $stmtEmpleado->bindParam(':primerApellido', $primerApellido);
                $stmtEmpleado->bindParam(':segundoApellido', $segundoApellido);
                $stmtEmpleado->bindParam(':genero', $genero);
                $stmtEmpleado->bindParam(':estadoCivil', $estadoCivil);
                $stmtEmpleado->bindParam(':usaAC', $usaAC);
                $stmtEmpleado->bindParam(':apellidoCasada', $apellidoCasada);
                $stmtEmpleado->bindParam(':turnoHora', $turnoHora);
                $stmtEmpleado->bindParam(':departamento', $departamento);
                $stmtEmpleado->bindParam(':distrito', $distrito);
                $stmtEmpleado->bindParam(':correo', $correo);
                $stmtEmpleado->bindParam(':telefono', $telefono);
                $stmtEmpleado->bindParam(':provincia', $provincia);
                $stmtEmpleado->bindParam(':corregimiento', $corregimiento);

                $horasTrabajadas = $planilla->getHorasTrabajadas();
                $salarioHora = $planilla->getSalarioHora();
                $nPlantilla = $planilla->getNPlanilla();
                $nPosicion = $planilla->getNPosicion();
                $salarioBruto = $planilla->getSalarioBruto();
                $seguroSocial = $planilla->getSeguroSocial();
                $seguroEducativo = $planilla->getSeguroEducativo();
                $impuestoRenta = $planilla->getIR();
                $descuento1 = $planilla->getDescuento1();
                $descuento2 = $planilla->getDescuento2();
                $deducciones = $planilla->getDeducciones();
                $salarioNeto = $planilla->getSalarioNeto();

                // Asignación de parámetros en $stmtPlanilla
                $stmtPlanilla->bindParam(':cedulaPlanilla', $cedulaEmpleado); // Mismo cedula que en empleado
                $stmtPlanilla->bindParam(':horasTrabajadas', $horasTrabajadas);
                $stmtPlanilla->bindParam(':salarioHora', $salarioHora);
                $stmtPlanilla->bindParam(':nPlantilla', $nPlantilla);
                $stmtPlanilla->bindParam(':nPosicion', $nPosicion);
                $stmtPlanilla->bindParam(':salarioBruto', $salarioBruto);
                $stmtPlanilla->bindParam(':seguroSocial', $seguroSocial);
                $stmtPlanilla->bindParam(':seguroEducativo', $seguroEducativo);
                $stmtPlanilla->bindParam(':impuestoRenta', $impuestoRenta);
                $stmtPlanilla->bindParam(':descuento1', $descuento1);
                $stmtPlanilla->bindParam(':descuento2', $descuento2);
                $stmtPlanilla->bindParam(':deducciones', $deducciones);
                $stmtPlanilla->bindParam(':salarioNeto', $salarioNeto);


            $stmtEmpleado->execute();
            $stmtPlanilla->execute();
    
            $this->pdo->commit();   
    
            $message = "Datos correctamente actualizado!";
            header('Location: ../components/formulario_empleado.php?status=success&message=' . urlencode($message));
            $this->closeDB();
            exit; 
                        
        } catch (Exception $err) {
            $this->pdo->rollBack();
            $message = "Error al actualizar datos: " . $err->getMessage();
            header('Location: ../components/formulario_empleado.php?status=failure&message=' . urlencode($message));
            $this->closeDB();
            exit;
        }
    }


    function VerEmpleado() {
            $this->initializeDB();

            try {
                // preparar  la consulta
                $this->pdo->beginTransaction();

                $stmtEmpleado = $this->pdo->prepare("SELECT * FROM EMPLEADO");

                $stmtPlanilla = $this->pdo->prepare("SELECT * FROM PLANILLA"); 

                $stmtEmpleado->execute();
                $stmtPlanilla->execute();

                $this->pdo->commit();

                $empleados = $stmtEmpleado->fetchAll(PDO::FETCH_ASSOC);
                $planilla = $stmtPlanilla->fetchAll(PDO::FETCH_ASSOC);
                return 
                [
                    'empleado' => $empleados,
                    'planilla' => $planilla,
                ];

            }catch (Exception $err){
                echo "Error: " . $err->getMessage();
            }

    }


    function VerPlanillaEmpleado($cedula) {
        $this->initializeDB();

        try {
            $this->pdo->beginTransaction();

            $stmtPlanilla = $this->pdo->prepare("SELECT * FROM Planilla where cedula = :cedula");
            $stmtEmpleado = $this->pdo->prepare("SELECT * FROM EMPLEADO where cedula = :cedula");

            $stmtPlanilla->bindParam(':cedula', $cedula);
            $stmtEmpleado->bindParam(':cedula', $cedula);

            $stmtPlanilla->execute();
            $stmtEmpleado->execute();

            $this->pdo->commit();

            $empleados = $stmtEmpleado->fetchAll(PDO::FETCH_ASSOC);
            $planilla = $stmtPlanilla->fetchAll(PDO::FETCH_ASSOC);

            $this->closeDB();
            return 
            [
                'empleado' => $empleados,
                'planilla' => $planilla,
            ];

        }catch (Exception $err){
            $this->closeDB();
            echo "Error: " . $err->getMessage();
        }

    }



    function delete($cedula) {
        $this->initializeDB();

        try {
            $this->pdo->beginTransaction();

            $stmtEmpleado = $this->pdo->prepare("DELETE FROM EMPLEADO WHERE Cedula = :cedula");
            $stmtPlanilla = $this->pdo->prepare("DELETE FROM PLANILLA WHERE Cedula = :cedula");

            $stmtEmpleado->bindParam(":cedula", $cedula);
            $stmtPlanilla->bindParam(":cedula", $cedula);

            $stmtEmpleado->execute();
            $stmtPlanilla->execute();

            $this->pdo->commit();

            header('Content-Type: application/json');
            $response = [
                'status' => 'success',
                'message' => 'Datos correctamente borrado!'
            ];  

            echo json_encode($response);
            $this->closeDB();
            exit;  

        }catch(Exception $err) {
            $this->pdo->rollBack();

            header('Content-Type: application/json');
            $response = [
                'status' => 'error',
                'message' => 'Error: ' . $err->getMessage()
            ];  

            echo json_encode($response);
            exit;      
        }
    }



    function getEmpleadoValues(Empleado $empleado) {
        //asgnar los valores de empleado
        return [
            'cedula' => $empleado->getCedula(),
            'nombre' => $empleado->getNombre(),
            'segundoNombre' => $empleado->getSegundoNombre(),
            'primerApellido' => $empleado->getPrimerApellido(),
            'segundoApellido' => $empleado->getSegundoApellido(),
            'genero' => $empleado->getGenero(),
            'estadoCivil' => $empleado->getEstadoCivil(),
            'usaAC' => $empleado->getUsaAC(),
            'apellidoCasada' => $empleado->getApellidoCasada(),
            'turnoHora' => $empleado->getTurnoHora(),
            'departamento' => $empleado->getDepartamento(),
            'distrito' => $empleado->getDistrito(),
            'correo' => $empleado->getCorreo(),
            'telefono' => $empleado->getTelefono(),
            'provincia' => $empleado->getProvincia(),
            'corregimiento' => $empleado->getCorregimiento(),
        ];
    }


    function getPlanillaValue(Planilla $planilla) {
            // Asignar valores para planilla
            return  $planilla =[
                'horasTrabajadas' -> $planilla->getHorasTrabajadas(),
                'salarioHora' -> $planilla->getSalarioHora(),
                'nPlantilla' -> $planilla->getNPlanilla(),
                'nPosicion' -> $planilla->getNPosicion(),
                'salarioBruto' -> $planilla->getSalarioBruto(),
                'seguroSocial' -> $planilla->getSeguroSocial(),
                'seguroEducativo' -> $planilla->getSeguroEducativo(),
                'impuestoRenta' -> $planilla->getIR(),
                'descuento1' -> $planilla->getDescuento1(),
                'descuento2' -> $planilla->getDescuento2(),
                'descuento3' -> $planilla->getDescuento3(),
                'deducciones' -> $planilla->getDeducciones(),
                'salarioNeto' -> $planilla->getSalarioNeto(),
            ];

    }

}


?>