<?php
namespace Ant;

// Include required scripts
require ('_/inc/generic/config.php');
require ('_/inc/generic/common.php');
require ('_/inc/vendor/autoload.php');

// Show errors on screen if allowed
if (_SHOW_ERRORS)
{
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}

// Session handler
$sessionHandler = new SessionHandler();
$isValidSession = $sessionHandler->isValidSession();

// Get data structure from URL
$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$path = trim($pathInfo, '/');

// Extract desired parts from $path
$pathParts = explode('/', $path);

// Base path for the app assets
$baseHref = dirname($_SERVER['SCRIPT_NAME']) . '/';

// Check if the session is valid
if ($isValidSession)
{
    // Get user information and permissions
    $currentUser = new User($_SESSION['user_id']);
    $currentUserPermissions = $currentUser->getPermission();

    // Get the controller the user is trying to load
    $controller = ! empty ($pathParts[0]) ? strtolower($pathParts[0]) : 'home';
    $identifier = ! empty ($pathParts[1]) ? $pathParts[1] : 0;
}

else
{
    $currentUser = null;
    $currentUserPermissions = array();
    $controller = 'home';
}
