<?php
class Database {
    private $host = 'localhost';
    private $db = 'Actividad3';
    private $user = 'root';
    private $pass = 'Yasminarevalo2005';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createUser($email, $estado) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (email, estado) VALUES (:email, :estado)");
        return $stmt->execute([':email' => $email, ':estado' => $estado]);
    }

    public function updateUserEstado($id, $nuevoEstado) {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET estado = :estado WHERE id = :id");
        return $stmt->execute([':estado' => $nuevoEstado, ':id' => $id]);
    }
}
?>
