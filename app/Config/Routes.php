<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Ruta para testeo de conexion de bdd
$routes->get('/testdb', 'CBdd::testbdd');
//Ruta de vista
$routes->get('/inv', 'CBdd::Select_Controlador_bdd');
//Ruta de creacion
$routes->post('/crear1','CBdd::Insertar_TblInventario');
//Ruta de user
$routes->get('/usu', 'CBdd::Select_Controlador_Usuario');
//Ruta insertar usuario
$routes->post('/crear2','CBdd::Insertar_TblUsuario');
//Ruta editar usu
$routes->get('/editarusu/(:num)', 'CBdd::EditarUsu/$1');
$routes->post('/editarusu', 'CBdd::Editar_Usuario');
//ruta eliminar usu
$routes->get('/eliminarusu/(:num)', 'CBdd::Eliminar_Usuario/$1');
//ruta editar inv
$routes->get('/editarinv/(:num)', 'Cbdd::EditarInv/$1');
$routes->post('/editarinv', 'Cbdd::Editar_Inventario');
//ruta eliminar inv
$routes->get('/eliminarinv/(:num)', 'Cbdd::Eliminar_Inventario/$1');


