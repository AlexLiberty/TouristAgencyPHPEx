<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->group('admin', function ($routes) {
    $routes->get('countries', 'AdminController::countries');
    $routes->post('add-country', 'AdminController::addCountry');
    $routes->get('edit-country/(:num)', 'AdminController::editCountry/$1');
    $routes->post('update-country/(:num)', 'AdminController::updateCountry/$1');
    $routes->post('delete-country/(:num)', 'AdminController::deleteCountry/$1');
    $routes->get('cities', 'AdminController::cities');
    $routes->post('add-city', 'AdminController::addCity');
    $routes->get('edit-city/(:num)', 'AdminController::editCity/$1');
    $routes->post('update-city/(:num)', 'AdminController::updateCity/$1');
    $routes->post('delete-city/(:num)', 'AdminController::deleteCity/$1');
    $routes->get('hotels', 'AdminController::hotels');
    $routes->post('add-hotel', 'AdminController::addHotel');
    $routes->get('edit-hotel/(:num)', 'AdminController::editHotel/$1');
    $routes->post('update-hotel/(:num)', 'AdminController::updateHotel/$1');
    $routes->post('delete-hotel/(:num)', 'AdminController::deleteHotel/$1');
    $routes->post('upload-photo/(:num)', 'AdminController::uploadPhoto/$1');
});

$routes->group('user', function ($routes) {
    $routes->get('countries', 'UserController::countries');
    $routes->get('cities/(:num)', 'UserController::cities/$1');
    $routes->get('hotels/(:num)', 'UserController::hotels/$1');
    $routes->get('hotel/(:num)', 'UserController::hotel/$1');
    $routes->post('leave-review', 'UserController::leaveReview');
});

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::processRegister');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');

