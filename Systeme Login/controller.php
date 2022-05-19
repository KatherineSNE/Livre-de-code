<?php
session_start();
include './config/connexion.php';
include './models/userClass.php';
include './views/login.php';



if(isset($_POST['submit'])){
    if(isset($_POST['email_user'])&& isset($_POST['password_user'])){
        $user = new User();
            $user->setEmail(htmlspecialchars(strip_tags($_POST['email_user'])));
            $user->setPassword(htmlspecialchars(strip_tags($_POST['password_user'])));
        $emailLog = $_POST['email_user'];
        $passwordLog = $_POST['password_user'];

        $userLog = $user->getUserByMail($bdd);

        if($userLog!=NULL){
            if(password_verify($passwordLog, $userLog[0]['password_user'])){
                $_SESSION['id'] = $userLog[0]['id_user'];
                $_SESSION['name'] = $userLog[0]['name_user'];
                $_SESSION['surname'] = $userLog[0]['surname_user'];
                $_SESSION['email'] = $userLog[0]['email_user'];
                $_SESSION['password'] = $userLog[0]['password_user'];
                $_SESSION['msg'] = "it's working";
                $_SESSION['connected'] = true;
                header('Location: controllerRTWN.php');
                
            }
            if($emailLog=="admin@gmail.com" && $passwordLog=="admin"){
                header('Location: controllerAdmin.php');
            }
            else{
            echo'error occured';
            }
        }
    }
}

?>