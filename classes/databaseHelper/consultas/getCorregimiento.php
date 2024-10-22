<?php

class getCorregimiento {
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
            
            $stmt = $this->pdo->prepare('SELECT codigo_corregimiento, nombre_corregimiento FROM corregimiento where  codigo_distrito = :codigo_distrito');
            $stmt->bindParam(':codigo_distrito', $id);
            
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
$corregimiento = new getCorregimiento;
$corregimiento->consulta($id)

?>