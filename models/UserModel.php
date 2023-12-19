<?php
class UserModel {
    private $db;

    public function __construct() {
        require_once './config/DB.php';
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

        $sql = "SELECT * FROM users 
        INNER JOIN roles ON users.role_id = roles.role_id
        INNER JOIN role_authorities ON roles.role_id = role_authorities.role_id
        INNER JOIN authorities ON role_authorities.authority_id = authorities.authority_id
        WHERE email = ?";
        $stmt = $conn->prepare($sql);
       
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false; 
        }
    }



    public function getUsers() {
        $conn = $this->db->getConnection();
    
        $sql = "SELECT * FROM users WHERE role_id = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
       $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
       
    }

    public function deletUserr($id){
        $conn = $this->db->getConnection();
    
        $sql = "DELETE  FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        
       return $stmt;
    }
    
    public function editFormateur($firstname, $lastname, $email, $password, $role_id, $user_id) {
        $conn = $this->db->getConnection();
        $sql = "UPDATE `users` SET `first_name`=?, `last_name`=?, `email`=?, `password`=?, `role_id`=? WHERE user_id=?";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
    
        $stmt->execute([$firstname, $lastname, $email, $hashedPassword, $role_id, $user_id]);
        if ($stmt) {
            return true;
        }
    }
}



?>
