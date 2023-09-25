<?php


require 'vendor/autoload.php'; //Autoloader 


$router = new AltoRouter();
// var_dump($router);
$router->setBasePath('/super-reminder');

//Second Part 

$router->map( 'GET', '/home', function() {
    require __DIR__ . '/src/View/home.php';
	
});

$router->map( 'GET', '/users', function() {
    require __DIR__ . '/src/View/home_task.php';
});



// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}