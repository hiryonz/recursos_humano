<?php

class getProvincias {

    private $pdo;

    public function initializeDB() {
        require_once 'C:\xampp\htdocs\dsw7\recursos humano\classes\databaseHelper\conexion\conexion.php';

        $this->pdo = $pdo;
    }

    public function closeDB() {
        $this->pdo = null;
    }


    public function consulta() {
        $this->initializeDB();

        try {
            $this->pdo->beginTransaction();
        
            $stmt = $this->pdo->prepare('SELECT codigo_provincia, nombre_provincia FROM provincia');
            $stmt->execute();
        
            $this->pdo->commit();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        
            $this->closeDB();
        
            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            $this->closeDB();
            header('Content-Type: application/json');
            // Enviar un mensaje de error JSON
            echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
}


    $getProvincia = new getProvincias;
    $getProvincia->consulta();


?>
