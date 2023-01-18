<?php
class ConnectionBDD
{
    public PDO $pdo;

    public function __construct($dbname, $dbhost, $user, $pwd)
    {
        $dsn = 'mysql:dbname=' . $dbname;
        $dsn = $dsn . ';' . 'host=' . $dbhost;
        $user = $user;
        $password = $pwd;
        $this->pdo = new PDO($dsn, $user, $password);
    }

    public function close(){
        $pdo = null;
    }
}
?>