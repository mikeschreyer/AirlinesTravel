<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::extensions(['json', 'xml']);
Router::extensions(['pdf']);
Router::defaultRouteClass(DashedRoute::class);
Router::prefix('api', function ($routes) {
    $routes->extensions(['json', 'xml']);
    $routes->resources('modele');
    $routes->resources('Users');
    Router::connect('/api/users', ['controller' => 'users', 'action' => 'index', 'prefix' => 'api']);
    Router::connect('/api/users/register', ['controller' => 'users', 'action' => 'add', 'prefix' => 'api']);
    $routes->fallbacks('InflectedRoute');
});

Router::prefix('Admin', function ($routes) { $routes->fallbacks('InflectedRoute'); });

Router::scope('/', function (RouteBuilder $routes) {
    $routes->resources('Users');
    $routes->connect('/', ['controller' => 'Airports', 'action' => 'index']);

    $routes->connect('/pages/*', ['controller' => 'Airports', 'action' => 'index']);

   
    $routes->fallbacks(DashedRoute::class);
});
Plugin::routes();
