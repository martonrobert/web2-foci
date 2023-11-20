<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Főoldal
$routes->get('/', 'HomePageController::index');
// Hírek API
$routes->get('api-news', 'NewsApiGetController::index');


// regisztráció form megjelenítése
$routes->get('regisztrácio', 'RegisztracioPageController::index');
// regisztráció mentése
$routes->post('regisztracio', 'SignupApiController::index');


// Bejelentkezés form megjelenítése
$routes->get('belepes', 'LoginPageController::index');
// Bejelentkezés API
$routes->post('belepes', 'LoginApiController::index');
// kilépő felület
$routes->get('kilepes', 'LogoutPageController::index');



// Csapatok lista nézet
$routes->get('csapatok-lista', 'KlubListaViewController::index');
// Csapatok lista lekérdezés API
$routes->get('csapatok', 'KlubListaGetController::index');

// Egy csapat adatainak megjelenítése, játékosokkal
$routes->get('csapatok/(:num)','KlubViewController::index');
// Csapat játékosainak lekélrdezése API
$routes->get('csapatok/(:num)/jatekosok','JatekosokViewController::index');

// Játékos adatainak mentése
$routes->post('jatekos', 'JatekosPostController::index');

