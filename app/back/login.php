<?php
    require_once("controllers/UserController.php");
    session_start();
    $email = $_POST['email'] ?? $_SESSION['email'];
    $password = $_POST['password'] ?? $_SESSION['password'];
    if (!empty($email) && !empty($password)) {
        $user = new User();
        $user->setEmail($email);
        $user->setSenha($password);
        $userController = new UserController();
        if ($userController->login($user)) {
            if ($_POST['remember-password'] == "on") {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
            }
            header("Location: http://lucaso.ntectreinamentos.com.br/proj3/success.html");
        } else {
            header("Location: http://lucaso.ntectreinamentos.com.br/proj3/error.html");
        }
    } else {
        echo "Há campos em branco!";
    }