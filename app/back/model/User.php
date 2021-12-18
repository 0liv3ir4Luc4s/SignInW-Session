<?php
    class User
    {
        private $email;
        private $senha;

        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }
        public function getSenha()
        {
            return $this->senha;
        }
        public function login($email, $password)
        {
            if ($this->email === $email) {
               return password_verify($senha, $this->senha); 
            } else {
                return false;
            }
        }
    }