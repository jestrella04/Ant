<?php
namespace Ant\Controller;

switch($controller)
{
  case 'Issue':
    $controller = new Issue($identifier);
    break;

  case 'Project':
    $controller = new Project($identifier);
    break;

  case 'Admin':
    $controller = new Admin($identifier);
    break;

  case 'Report':
    $controller = new Report($identifier);
    break;

  case 'User':
    $controller = new User($identifier);
    break;

  case 'Home':
    $controller = new Home();
    break;
}

$controller->loadView();
