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

    
    public function insertData(Empleado $empleado){

        $this->initializeDB();

        try {
            // preparar  la consulta
            
            $stmt = $this->pdo->prepare("
            INSERT INTO EMPLEADO (
                cedula, nombre, `segundo Nombre`, Apellido, `segundo Apellido`, genero,
                `Usa A.C`, `apellido de casada`, `turno/hora`, departamento, direccion, 
                correo, telefono, `horas trabajadas`, `Salario x hora`, 
                `Salario bruto`, `Seguro social`, `Seguro Educativo`, `Impuesto/Renta`, 
                `Descuento 1`, `Descuento 2`, `Descuento 3`, Deduciones, `Salario neto`, bonos, 
                `n plantilla`, `n posicion`, provincia, corregimiento
            ) 
            VALUES (
                :cedula, :nombre, :segundoNombre, :primerApellido, :segundoApellido, :genero,
                :usaAC, :apellidoCasada, :turnoHora, :departamento, :direccion, 
                :correo, :telefono, :horasTrabajadas, :salarioHora, 
                :salarioBruto, :seguroSocial, :seguroEducativo, :impuestoRenta, 
                :descuento1, :descuento2, :descuento3, :deducciones, :salarioNeto, :bonos, 
                :nPlantilla, :nPosicion, :provincia, :corregimiento
            )
        ");
        


            // Asignar valores a variables primero
            $cedula = $empleado->getCedula();
            $nombre = $empleado->getNombre();
            $segundoNombre = $empleado->getSegundoNombre();
            $primerApellido = $empleado->getPrimerApellido();
            $segundoApellido = $empleado->getSegundoApellido();
            $genero = $empleado->getGenero();
            $usaAC = ""; // O el valor correspondiente
            $apellidoCasada = $empleado->getSegundoApellido();
            $turnoHora = $empleado->getTurno();
            $departamento = $empleado->getDepartamento();
            $direccion = $empleado->getDistrito();
            $correo = $empleado->getCorreo();
            $telefono = $empleado->getTelefono();
            $horasTrabajadas = $empleado->getHoraTrabajada();
            $salarioHora = $empleado->getSalarioHora();
            $salarioBruto = $empleado->getSalarioBruto();
            $seguroSocial = $empleado->getSeguroSocial();
            $seguroEducativo = $empleado->getSeguroEducativo();
            $impuestoRenta = $empleado->getIR();
            $descuento1 = $empleado->getDescuento1();
            $descuento2 = $empleado->getDescuento2();
            $descuento3 = $empleado->getDescuento3();
            $deducciones = $empleado->getDeducciones();
            $salarioNeto = $empleado->getSalarioNeto();
            $bonos = $empleado->getBonos();
            $nPlantilla = $empleado->getNPlanilla();
            $nPosicion = $empleado->getNPocision();
            $provincia = $empleado->getProvincia();
            $corregimiento = $empleado->getCorregimiento();

            // Luego pasa las variables a bindParam()
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':segundoNombre', $segundoNombre);
            $stmt->bindParam(':primerApellido', $primerApellido);
            $stmt->bindParam(':segundoApellido', $segundoApellido);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':usaAC', $usaAC);
            $stmt->bindParam(':apellidoCasada', $apellidoCasada);
            $stmt->bindParam(':turnoHora', $turnoHora);
            $stmt->bindParam(':departamento', $departamento);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':horasTrabajadas', $horasTrabajadas);
            $stmt->bindParam(':salarioHora', $salarioHora);
            $stmt->bindParam(':salarioBruto', $salarioBruto);
            $stmt->bindParam(':seguroSocial', $seguroSocial);
            $stmt->bindParam(':seguroEducativo', $seguroEducativo);
            $stmt->bindParam(':impuestoRenta', $impuestoRenta);
            $stmt->bindParam(':descuento1', $descuento1);
            $stmt->bindParam(':descuento2', $descuento2);
            $stmt->bindParam(':descuento3', $descuento3);
            $stmt->bindParam(':deducciones', $deducciones);
            $stmt->bindParam(':salarioNeto', $salarioNeto);
            $stmt->bindParam(':bonos', $bonos);
            $stmt->bindParam(':nPlantilla', $nPlantilla);
            $stmt->bindParam(':nPosicion', $nPosicion);
            $stmt->bindParam(':provincia', $provincia);
            $stmt->bindParam(':corregimiento', $corregimiento);

            


            $stmt->execute();
            echo "se inserto correctamente";
            
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
        }
        //$this->closeDB();
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