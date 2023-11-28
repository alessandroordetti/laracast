<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$currentUser = 1;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();

/* authorize($note['user_id'] == $currentUser); */

$errors = [];

if(! Validator::string($_POST['body'])){
    $errors['body'] = "The note doesn't fit requirements :(";
}

if(count($errors)){
    return view('notes/edit.view.php', [
        'errors' => $errors,
        'note'   => $note   
    ]);
}

$db->query('UPDATE notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');

die();