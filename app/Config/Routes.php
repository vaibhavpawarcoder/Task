<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->match(['get','post'], '/', 'Home::Registration');
//Registration 
$routes->match(['get','post'], 'Registration', 'Home::Registration');
$routes->match(['get','post'], 'Login', 'Home::Login');
$routes->match(['get','post'], 'AdminDashboard', 'Home::AdminDashboard', ['filter' => 'auth']  );
$routes->match(['get','post'], 'Logout', 'Home::Logout');

$routes->match(['get','post'], 'userList', 'Home::userList');

$routes->match(['get','post'], 'viewUpdate', 'Home::viewUpdate');
$routes->match(['get','post'], 'Updateuser', 'Home::Updateuser');

$routes->match(['get','post'], 'remove', 'Home::remove');