<?php 

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';


require base_path('Database.php');
require base_path('Response.php');
require base_path('router.php');


// Pericolo di SQL Injection se passiamo direttamente come parametro un input passato dall'utente
// $id = $_GET['user_id'];
// $query= "SELECT * FROM notes WHERE user_id = {$id}"; */ 

//Utilizziamo una wildcard(:id) od un segnaposto (?) per evitare l'injection
/* $id = $_GET['id'];
$query= "SELECT * FROM notes WHERE id = :id";  


$posts = $db->query($query, [':id' => $id])->fetchAll(); */
//Se usiamo un segnaposto basta passare un array con [$id];

