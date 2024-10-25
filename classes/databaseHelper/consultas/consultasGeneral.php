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
                INSERT INTO EMPLEADOS (
                    Cedula, Nombre, `Segundo_Nombre`, Apellido, `segundo_Apellido`, Genero,
                    `Usa_AC`, `Estado_Civil`,  `Apellido_Casada`, Departamento_ID,  
                    correo, telefono, `codigo_provincia`, codigo_distrito,  `codigo_corregimiento`
                ) 
                VALUES (
                    :cedulaEmpleado, :nombre, :segundoNombre, :primerApellido, :segundoApellido, :genero,
                    :usaAC, :estadoCivil,  :apellidoCasada, :departamento,  
                    :correo, :telefono, :provincia,:distrito,  :corregimiento
                )
            ");


            //insert para planilla
            $stmtPlanilla = $this->pdo->prepare("
                INSERT INTO Planilla (
                    Cedula_Empleado, `Horas_Trabajadas`, `Salario_Por_Hora`, `Numero_Posicion`,
                    `Salario_Bruto`, `Seguro_Social`, `Seguro_Educativo`, `Impuesto_Renta`,
                    `Descuento_1`, `Descuento_2` , `Deducciones`, `Salario_Neto`
                )
                VALUES (
                    :cedulaPlanilla, :horasTrabajadas, :salarioHora, :nPosicion,
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
            //$stmtPlanilla->bindParam(':nPlantilla', $nPlantilla);
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
                UPDATE EMPLEADOS 
                SET
                    Nombre = :nombre,
                    `Segundo_Nombre` = :segundoNombre,
                    Apellido = :primerApellido,
                    `Segundo_Apellido` = :segundoApellido,
                    Genero = :genero,
                    `Usa_AC` = :usaAC,
                    `Estado_Civil` = :estadoCivil,
                    `Apellido_Casada` = :apellidoCasada,
                    Departamento_ID = :departamento,
                    correo = :correo,
                    telefono = :telefono,
                    codigo_provincia = :provincia,
                    codigo_distrito = :distrito,
                    codigo_corregimiento = :corregimiento
                WHERE
                    cedula = :cedulaEmpleado
            ");

           // Consulta para actualizar en la tabla Planilla
            $stmtPlanilla = $this->pdo->prepare("
                UPDATE Planilla SET
                    `Horas_Trabajadas` = :horasTrabajadas, 
                    `Salario_Por_Hora` = :salarioHora, 
                    `Numero_Posicion` = :nPosicion,
                    `Salario_Bruto` = :salarioBruto, 
                    `Seguro_Social` = :seguroSocial, 
                    `Seguro_Educativo` = :seguroEducativo, 
                    `Impuesto_Renta` = :impuestoRenta,
                    `Descuento_1` = :descuento1, 
                    `Descuento_2` = :descuento2, 
                    `Deducciones` = :deducciones, 
                    `Salario_Neto` = :salarioNeto
                WHERE Cedula_Empleado = :cedulaPlanilla
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

                $stmtEmpleado = $this->pdo->prepare("SELECT * FROM EMPLEADOS");

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

            $stmtPlanilla = $this->pdo->prepare("SELECT * FROM planilla where Cedula_Empleado = :cedula");
            $stmtEmpleado = $this->pdo->prepare("SELECT * FROM empleados where Cedula = :cedula");

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

            $stmtEmpleado = $this->pdo->prepare("DELETE FROM EMPLEADOS WHERE Cedula = :cedula");
            $stmtPlanilla = $this->pdo->prepare("DELETE FROM PLANILLA WHERE Cedula_Empleado = :cedula");

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
            'turnoHora' => $empleado->getTurno(),
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