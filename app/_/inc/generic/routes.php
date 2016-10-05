<?php
namespace Ant\Controller;

// Load main controller
$mainController = new Main();

// Check if requested controller is valid
$isValidController = $mainController->isValidController($controller);
$controller = $isValidController ? $controller : 'error';

// Load the requested controller
switch ($controller)
{
    case 'issue':
        $controller = new Issue($identifier);
        break;

    case 'browse':
        $controller = new Browse($identifier);
        break;

    case 'admin':
        $controller = new Admin($identifier);
        break;

    case 'report':
        $controller = new Report($identifier);
        break;

    case 'user':
        $controller = new User($identifier);
        break;

    case 'home':
        $controller = new Home();
        break;

    case 'error':
        $controller = new Error();
        break;
}

// Prepopulate some data used on the views
if (method_exists($controller, 'setCurrentUser')) $controller->setCurrentUser($currentUser);
if (method_exists($controller, 'setCurrentUserPermissions')) $controller->setCurrentUserPermissions($currentUserPermissions);

// Load the view
$controller->loadView();
