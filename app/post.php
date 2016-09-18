<?php
namespace Ant;

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);

require('_/inc/init.php');

$apiRequest = isset($_POST['ant_request_data']) ? htmlentities($_POST['ant_request_data']) : null;
$request = new ApiRequest($apiRequest);

echo $request->getResponse();
