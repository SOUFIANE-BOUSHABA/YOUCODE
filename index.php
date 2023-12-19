<?php

include './controllers/UserController.php';
$userController = new UserController();



if(isset($_GET['action'])){
    $action=$_GET['action'];
switch($action){
    case 'formateur' :  $userController->displayUsers(); break;
    case 'login' : include 'views/login.php'; break ;
    case 'regester' : include 'views/regester.php'; break;
    case 'suprimmerformateur':$userController->deletUser($_GET['idfr']);
}}

else if(isset($_POST['submit'])){
    $submit=$_POST['submit'];
switch($submit){
    
    case 'loginuser': extract($_POST); $userController->loginUser($email, $password); break;
}
} else   include 'views/login.php';
