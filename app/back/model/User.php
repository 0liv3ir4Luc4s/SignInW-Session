<?php
    class User {
        private $email;
        private $senha;

        function setEmail($email) {
            $this->email = $email;
        }
        function getEmail() {
            return $this->email;
        }
        function setSenha($senha) {
            $this->senha = $senha;
        }
        function getSenha() {
            return $this->senha;
        }
        function validarEmail($email) {
            if($this->email === $email) {
                return true;
            } else {
                return false;
            }
        }
        function validarSenha($senha) {
            if(password_verify($senha, $this->senha)) {
                return true;
            } else {
                return false;
            }
        }
    }