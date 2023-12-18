<?php
class UserModel {
    private $db;

    public function __construct() {
        require_once '../config/DB.php';
        $this->db = new Database();
    }

    public function registerUser($firstname, $lastname, $email, $password) {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO users (first_name, last_name, email, password , role_id) VALUES (?, ?, ?, ? ,?)";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email, $hashedPassword , 2]);
        if($stmt){
            return true;
        }
        
    }
    public function loginUser($email, $password) {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false; 
        }
    }
}
?>
