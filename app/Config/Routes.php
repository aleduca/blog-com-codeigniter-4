<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/search', 'Search::index', ['as' => 'search']);
$routes->get('/banner/home', 'BannerHome::index');
$routes->get('/category/sidebar/partials/(:alpha)', 'CategorySidebarPartials::index/$1');
$routes->get('/trendings', 'Trending::index');
$routes->get('/recent', 'Recent::index');
$routes->get('/category/partials/(:alpha)', 'CategoryHomePartials::index/$1');
$routes->get('/category/(:any)', 'Category::index/$1');
$routes->get('/post/(:any)', 'Post::index/$1');
$routes->post('/api/reply', 'Reply::store');
$routes->post('/comment', 'Comment::store', ['as' => 'comment.store', 'filter' => 'csrfThrottle']);
$routes->get('/register', 'Register::index', ['as' => 'register']);
$routes->post('/register', 'Register::store', ['as' => 'register.store']);
$routes->get('/contact', 'Contact::index', ['as' => 'contact']);
$routes->post('/contact', 'Contact::store', ['as' => 'contact.store', 'filter' => 'csrfThrottle']);
$routes->get('/profile', 'Profile::index', ['as' => 'profile']);
$routes->put('/api/profile', 'Profile::update', ['as' => 'profile.update', 'filter' => 'csrfThrottleAjax']);
$routes->put('/api/password', 'Password::update', ['as' => 'password.update', 'filter' => 'csrfThrottleAjax']);
$routes->get('/login', 'Login::index', ['as' => 'login']);
$routes->post('/login', 'Login::store', ['as' => 'login.store', 'filter' => 'csrfThrottle']);
$routes->get('/logout', 'Login::destroy');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
