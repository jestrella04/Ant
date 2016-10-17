<?php
namespace Ant\Controller;

class Main
{
    private $controllerList = array();

    public function __construct()
    {
        $this->controllerList = array(
            'issue',
            'browse',
            'admin',
            'report',
            'user',
            'home',
            'error',
            'create'
        );
    }

    public function isValidController($controller)
    {
        if (in_array($controller, $this->controllerList))
        {
            return true;
        }

        return false;
    }
}
