<?php
    require_once("controllers/UserController.php");
    session_start();
    $email = $_POST['email'] ?? $_SESSION['email'];
    $password = $_POST['password'] ?? $_SESSION['password'];
    if (!(empty($email) && empty($password))) {
        $user = new User();
        $user->setEmail($email);
        $user->setSenha($password);
        $userController = new UserController();
        if (!(isset($_SESSION['email']) && isset($_SESSION['password']))) {
           $_SESSION = null;
           $param = session_get_cookie_params();
           setcookie(session_name(), "", time()-36000, $param['path'], $param['domain'], $param['secure'], $param['httponly']);
           session_destroy();
        }
        if ($userController->login($user)) {
            if ($_POST['remember-password'] == "on") {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
            }
            header("Location: http://lucaso.ntectreinamentos.com.br/proj3/success.html");
        } else {
            header("Location: http://lucaso.ntectreinamentos.com.br/proj3/error.html");
        }
    } else {
        $_SESSION = null;
        $param = session_get_cookie_params();
        setcookie(session_name(), "", time()-36000, $param['path'], $param['domain'], $param['secure'], $param['httponly']);
        session_destroy();
        echo "Há campos em branco!";
    }