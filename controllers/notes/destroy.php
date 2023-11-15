<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class); // Database::class può essere scritto al posto del full path per la dipendenza

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE  id = :id",[
    ":id" => $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$db->query('DELETE from notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();

