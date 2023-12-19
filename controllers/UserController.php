<?php
require_once './models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser($firstname, $lastname, $email, $password) {
        
        $result = $this->userModel->registerUser($firstname, $lastname, $email, $password);
        if ($result) {
           include '/views/login.php';
        } else {
           include '/views/regester.php';
        }
    }
    public function loginUser($email, $password) {
        $user = $this->userModel->loginUser($email, $password);
       
        session_start();
        if ($user) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['authority_name'] = $user['authority_name'];
            include 'views/dashboard/dashboard.php';
        } else {
            echo "hhhhh";
        }
    }

    public function displayUsers() {

        $users = $this->userModel->getUsers();
       
        include_once './views/dashboard/admincrudformateur.php';
    }
    public function deletUser($id){
       $this->userModel->deletUserr($id);
       $this->displayUsers();
    }
  
}






?>
