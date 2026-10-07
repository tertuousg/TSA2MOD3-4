<?php
use CodeIgniter\Router\RouteCollection;
/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt', ['filter'=>'csrf']);
$routes->post('logout', 'Auth::logout', ['filter'=>'csrf']);
$routes->group('tasks',['filter'=>'auth'],static function(RouteCollection $routes):void{
    $routes->get('new','Tasks::new');
    $routes->post('','Tasks::create',['filter'=>'csrf']);
    $routes->get('(:num)/edit','Tasks::edit/$1');
    $routes->post('(:num)','Tasks::update/$1',['filter'=>'csrf']);
    $routes->post('(:num)/archive','Tasks::archive/$1',['filter'=>'csrf']);
});
