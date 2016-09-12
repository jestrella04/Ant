<?php
class Database
{
  private $dbi;
  private $dsn;

  private function __construct()
  {
    $this->dsn = _DB_DRIVER . ':host=' . _DB_HOST . ';dbname=' . _DB_NAME;
  }

  public function Connect()
  {
    $this->dbi = new PDO( $this->dsn, _DB_USER, _DB_PASSWORD );
    return $this->dbi;
  }

  public function Disconnect()
  {
    $this->dbi = null;
    $this->dsb = null;
  }
}
