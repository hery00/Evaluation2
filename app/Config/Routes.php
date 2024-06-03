<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/','UserController::log');
$routes->get('inscrir', 'UserController::inscrir');
$routes->post('inscription', 'UserController::register');

$routes->get('/log', 'UserController::log');
$routes->post('/login', 'UserController::process');
$routes->get('/accueil', 'UserController::accueil');

$routes->get('adIndex', 'Admin::index');

$routes->get('/listetapescourse', 'EtapesController::etapesCourseAdmin');
$routes->get('dashboard', 'CoursesController::dash_admin');

$routes->get('formulaire', 'ParticipationController::index');
$routes->post('form', 'ParticipationController::create');

$routes->get('import','ImportController::index');
$routes->post('importcsv', 'ImportController::importcsv');

$routes->get('/generation','CoureurCategorieController::insert');

$routes->get('/equipeaccueil', 'EquipeController::index');
$routes->get('/coureur/equipe', 'CoureurController::getCoureurByEquipe');
$routes->get('/listecoureur', 'EtapesController::getCoureurEtape');
$routes->get('/assignercoureur', 'ChoixCoureurController::assignerParticipant');
// $routes->post('clientcontroller/authentification', 'ClientController::authentification');
// $routes->get('clientcontroller/listdevis', 'ClientController::listdevis');
// $routes->get('clientcontroller/newdevis', 'ClientController::newdevis');
// $routes->get('clientcontroller/insertdevis', 'ClientController::insertdevis');

// $routes->get('formcontroller/choix_login', 'FormController::choix_login');
// $routes->get('template/temple', 'Template::temple');
