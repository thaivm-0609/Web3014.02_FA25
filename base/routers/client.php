<?php

use App\Controllers\Controller;

$router->get('/', Controller::class.'@home'); //gọi vào hàm home() trong class Controller;
$router->get('/test', Controller::class.'@test'); //gọi hàm test() trong class Controller;
    
?>
