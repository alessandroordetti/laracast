<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$notes = $db->query("SELECT notes.*, users.email FROM notes LEFT JOIN users ON notes.user_id = users.id")->get();


view("notes/index.view.php",[
    'notes' => $notes
]);