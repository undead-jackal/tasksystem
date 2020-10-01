<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Auth::index',['filter' => 'auth']);

$routes->get('/', 'Auth::index',['filter' => 'auth']);
$routes->get('/admin', 'Admin::index',['filter' => 'auth']);
$routes->get('/project_admin', 'Project::index',['filter' => 'auth']);
$routes->get('/task_admin', 'Task_Admin::index',['filter' => 'auth']);
$routes->get('/task', 'Task::index',['filter' => 'auth']);

// $routes->get('/order', 'Order::index',['filter' => 'auth']);
// $routes->get('/home', 'LandingPage::index');

// $routes->get('/admin', 'Admin::index',['filter' => 'auth']);
// $routes->get('/sell', 'Sales::index',['filter' => 'auth']);
// $routes->get('/sales', 'SalesData::index',['filter' => 'auth']);
// $routes->get('/daily_sales_report', 'SalesData::dailySales');
//
//
// $routes->get('/automplete', 'Sales::automplete');
$routes->get('/logout', 'Auth::logout');
//
$routes->post('/handleLogin', 'Auth::handleLogin');
// $routes->post('/handleLogin', 'Auth::handleLogin');
//
$routes->post('/createItem', 'Admin::create');
$routes->post('/viewItem', 'Admin::view');
$routes->post('/getSpecificItem', 'Admin::getSpecificItem');
$routes->post('/update', 'Admin::updateItem');
$routes->post('/remove', 'Admin::remove');
// //
$routes->post('/projectView', 'Project::view');
$routes->post('/projectCreate', 'Project::create');
$routes->post('/getSpecificProject', 'Project::getSpecificItem');
$routes->post('/updateProject', 'Project::update');
$routes->post('/removeProject', 'Project::remove');

$routes->post('/createTask', 'Task_Admin::create');
$routes->post('/viewTask', 'Task_Admin::view');
$routes->post('/getTask', 'Task_Admin::getTask');
$routes->post('/removeTask', 'Task_Admin::remove');

$routes->post('/viewTaskUser', 'Task::view');
$routes->post('/getTaskUser', 'Task::getTask');
$routes->post('/saveTask', 'Task::saveTask');

$routes->post('/getProfile', 'Profile::getProfile');
$routes->post('/saveProfile', 'Profile::saveProfile');

// $routes->post('/getItemCart', 'Sales::getItemCart');
// $routes->post('/editCart', 'Sales::editCart');
// $routes->post('/removeItemCart', 'Sales::removeItemCart');
// $routes->post('/submitSale', 'Sales::submitSale');
//
// $routes->post('/viewSales', 'SalesData::view');
// $routes->post('/viewSalesItem', 'SalesData::viewItem');
// $routes->post('/viewDailyReport', 'SalesData::viewDailyReport');
// $routes->post('/viewItemCount', 'SalesData::itemNumber');





/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
