<?php
require_once './models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser($firstname, $lastname, $email, $password) {
        
        $result = $this->userModel->registerUser($firstname, $lastname, $email, $password);
        if (!$result) {
            include 'views/regester.php';
        } 
    }



    public function loginUser($email, $password) {
        
        $user = $this->userModel->loginUser($email, $password);
       
        
        if ($user) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['authority_name'] = $user['authority_name'];
           
        } else {
            include 'views/login.php';
        }
    }


    public function createFormateur($firstname, $lastname, $email, $password) {
        
        $result = $this->userModel->registerUser($firstname, $lastname, $email, $password);
        if ($result) {
            $this->displayUsers();
        } else {
           echo "<script> alert('hhhhhhhhhhhhhhhhhhhhhhh'); </script>";
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


    public function updateFormateur($firstname,$lastname,$email,$password,$role_id,$user_id) {
        
        $result = $this->userModel->editFormateur($firstname,$lastname,$email,$password,$role_id,$user_id);
        if ($result) {
            $this->displayUsers();
        } else {
           echo "<script> alert('hhhhhhhhhhhhhhhhhhhhhhh'); </script>";
        }
    }



    public function displayAprennat() {

        $users = $this->userModel->getAprennat();
       
        include_once './views/dashboard/admincrudaprenant.php';
    }
  
    public function deletAprenant($id){
        $this->userModel->deletUserr($id);
        $this->displayAprennat();
    }

     public function createAprenant($firstname, $lastname, $email, $password) {
        
        $result = $this->userModel->createAprenant($firstname, $lastname, $email, $password);
        if ($result) {
            $this->displayAprennat();
        } else {
           echo "<script> alert('hhhhhhhhhhhhhhhhhhhhhhh'); </script>";
        }
     }
}



?>
