<?php 

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path( $class . '.php'); // Le classi necessarie all'app verranno caricate in automatica e cercate nella cartella Core
});

/* require base_path('Database.php');
require base_path('Response.php'); */
require base_path('Core/router.php');


// Pericolo di SQL Injection se passiamo direttamente come parametro un input passato dall'utente
// $id = $_GET['user_id'];
// $query= "SELECT * FROM notes WHERE user_id = {$id}"; */ 

//Utilizziamo una wildcard(:id) od un segnaposto (?) per evitare l'injection
/* $id = $_GET['id'];
$query= "SELECT * FROM notes WHERE id = :id";  


$posts = $db->query($query, [':id' => $id])->fetchAll(); */
//Se usiamo un segnaposto basta passare un array con [$id];

