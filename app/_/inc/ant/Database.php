<?php
namespace Ant;

use PDO;

class Database
{
    private $pdo;
    private $dsn;

    public function __construct()
    {
        $this->dsn = _DB_DRIVER . ':host=' . _DB_HOST . ';dbname=' . _DB_NAME . ';charset=utf8';
    }

    public function open()
    {
        try
        {
            // try connecting to the database
            $this->pdo = new PDO($this->dsn, _DB_USER, _DB_PASSWORD);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(PDOException $e)
        {
            //echo "Connection failed: " . $e->getMessage();
        }

        if ($this->pdo)
        {
            return $this->pdo;
        }

        return false;
    }

    public function close()
    {
        $this->dbo = null;
        //$this->dsn = null;
    }
}
