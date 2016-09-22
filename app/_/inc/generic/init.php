<?php
namespace Ant;

require('_/inc/generic/config.php');
require('_/inc/generic/common.php');
require('_/inc/vendor/autoload.php');

if (_SHOW_ERRORS)
{
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}

// Get data structure from URL
$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$path = trim($pathInfo, '/');

// Extract desired parts from $path
$pathParts = explode('/', $path);
$controller = ! empty ($pathParts[0]) ? $pathParts[0] : 'Home';
$identifier = ! empty ($pathParts[1]) ? $pathParts[1] : 0;

// Base path for the app assets
$baseHref = dirname($_SERVER['SCRIPT_NAME']) . '/';

// Session handler
$sessionHandler = new SessionHandler();
$isValidSession = $sessionHandler->isValidSession();

if ($isValidSession)
{
    $currentUser = new User($_SESSION['user_id']);
    $currentUserPermissions = $currentUser->getPermission();
}
