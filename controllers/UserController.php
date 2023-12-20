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

    public function updateApranat($firstname,$lastname,$email,$password,$role_id,$user_id) {
        
        $result = $this->userModel->editFormateur($firstname,$lastname,$email,$password,$role_id,$user_id);
        if ($result) {
            $this->displayAprennat();
        } else {
           echo "<script> alert('hhhhhhhhhhhhhhhhhhhhhhh'); </script>";
        }
    }


    //displayClass
    public function displayClass() {
        if (!isset($_SESSION['user_id'])) {
            include 'views/login.php';
        }

        $userId = $_SESSION['user_id'];
        $classes = $this->userModel->getClassInfo($userId);
        $unassignedApprenants = $this->userModel->getAprennatnonClass(); 
        include_once 'views/dashboard/formateurcrudclass.php';
    }


   

    public function registerClass($className, $selectedApprenants) {
        $userId = $_SESSION['user_id'];
        $classId = $this->userModel->insertClass($className , $userId);

        foreach ($selectedApprenants as $apprenantId) {
            $this->userModel->assignApprenantToClass($classId, $apprenantId);
        }

        $this->displayClass();
    }


    public function deleteClass($classId) {
        $this->userModel->deleteClass($classId);
        $this->displayClass();
    }

////////////////////////////////

    public function displayAllUsers() {

        $users = $this->userModel->getAllUsers();
       
        include_once './views/dashboard/Allusers.php';
    }






    

    public function displayProfil() {
        $userId =$_SESSION['user_id'];
        $users = $this->userModel->getProfilUser($userId);
        $classes = $this->userModel->getProfilclass($userId);
        include_once './views/dashboard/myclass.php';
    }
}



?>
