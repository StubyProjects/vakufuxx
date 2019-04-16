<?php
//ACHTUNG NICHT HOCHLADEN VORHER VON FTP HOLEN
require 'vendor/autoload.php';
require 'env.php';
class DBConnect
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect() {
        $this->servername = getenv('DB_SERVERNAME_LC');
        $this->username = getenv('DB_USERNAME_LC');
        $this->password = getenv('DB_PASSWORD_LC');
        $this->dbname = getenv('DB_TABLENAME_LC');
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