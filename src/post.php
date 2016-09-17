<?php
namespace Ant\Ant;

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);

require('_/inc/init.php');

$api_request = isset($_POST['ant_request_data']) ? htmlentities($_POST['ant_request_data']) : null ;

$call = new ApiRequest($api_request);
