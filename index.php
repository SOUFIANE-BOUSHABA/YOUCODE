<?php
session_start();
include './controllers/UserController.php';
$userController = new UserController();



if(isset($_POST['submit'])){
    $submit=$_POST['submit'];
switch($submit){
    case 'loginuser': extract($_POST); $userController->loginUser($email, $password); break;
    case 'ajouteruser'  : extract($_POST); $userController->createFormateur($firstname,$lastname,$email,$password); break;
    case 'regesteruser' : extract($_POST); $userController->registerUser($firstname,$lastname,$email,$password); break;
    case 'enregisteruser' : extract($_POST); $userController->updateFormateur($firstname,$lastname,$email,$password,$role_id,$user_id); break;
    case 'ajouterAprennat' : extract($_POST); $userController->createAprenant($firstname, $lastname, $email, $password); break;
    case 'enregisterAprenant' : extract($_POST); $userController->updateApranat($firstname,$lastname,$email,$password,$role_id,$user_id); break;
    case 'ajouterclass':  extract($_POST); $userController->registerClass($classe_name, $selected_apprenants); break;
 
}
}

if(isset($_GET['action'])){
    $action=$_GET['action'];
switch($action){
    case 'formateur' :  $userController->displayUsers(); break;
    case 'aprennat' : $userController->displayAprennat(); break;
    case 'login' : include 'views/login.php'; break ;
    case 'regester' : include 'views/regester.php'; break;
    case 'suprimmerformateur':$userController->deletUser($_GET['idfr']); break;
    case 'suprimmerAprennat' :$userController->deletAprenant($_GET['idAprennat']); break;
    case 'class' : $userController->displayClass(); break;
    case 'deleteclass'  :$userController->deleteClass($_GET['idclass']); break;
    case 'users'   : $userController->displayAllUsers(); break;
    case 'Profil'  : $userController->displayProfil(); break;
}}else   include 'views/login.php';


