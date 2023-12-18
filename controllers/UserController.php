<?php
require_once '../models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser($firstname, $lastname, $email, $password) {
        
        $result = $this->userModel->registerUser($firstname, $lastname, $email, $password);
        if ($result) {
           header('location:../views/login.php');
        } else {
            header('location:../views/regester.php');
        }
    }
    public function loginUser($email, $password) {
        $user = $this->userModel->loginUser($email, $password);

        if ($user) {
            header('location:../views/dashboard/dashboard.php');
        } else {
            echo "Invalid email or password. Please try again.";
        }
    }
  
}


$userController = new UserController();

if (isset($_POST['regester'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userController->registerUser($firstname, $lastname, $email, $password);
}



if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userController->loginUser($email, $password);
}
?>
