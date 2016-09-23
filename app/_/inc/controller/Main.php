<?php
namespace Ant\Controller;

class Main
{
    private $controllerList = array();

    public function __construct()
    {
        $this->controllerList = array(
            'issue',
            'project',
            'admin',
            'report',
            'user',
            'home',
            'error',
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
