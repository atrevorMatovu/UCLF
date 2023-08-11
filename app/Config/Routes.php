<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Reg');
$routes->setDefaultMethod('login');
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
//LOGIN ROUTES
$routes->get('/', 'Login::login');
$routes->get('login', 'Login::login');
$routes->add('verify/login', 'Login::login');
$routes->post('login', 'Login::login');

//logout


//SIGNUP/REGISTER ROUTES
$routes->get('signup', 'Reg::register');
$routes->post('signup','Reg::register');
$routes->add('dashboard/signup', 'Reg::register');

//ACTIVATION ROUTES
//$routes->add('activate/index', 'Auth::index');
$routes->get('failed/(:any)', 'Reg::actiLinkExpiry/$1');
$routes->get('acti/(:any)', 'Reg::activate/$1');
$routes->get('acti', 'Reg::activate');
$routes->get('register/activate/(:any)', 'Reg::activate/$1');

//PASSWORD RESET
$routes->add('forgotpwd', 'Login::forgotPwd');
$routes->get('pood', 'Login::pood');
$routes->post('forgotpwd', 'Login::forgotPwd');
$routes->get('pwdReset/(:any)', 'Password_reset::index/$1');
$routes->post('pwdReset/(:any)', 'Password_reset::index/$1');

//ONBOARD
$routes->get('onboard', 'AccDashboard::onboarding');
$routes->post('onboard', 'AccDashboard::onboarding');
$routes->add('onboard', 'AccDashboard::onboarding');

//DASHBOARDS
$routes->group('', ['filter'=>'isLoggedIn'],function($routes)
{
    $routes->get('dashboard', 'AccDashboard::userdash');
    $routes->get('dashboard/logout', 'AccDashboard::logout');
    $routes->get('userprofile', 'AccDashboard::profDash');
    $routes->get('notify', 'AccDashboard::notification');
    $routes->get('/notifications/getNotificationCount', 'AccDashboard::getNotificationCount');
    $routes->get('notifications/fetchRealtimeNotifications', 'AccDashboard::fetchRealtimeNotifications');
    $routes->post('noti', 'AccDashboard::updateStatu');
    $routes->post('updateNoti', 'AccDashboard::notification');
    $routes->post('update', 'AccDashboard::updateUser');
    $routes->post('updatePwd', 'AccDashboard::updatePwd');
    $routes->get('forum', 'ForumResponses::forum');
    $routes->get('viewTopic', 'ForumResponses::forumTopic');
    $routes->get('myQuestions', 'ForumResponses::myQuestion');
    $routes->post('updateForum', 'ForumResponses::updateform');
    $routes->get('discuss', 'ForumResponses::discussion');
    $routes->post('discuss', 'ForumResponses::discussion');
    $routes->post('del', 'ForumResponses::qnDel');
    $routes->get('Studirectory', 'AccDashboard::student');
    $routes->get('Indirectory', 'AccDashboard::individual');
    $routes->get('Instidirectory', 'AccDashboard::institutional');
    $routes->get('Fship', 'AccDashboard::fship');
    $routes->get('Life', 'AccDashboard::life');
});

$routes->group('', ['filter'=>'isAdmin'],function($routes)
{
    $routes->get('admin', 'AccDashboard::adminDash');
    $routes->post('users/status_update', 'AccDashboard::statusToggle');    
    $routes->get('users', 'AccDashboard::userMgt');
    $routes->get('userRequest', 'AccDashboard::userReq');
    $routes->get('newMember', 'AccDashboard::addMember'); 
    $routes->get('adminProfile', 'AccDashboard::adminProf');
    $routes->post('updatePwd', 'AccDashboard::adminupdatePwd');
    $routes->post('updateAdmin', 'AccDashboard::updateAdmin'); 
    $routes->get('newStaff', 'AccDashboard::addStaff');  
});
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
