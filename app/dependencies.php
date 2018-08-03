<?php

// DIC configuration
$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
	$settings = $c->get('settings')['renderer'];
	return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
	$settings = $c->get('settings')['logger'];
	$logger = new Monolog\Logger($settings['name']);
	$logger->pushProcessor(new Monolog\Processor\UidProcessor());
	$logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
	return $logger;
};

// PDO database library
$container['db'] = function ($c) {
	$settings = $c->get('settings')['db'];
	$pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'], $settings['user'], $settings['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	return $pdo;
};

// CSRF
$container['csrf'] = function ($c) {
	return new \Slim\Csrf\Guard($prefix = 'csrf', $storage = null, $failureCallable = null, $storageLimit = 200, $strength = 16, $persistentTokenMode = true);
};

// Flash messages
$container['flash'] = function () {
	return new \Slim\Flash\Messages();
};

// Controllers
$container['BaseController'] = function ($c) {
	return new App\Controllers\BaseController($c);
};

$container['ConfigController'] = function ($c) {
	return new App\Controllers\ConfigController($c);
};

$container['RenderViewController'] = function ($c) {
	return new App\Controllers\RenderViewController($c);
};

$container['AuthController'] = function ($c) {
	return new App\Controllers\AuthController($c);
};

$container['DataValidationController'] = function ($c) {
	return new App\Controllers\DataValidationController($c);
};

$container['RoleController'] = function ($c) {
	return new App\Controllers\RoleController($c);
};

$container['UserController'] = function ($c) {
	return new App\Controllers\UserController($c);
};

$container['IssueController'] = function ($c) {
	return new App\Controllers\IssueController($c);
};

$container['PriorityController'] = function ($c) {
	return new App\Controllers\PriorityController($c);
};

$container['ProjectController'] = function ($c) {
	return new App\Controllers\ProjectController($c);
};

$container['CategoryController'] = function ($c) {
	return new App\Controllers\CategoryController($c);
};


