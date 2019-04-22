<?php
require $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';
require $_SERVER["DOCUMENT_ROOT"].'/env.php';
class DBConnect
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect() {
        $this->servername = getenv('DB_SERVERNAME_PC');
        $this->username = getenv('DB_USERNAME_PC');
        $this->password = getenv('DB_PASSWORD_PC');
        $this->dbname = getenv('DB_TABLENAME_PC');
        $this->charset = "utf8mb4";
        try {
            $connect = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($connect, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            return false;
        }

    }

}