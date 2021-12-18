<?php
    require_once("model/User.php");
    require_once("Connection.php");
    class UserController 
    {
        function selecionarUm($email)
        {
            try {
                $con = new Connection("config.ini");
                $comand = $thisj->con->getConnection()->prepare("SELECT from user WHERE email=$email"); 
                if ($comand->execute()) {
                    $result = $comand->fetchAll(PDO::FETCH_CLASS, "User");
                    $user = new User();
                    $user->setEmail($result[0]->getEmail());
                    $user->setPassword($result[0]->getPassword());
                }
            } catch (PDOException $PDOex) {
                echo("Erro no banco de dados".$PDOex->getMessage());
            } catch (Exception $ex) {
                echo("Erro geral".$ex->getMessage());
            } finally {
                return $user;
            }
        }

        public function login($user)
        {
            $registeredUser = $this->selecionarUm($user->getEmail());
            return $registeredUser->login($user->getEmail(), $user->getPassword());
        }
    }