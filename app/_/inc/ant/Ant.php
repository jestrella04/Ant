<?php
namespace Ant;

class Ant
{
    protected $dbo;
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    protected function databaseOpen()
    {
        $this->dbo = $this->database->open();
    }

    protected function databaseClose()
    {
        $this->database->close();
        //$this->database = null;
        $this->dbo = null;
    }
}
