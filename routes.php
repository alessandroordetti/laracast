<?php 

/* BASIC ROUTES */
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

/* READ ROUTES */
$router->get('/notes', 'notes/index.php');
$router->get('/note', 'notes/show.php');

/* CREATE ROUTES */
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

/* UPDATE ROUTES */
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

/* DELETE ROUTE */
$router->delete('/note', 'notes/destroy.php');

/* REGISTRATION ROUTES */
$router->get('/register', 'users/register.php')->only('guest');
$router->post('/register', 'users/store.php')->only('guest');

/* LOGIN ROUTES */
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/logout', 'login/destroy.php')->only('auth');
$router->delete('/admin-logout', 'login/destroy.php')->only('admin');

/* ADMIN PANEL */
$router->get('/admin-index', 'admin/index.php')->only('admin');

/* RUN FAKE DATA QUERY */
$router->get('/run-fake-migration', 'migrations/index.php')->only('admin');

$router->get('/try-template', 'try-template.php');
