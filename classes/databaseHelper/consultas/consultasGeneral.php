<?php



class ConsultasGeneral {
    private $pdo;


    public function initializeDB() {
        require '../conexion/conexion.php';
        $this->pdo = $pdo;
    }

    public function closeDB() {
        $this->pdo = null;
    }

    
    public function insertData(Empleado $empleado){
        $this->initializeDB();

        try {
            // preparar  la consulta
            $stmt = $this->pdo->prepare('
                INSERT INTO EMPLEADO (
                    id, nombre, segundoNombre, primerApellido, segundoApellido, 
                    cedula, turno, departamento, provincia, distrito, 
                    corregimiento, correo, telefono, salarioInicial, 
                    salarioHora, salarioBruto, salarioNeto, descuento, bonos, nPlanilla
                ) 
                VALUES (
                    :id, :nombre, :segundoNombre, :primerApellido, :segundoApellido, 
                    :cedula, :turno, :departamento, :provincia, :distrito, 
                    :corregimiento, :correo, :telefono, :salarioInicial, 
                    :salarioHora, :salarioBruto, :salarioNeto, :descuento, :bonos, :nPlanilla
                )
            ');

            // parametros 
            $stmt->bindParam(':id', $empleado->getId());
            $stmt->bindParam(':nombre', $empleado->getNombre());
            $stmt->bindParam(':segundoNombre', $empleado->getSegundoNombre());
            $stmt->bindParam(':primerApellido', $empleado->getPrimerApellido());
            $stmt->bindParam(':segundoApellido', $empleado->getSegundoApellido());
            $stmt->bindParam(':cedula', $empleado->getCedula());
            $stmt->bindParam(':turno', $empleado->getTurno());
            $stmt->bindParam(':departamento', $empleado->getDepartamento());
            $stmt->bindParam(':provincia', $empleado->getProvincia());
            $stmt->bindParam(':distrito', $empleado->getDistrito());
            $stmt->bindParam(':corregimiento', $empleado->getCorregimiento());
            $stmt->bindParam(':correo', $empleado->getCorreo());
            $stmt->bindParam(':telefono', $empleado->getTelefono());
            $stmt->bindParam(':salarioInicial', $empleado->getSalarioInicial());
            $stmt->bindParam(':salarioHora', $empleado->getSalarioHora());
            $stmt->bindParam(':salarioBruto', $empleado->getSalarioBruto());
            $stmt->bindParam(':salarioNeto', $empleado->getSalarioNeto());
            $stmt->bindParam(':descuento', $empleado->getDescuento());
            $stmt->bindParam(':bonos', $empleado->getBonos());
            $stmt->bindParam(':nPlanilla', $empleado->getNPlanilla());

            $stmt->execute();
            
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
        }
        $this->closeDB();
    }

    public function updateData(Empleado $empleado){
        $this->initializeDB();

        try {
            // preparar  la consulta
            $stmt = $this->pdo->prepare('
                UPDATE EMPLEADO SET
                    nombre = :nombre, 
                    segundoNombre = :segundoNombre, 
                    primerApellido = :primerApellido, 
                    segundoApellido = :segundoApellido, 
                    cedula = :cedula, 
                    turno = :turno, 
                    departamento = :departamento, 
                    provincia = :provincia, 
                    distrito = :distrito, 
                    corregimiento = :corregimiento, 
                    correo = :correo, 
                    telefono = :telefono, 
                    salarioInicial = :salarioInicial, 
                    salarioHora = :salarioHora, 
                    salarioBruto = :salarioBruto, 
                    salarioNeto = :salarioNeto, 
                    descuento = :descuento, 
                    bonos = :bonos, 
                    nPlanilla = :nPlanilla
                WHERE 
                    id = :id
            ');

            // parametros 
            $stmt->bindParam(':id', $empleado->getId());
            $stmt->bindParam(':nombre', $empleado->getNombre());
            $stmt->bindParam(':segundoNombre', $empleado->getSegundoNombre());
            $stmt->bindParam(':primerApellido', $empleado->getPrimerApellido());
            $stmt->bindParam(':segundoApellido', $empleado->getSegundoApellido());
            $stmt->bindParam(':cedula', $empleado->getCedula());
            $stmt->bindParam(':turno', $empleado->getTurno());
            $stmt->bindParam(':departamento', $empleado->getDepartamento());
            $stmt->bindParam(':provincia', $empleado->getProvincia());
            $stmt->bindParam(':distrito', $empleado->getDistrito());
            $stmt->bindParam(':corregimiento', $empleado->getCorregimiento());
            $stmt->bindParam(':correo', $empleado->getCorreo());
            $stmt->bindParam(':telefono', $empleado->getTelefono());
            $stmt->bindParam(':salarioInicial', $empleado->getSalarioInicial());
            $stmt->bindParam(':salarioHora', $empleado->getSalarioHora());
            $stmt->bindParam(':salarioBruto', $empleado->getSalarioBruto());
            $stmt->bindParam(':salarioNeto', $empleado->getSalarioNeto());
            $stmt->bindParam(':descuento', $empleado->getDescuento());
            $stmt->bindParam(':bonos', $empleado->getBonos());
            $stmt->bindParam(':nPlanilla', $empleado->getNPlanilla());

            $stmt->execute();
            
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
        }
        $this->closeDB();
    }


}


?>