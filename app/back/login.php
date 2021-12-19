<?php
    require_once("controllers/UserController.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $user = new User();
        $user->setEmail($email);
        $user->setSenha($password);
        $userController = new UserController();
        if ($userController->login($user)) {
            header("Location: http://lucaso.ntectreinamentos.com.br/proj3/success.html");
        } else {
            header("Location: http://lucaso.ntectreinamentos.com.br/proj3/error.html");
        }
    } else {
        echo "Há campos em branco!";
    }