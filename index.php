<?php 

require 'functions.php';
require 'Database.php';
require 'router.php';


// Pericolo di SQL Injection se passiamo direttamente come parametro un input passato dall'utente
// $id = $_GET['user_id'];
// $query= "SELECT * FROM notes WHERE user_id = {$id}"; */ 

//Utilizziamo una wildcard(:id) od un segnaposto (?) per evitare l'injection
/* $id = $_GET['id'];
$query= "SELECT * FROM notes WHERE id = :id";  


$posts = $db->query($query, [':id' => $id])->fetchAll(); */
//Se usiamo un segnaposto basta passare un array con [$id];

