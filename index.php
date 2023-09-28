<?php

session_start();
require 'vendor/autoload.php'; //Autoloader 

// nameSpace 

use App\Controller\ControllerUser;
use App\Controller\ControllerTask;
use App\Model\Task;


$router = new AltoRouter();

$router->setBasePath('/super-reminder');

//Second Part 

$router->map('GET', '/home', function () {
	require __DIR__ . '/src/View/home.php';
});
$router->map('POST', '/home', function () {
	$connectUser = new ControllerUser();
	if (isset($_GET['login'])) {
		$connectUser->controllerConnexion($_POST);
		die();
	}
});

$router->map('GET', '/users', function () {
	require __DIR__ . '/src/View/home_task.php';
});


$router->map('POST', '/users', function () {
	$newTask = new ControllerTask();
	if (isset($_GET['task'])) {
		$newTask->controllerAddTask($_POST);
		die();
	}
});

$router->map('GET', '/list_task', function () {
	$task = new Task();
	$taskUser = $task->displayTask($_SESSION['id']);
});




// match current request url
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
	call_user_func_array($match['target'], $match['params']);
} else {
	// no route was matched
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
