<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->view('/admin(.*)', 'Modules\Admin\Views\foundation');
