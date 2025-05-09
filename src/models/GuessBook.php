<?php
    require_once __DIR__ . '/../../config/database.php';

    class GuessBook {
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->connect();
        }

        public function save($name, $guessbook){
            $stmt = $this->conn->prepare("INSERT INTO guest_tbl(name, message) VALUES(?,?)");
            $stmt->bind_param("ss", $name, $guessbook);
            $stmt->execute();
            $stmt->close();
        }
    }
?>