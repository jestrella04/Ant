<?php
namespace Ant\Ant;

require('_/inc/config.php');
require('_/inc/common.php');
require('_/inc/classes/vendor/autoload.php');

if (_SHOW_ERRORS)
{
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}
