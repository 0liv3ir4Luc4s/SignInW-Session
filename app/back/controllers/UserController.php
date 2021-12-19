<?php
    require_once("model/User.php");
    require_once("controllers/Connection.php");
    class UserController 
    {
        function selecionarUm($email)
        {
            try {
                $con = new Connection("controllers/config.ini");
                $comand = $con->getPDO()->prepare("SELECT * FROM user WHERE email='$email';"); 
                if ($comand->execute()) {
                    $result = $comand->fetchAll(PDO::FETCH_CLASS, "User");
                    $user = new User();
                    $user->setEmail($result[0]->getEmail());
                    $user->setSenha($result[0]->getSenha());
                }
            } catch (PDOException $PDOex) {
                echo("Erro no banco de dados {$PDOex->getMessage()}");
            } catch (Exception $ex) {
                echo("Erro geral {$ex->getMessage()}");
            } finally {
                $con->closeConnection();
                return $user;
            }
        }

        public function login($user)
        {
            $registeredUser = $this->selecionarUm($user->getEmail());
            return $registeredUser->login($user->getEmail(), $user->getSenha());
        }
    }