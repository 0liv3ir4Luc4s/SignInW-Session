<?php
    class Connection
    {
        private $user;
        private $password;
        private $host;
        private $driver;
        private $dbname;
        private $pdo;

        public function __construct($arq_config)
        {
            try {
                if (file_exists($arq_config)) {
                    $configs = parse_ini_file($arq_config);
                    $this->user = $configs["user"];
                    $this->password = $configs["password"];
                    $this->host = $configs["host"];
                    $this->driver = $configs["driver"];
                    $this->dbname = $configs["dbname"];
                    
                    if ($this->driver == "mysql") {
                        $this->pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
                        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } else {
                        die("SGBD não suportado");
                    }
                }
            } catch (PDOException $ex) {
                die("Erro na conexão com o PDO");
            }
        }

        public function getPDO()
        {
            return $this->pdo;
        }

        public function closeConnection()
        {
            $this->pdo = null;
        }
    }