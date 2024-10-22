<?php

class getDistrito {
    private $pdo;

    public function initializeDB() {
        require_once 'C:\xampp\htdocs\dsw7\recursos humano\classes\databaseHelper\conexion\conexion.php';

        $this->pdo = $pdo;
    }

    public function closeDB() {
        $this->pdo = null;
    }


    public function consulta($id) {
        $this->initializeDB();


        try{

            $this->pdo->beginTransaction();
            
            $stmt = $this->pdo->prepare('SELECT codigo_distrito, nombre_distrito FROM distrito where  codigo_provincia = :codigo_provincia');
            $stmt->bindParam(':codigo_provincia', $id);
            
            $stmt->execute();
            
            $this->pdo->commit();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->closeDB();

            echo json_encode($result);
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            $this->closeDB();

            echo 'Error: ' . $e->getMessage();
        }
    }
}

$id = $_GET['id'];
$distrito = new getDistrito;
$distrito->consulta($id)


?>